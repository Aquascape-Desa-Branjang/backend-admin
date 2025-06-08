<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Web\AuthenticationController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

class EnsureSessionTimeout
{
    /**
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = user('web');

        if (empty($user)) {
            return $next($request);
        }

        $isUserSessionExpired = Carbon::parse($user->last_login_at)
            ->addMinutes((int) config('session.lifetime'))
            ->isPast();

        if ($isUserSessionExpired) {
            return (new AuthenticationController)->logout();
        }

        return (new TrackUserLastActive)->handle($request, $next);
    }
}
