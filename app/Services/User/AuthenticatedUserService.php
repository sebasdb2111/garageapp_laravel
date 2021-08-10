<?php


namespace App\Services\User;

use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class AuthenticatedUserService
{
    public function __invoke(array $credentials): string
    {
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return $token;
    }
}
