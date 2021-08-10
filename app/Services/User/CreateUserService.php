<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

class CreateUserService
{
    public function __invoke(string $name, string $email, string $password): array
    {
        $user = User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => Hash::make($password),
            'enable'   => true
        ]);

        $token = JWTAuth::fromUser($user);
        return array($user, $token);
    }
}
