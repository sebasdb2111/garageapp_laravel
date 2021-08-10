<?php


namespace App\Services\User;


use Illuminate\Support\Facades\Hash;
use JWTAuth;

class ChangeUserPasswordService
{
    public function __invoke(string $password): void
    {
        $user = JWTAuth::user();

        $user->password = Hash::make($password);
        $user->save();

        $logoutUserService = new LogoutUserService();
        $logoutUserService->__invoke();
    }
}
