<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminAuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('/user', [UserController::class, 'index']);
route::post('/user', [UserController::class, 'store']);
route::patch('/user/{id}', [UserController::class, 'update']);
route::delete('/user/{id}', [UserController::class, 'destroy']);

route::group(['middleware'=>['auth:admin']],function (){

});
route::post('/a/register', [AdminAuthController::class, 'register']);
route::post('/a/login', [AdminAuthController::class, 'login']);
route::post('/a/logout', [AdminAuthController::class, 'logout']);
