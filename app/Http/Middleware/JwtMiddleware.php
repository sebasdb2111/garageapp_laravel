<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware
{

    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            $response = response()->json(['status' => 'Authorization Token not found']);

            if ($e instanceof TokenInvalidException) {
                $response = response()->json(['status' => 'Token is Invalid']);
            }

            if ($e instanceof TokenExpiredException) {
                $response = response()->json(['status' => 'Token is Expired']);
            }

            return $response;
        }

        return $next($request);
    }
}