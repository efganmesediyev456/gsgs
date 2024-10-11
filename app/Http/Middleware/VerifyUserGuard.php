<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyUserGuard
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        $authCheck = false;
            foreach ($guards as $guard) {
                if (auth()->guard($guard)->check()) {
                    $authCheck = true;
                    break;
                }
            }
            if (!$authCheck) {
                return redirect()->route('gopanel.auth.login');
            }
        return $next($request);
    }
}
