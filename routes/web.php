<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('', function () {
    return view('welcome');
});

Route::get('explore', function () {
    return view('explore');
})->name('explore');

Route::middleware('verified', 'auth')->group(function () {
    // profile
    Route::get('/profile/{username}', [ProfileController::class, 'profile'])->name('profile');
    Route::put('update/profile', [ProfileController::class, 'updateProfile'])->name('update.profile');
    Route::put('update/links/profile', [ProfileController::class, 'updateLinksProfile'])->name('update.links.profile');
    // account settings
    Route::get('settings', function () {
        return view('user.settings');
    })->name('settings');
    Route::get('update/account', function () {
        return view('auth.update_account_details');
    })->name('update.account');
    Route::get('update/password', function () {
        return view('auth.update_password');
    })->name('update.password');
    Route::get('update/avatar', function () {
        return view('user.update_avatar');
    })->name('update.avatar');
    Route::post('update/avatar', [ProfileController::class, 'updateAvatar'])->name('update.avatar');
    Route::get('delete/avatar', [ProfileController::class, 'deleteAvatar'])->name('delete.avatar');
    Route::delete('delete/account/{user}', [UserController::class, 'deleteAccount'])->name('delete.account');
});
