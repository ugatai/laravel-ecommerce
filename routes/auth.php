<?php

declare(strict_types=1);

use App\Http\Controllers\Customer\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Customer\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Customer\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Customer\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Customer\Auth\NewPasswordController;
use App\Http\Controllers\Customer\Auth\PasswordController;
use App\Http\Controllers\Customer\Auth\PasswordResetLinkController;
use App\Http\Controllers\Customer\Auth\RegisteredUserController;
use App\Http\Controllers\Customer\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->name('customer.')->middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::prefix('customer')->name('customer.')->middleware('auth')->group(function () {
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

Route::get('verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');

Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('verification.send');
