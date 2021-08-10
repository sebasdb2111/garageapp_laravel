<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Services\User\LogoutUserService;
use Illuminate\Http\JsonResponse;

class LogoutUserController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $logoutUserService = new LogoutUserService();
        $logoutUserService->__invoke();

        return response()->json(['message' => 'User successfully signed out']);
    }
}
