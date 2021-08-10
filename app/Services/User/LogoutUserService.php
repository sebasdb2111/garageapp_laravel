<?php


namespace App\Services\User;

use JWTAuth;

class LogoutUserService
{
    public function __invoke(): void
    {
        JWTAuth::invalidate(JWTAuth::getToken());
    }
}
