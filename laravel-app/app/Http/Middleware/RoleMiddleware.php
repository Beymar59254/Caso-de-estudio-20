<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Middleware genérico por rol mediante Spatie
        $role = $request->route('role');

        abort_unless($user && $role && $user->hasRole($role), 403);

        return $next($request);
    }
}

