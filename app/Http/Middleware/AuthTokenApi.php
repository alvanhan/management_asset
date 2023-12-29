<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class AuthTokenApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = [
            'success' => false,
            'message' => "Unauthorized Please check your API Token!",
        ];

        $authApiToken = $request->header('Authorization');

        if ($authApiToken !== env('API_TOKEN')) {
            return response()->json($response, 401);
        }

        return $next($request);
    }
}
