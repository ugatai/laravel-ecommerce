<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            if (Route::is('admin.*')) {
                return route('admin.login');
            }
            if (Route::is('owner.*')) {
                return route('owner.login');
            }
            return route('customer.login');
        }
        throw new NotFoundHttpException(
            '[Error]: 不正なリクエストが検出されました。 | ClassName*' . __CLASS__
        );
    }
}
