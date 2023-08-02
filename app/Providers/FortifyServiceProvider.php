<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ExtendedCreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Contracts\PasswordUpdateResponse;
use Laravel\Fortify\Contracts\ProfileInformationUpdatedResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use Laravel\Fortify\Contracts\VerifyEmailResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->instance(VerifyEmailResponse::class, new class implements VerifyEmailResponse
        {
            public function toResponse($request)
            {
                return redirect()->route('explore')->with('success', 'Your email has been verified.');
            }
        });

        $this->app->instance(RegisterResponse::class, new class implements RegisterResponse
        {
            public function toResponse($request)
            {
                return redirect()->route('verification.notice');
            }
        });

        $this->app->instance(LogoutResponse::class, new class implements LogoutResponse
        {
            public function toResponse($request)
            {
                return redirect()->route('explore');
            }
        });

        $this->app->instance(PasswordUpdateResponse::class, new class implements PasswordUpdateResponse
        {
            public function toResponse($request)
            {
                return redirect()->route('settings')->with('success', 'Your password has been updated.');
            }
        });

        $this->app->instance(ProfileInformationUpdatedResponse::class, new class implements ProfileInformationUpdatedResponse
        {
            public function toResponse($request)
            {
                return redirect()->route('settings')->with('success', 'Your account has been updated.');
            }
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::loginView('auth.login');
        Fortify::registerView('auth.register');
        Fortify::verifyEmailView('auth.verify_email');
        Fortify::requestPasswordResetLinkView('auth.forgot_password');
        Fortify::resetPasswordView(function (Request $request) {
            return view('auth.reset_password', ['request' => $request]);
        });
        Fortify::createUsersUsing(ExtendedCreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
