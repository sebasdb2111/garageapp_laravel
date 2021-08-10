<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Services\User\ChangeUserPasswordService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChangeUserPasswordController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'new_password'              => ['required'],
            'new_password_confirmation' => ['same:new_password'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $changeUserPasswordService = new ChangeUserPasswordService();
        $changeUserPasswordService->__invoke($request->get('new_password'));

        return response()->json(['message' => 'The password has been changed successfully, please login again']);
    }
}
