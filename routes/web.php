<?php

use App\Models\User;
use Illuminate\Contracts\Session\Session;
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

Route::middleware('verified')->group(function () {
    Route::get('/profile/{username}', function () {
        return view('user.profile');
    });
    Route::get('settings', function () {
        return view('user.settings');
    })->name('settings');
});
