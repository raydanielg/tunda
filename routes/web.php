<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\VideoController::class, 'landing'])->name('landing');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/registration/complete', [App\Http\Controllers\Auth\RegistrationCompletionController::class, 'show'])->name('registration.complete');
    Route::post('/registration/complete', [App\Http\Controllers\Auth\RegistrationCompletionController::class, 'store']);
    Route::get('/registration/verify-phone', [App\Http\Controllers\Auth\RegistrationCompletionController::class, 'showPhoneVerification'])->name('registration.verify.phone');
    Route::post('/registration/verify-phone', [App\Http\Controllers\Auth\RegistrationCompletionController::class, 'verifyPhone']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/videos/vip', [App\Http\Controllers\VideoController::class, 'vip'])->name('videos.vip');
Route::get('/videos/regular', [App\Http\Controllers\VideoController::class, 'regular'])->name('videos.regular');
Route::get('/videos/all', [App\Http\Controllers\VideoController::class, 'all'])->name('videos.all');
Route::get('/videos/{video}', [App\Http\Controllers\VideoController::class, 'show'])->name('videos.show');
