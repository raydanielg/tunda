<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/registration/complete', [App\Http\Controllers\Auth\RegistrationCompletionController::class, 'show'])->name('registration.complete');
    Route::post('/registration/complete', [App\Http\Controllers\Auth\RegistrationCompletionController::class, 'store']);
    Route::get('/registration/verify-phone', [App\Http\Controllers\Auth\RegistrationCompletionController::class, 'showPhoneVerification'])->name('registration.verify.phone');
    Route::post('/registration/verify-phone', [App\Http\Controllers\Auth\RegistrationCompletionController::class, 'verifyPhone']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
