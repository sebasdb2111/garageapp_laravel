<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Services\User\AuthenticatedUserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginUserController extends Controller
{

    public function __invoke(Request $request): JsonResponse
    {
        $credentials              = $request->only('email', 'password');
        $authenticatedUserService = new AuthenticatedUserService();
        $token                    = $authenticatedUserService->__invoke($credentials);
        return response()->json(compact('token'));
    }
}
