<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string ...$guards
     * @return Response
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return match ($guard) {
                    'customer' => redirect(RouteServiceProvider::CUSTOMER_HOME),
                    'owner' => redirect(RouteServiceProvider::OWNER_HOME),
                    'admin' => redirect(RouteServiceProvider::ADMIN_HOME),
                    default => throw new NotFoundHttpException(
                        '[Error]: 不正な認証リクエストが検出されました。 | Guard*' . $guard
                    )
                };
            }
        }

        return $next($request);
    }
}
