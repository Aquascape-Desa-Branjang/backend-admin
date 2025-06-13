<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        try {
            $apiKey = $request->header('api-key');

            if (! Hash::check(config('base.api_key'), $apiKey)) {
                throw new \Exception();
            }
        } catch (\Exception $e) {
            Log::error('Error Authentication API: ', ['error' => $e->getMessage()]);

            $response = response()->json(['error' => 'Unauthorized'], 401);
        }

        return $response;
    }
}
