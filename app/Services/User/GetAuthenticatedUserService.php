<?php


namespace App\Services\User;


use App\Models\User;
use JWTAuth;

class GetAuthenticatedUserService
{
    public function __invoke(): User
    {
        return JWTAuth::parseToken()->authenticate();
    }
}
