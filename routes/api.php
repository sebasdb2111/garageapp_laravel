<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('sing-up', 'App\Http\Controllers\User\CreateUserController');
Route::post('login', 'App\Http\Controllers\User\LoginUserController');


Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('user','App\Http\Controllers\User\GetAuthenticatedUserController');
    Route::get('logout', 'App\Http\Controllers\User\LogoutUserController');
    Route::patch('change-password', 'App\Http\Controllers\User\ChangeUserPasswordController');
    Route::post('car', 'App\Http\Controllers\Car\CreateCarController');
});
