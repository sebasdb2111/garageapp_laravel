<?php

namespace App\Services\Car;

use App\Models\Car;
use JWTAuth;
use Illuminate\Support\Str;

class CreateCarService
{
    public function __invoke(string $brand, string $model, string $licensePlate, string $color): Car
    {
        $userId = JWTAuth::user()->id;
        return Car::create([
            'id'            => Str::uuid()->toString(),
            'brand'         => $brand,
            'model'         => $model,
            'license_plate' => $licensePlate,
            'color'         => $color,
            'enable'        => true,
            'user_id'       => $userId
        ]);
    }
}
