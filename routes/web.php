<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LinkController;
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
    Route::get('profile/{username}', [ProfileController::class, 'profile'])->name('profile');
    Route::put('update/profile', [ProfileController::class, 'updateProfile'])->name('update.profile');
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
    Route::post('update/avatar', [ProfileController::class, 'updateAvatar'])->name('update.avatar');
    Route::delete('delete/avatar', [ProfileController::class, 'deleteAvatar'])->name('delete.avatar');
    Route::delete('delete/account/{user}', [UserController::class, 'deleteAccount'])->name('delete.account');
    Route::put('update/links/profile', [ProfileController::class, 'updateLinksProfile'])->name('update.links.profile');
    // organizer
    Route::get('organizer/dashboard', [EventController::class, 'dashboard'])->name('organizer.dashboard');
    Route::post('organizer/event/create', [EventController::class, 'createEvent'])->name('event.create');
    Route::get('drafts/{slug}/basics', [EventController::class, 'basics'])->name('drafts.basics');
    Route::put('drafts/{slug}/basics', [EventController::class, 'basicsUpdate'])->name('drafts.basics');
    Route::get('drafts/{slug}/application', [EventController::class, 'application'])->name('drafts.application');
    Route::get('drafts/{slug}/links', [EventController::class, 'links'])->name('drafts.links');
    Route::get('drafts/{slug}/brand', [EventController::class, 'brand'])->name('drafts.brand');
    Route::get('drafts/{slug}/dates', [EventController::class, 'dates'])->name('drafts.dates');
    Route::get('drafts/{slug}/partners', [EventController::class, 'partners'])->name('drafts.partners');
    Route::get('drafts/{slug}/perks', [EventController::class, 'perks'])->name('drafts.perks');
    Route::get('drafts/{slug}/guests', [EventController::class, 'guests'])->name('drafts.guests');
    Route::get('drafts/{slug}/schedule', [EventController::class, 'schedule'])->name('drafts.schedule');
    Route::get('drafts/{slug}/faqs', [EventController::class, 'faqs'])->name('drafts.faqs');
    Route::post('application/store', [ApplicationController::class, 'store'])->name('application.store');
    Route::delete('application/destroy/{id}', [ApplicationController::class, 'destroy'])->name('application.destroy');
    Route::post('link/store', [LinkController::class, 'store'])->name('link.store');
    Route::put('link/update/{id}', [LinkController::class, 'update'])->name('link.update');
    Route::post('brand/logo', [BrandController::class, 'logo'])->name('brand.logo');
    Route::post('brand/banner', [BrandController::class, 'banner'])->name('brand.banner');
    Route::post('date/store', [DateController::class, 'store'])->name('date.store');
    Route::put('date/update/{id}', [DateController::class, 'update'])->name('date.update');
    Route::get('drafts/publish/{id}', [EventController::class, 'publish'])->name('drafts.publish');
});
