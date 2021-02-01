<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\api\v1\Users\UserController;
use App\Http\Controllers\api\v1\auth\AuthController;
use \App\Http\Controllers\api\v1\recipes\ReceiptController;

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



Route::get('/v1/recipes', [UserController::class, 'index']);
Route::get('/v1/users/{user}/recipes', [UserController::class, 'show']);

Route::post('/v1/token', [AuthController::class, 'login']);
Route::post('/v1/refresh', [AuthController::class, 'refresh']);

Route::middleware('jwt:custom_api')->group(function() {
    Route::post('/v1/recipes', [ReceiptController::class, 'store']);
    Route::post('/v1/recipes/{id}', [ReceiptController::class, 'update']);
});

Route::middleware('auth:custom_api')->get('/user', function (Request $request) {
    return $request->user();
});
