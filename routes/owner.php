<?php

declare(strict_types=1);

use App\Http\Controllers\Owner\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Owner\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Owner\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Owner\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Owner\Auth\NewPasswordController;
use App\Http\Controllers\Owner\Auth\PasswordController;
use App\Http\Controllers\Owner\Auth\PasswordResetLinkController;
use App\Http\Controllers\Owner\Auth\RegisteredUserController;
use App\Http\Controllers\Owner\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// ---------------------------------------------------------------------------------------------------------------------
// 店舗オーナー認証系 ルート定義
// ---------------------------------------------------------------------------------------------------------------------
Route::middleware('guest:owner')->group(function () {
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
Route::middleware('auth:owner')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

// ---------------------------------------------------------------------------------------------------------------------
// 店舗オーナーダッシュボード画面
// ---------------------------------------------------------------------------------------------------------------------
Route::middleware(['auth:owner'])->get('/dashboard', function () {
    return Inertia::render('Owner/Dashboard');
})->name('dashboard');

// ---------------------------------------------------------------------------------------------------------------------
// 画像（店舗 or 商品で使用） ルート定義
// ---------------------------------------------------------------------------------------------------------------------
Route::prefix('image')->middleware(['auth:owner'])->group(function () {
    Route::get('create', App\Http\Actions\Owner\Image\ImageCreateAction::class)->name('image.create');
    Route::delete('destroy/{id}', App\Http\Actions\Owner\Image\ImageDestroyAction::class)->name('image.destroy');
    Route::get('edit/{id}', App\Http\Actions\Owner\Image\ImageEditAction::class)->name('image.edit');
    Route::get('index', App\Http\Actions\Owner\Image\ImageIndexAction::class)->name('image.index');
    Route::post('store', App\Http\Actions\Owner\Image\ImageStoreAction::class)->name('image.store');
    Route::put('update', App\Http\Actions\Owner\Image\ImageUpdateAction::class)->name('image.update');
});
