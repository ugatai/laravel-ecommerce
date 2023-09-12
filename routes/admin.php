<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// ---------------------------------------------------------------------------------------------------------------------
// システム管理者認証系 ルート定義
// ---------------------------------------------------------------------------------------------------------------------
Route::middleware('guest:admin')->group(function () {
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
Route::middleware('auth:admin')->group(function () {
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
// 管理者ダッシュボード画面
// ---------------------------------------------------------------------------------------------------------------------
Route::middleware(['auth:admin'])->get('/dashboard', function () {
    return Inertia::render('Admin/Dashboard');
})->name('dashboard');

// ---------------------------------------------------------------------------------------------------------------------
// 店舗オーナー ルート定義
// ---------------------------------------------------------------------------------------------------------------------
Route::prefix('owners')->middleware(['auth:admin'])
    ->group(function () {
        Route::get('create', \App\Http\Actions\Admin\Owner\OwnerCreateAction::class)->name('owner.create');
        Route::delete('destroy/{id}', \App\Http\Actions\Admin\Owner\OwnerDestroyAction::class)->name('owner.destroy');
        Route::get('edit/{id}', \App\Http\Actions\Admin\Owner\OwnerEditAction::class)->name('owner.edit');
        Route::get('index', \App\Http\Actions\Admin\Owner\OwnerIndexAction::class)->name('owner.index');
        Route::get('show/{id}', \App\Http\Actions\Admin\Owner\OwnerShowAction::class)->name('owner.show');
        Route::post('store', \App\Http\Actions\Admin\Owner\OwnerStoreAction::class)->name('owner.store');
        Route::put('update', \App\Http\Actions\Admin\Owner\OwnerUpdateAction::class)->name('owner.update');
    });

// ---------------------------------------------------------------------------------------------------------------------
// 契約切れ店舗オーナー ルート定義
// ---------------------------------------------------------------------------------------------------------------------
Route::prefix('expired-owners')->middleware(['auth:admin'])
    ->group(function () {
        Route::delete('destroy/{id}', \App\Http\Actions\Admin\ExpiredOwner\ExpiredOwnerDestroyAction::class)->name('expired_owner.destroy');
        Route::get('index', \App\Http\Actions\Admin\ExpiredOwner\ExpiredOwnerIndexAction::class)->name('expired_owner.index');
        Route::post('restore/{id}', \App\Http\Actions\Admin\ExpiredOwner\ExpiredOwnerRestoreAction::class)->name('expired_owner.restore');
    });
