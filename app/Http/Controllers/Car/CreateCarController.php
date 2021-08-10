<?php


namespace App\Http\Controllers\Car;


use App\Http\Controllers\Controller;
use App\Services\Car\CreateCarService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateCarController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'brand'         => 'required|string|max:255',
            'model'         => 'required|string|max:255',
            'license_plate' => 'required|string|max:10',
            'color'         => 'required|string|max:20'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $createCarService = new CreateCarService();
        $car              = $createCarService->__invoke(
            $request->get('brand'),
            $request->get('model'),
            $request->get('license_plate'),
            $request->get('color'),
        );

        return response()->json(compact('car'), 201);
    }
}
