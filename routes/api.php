<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DriverAuthController;
use App\Http\Controllers\OrderController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('/user', [UserController::class, 'index']);
route::post('/user', [UserController::class, 'store']);
route::patch('/user/{id}', [UserController::class, 'update']);
route::delete('/user/{id}', [UserController::class, 'destroy']);

route::group(['middleware'=>['auth:admin']],function (){
    route::get('order', [OrderController::class, 'index']);
    route::post('order', [OrderController::class, 'store']);
    route::patch('order/{id}', [OrderController::class, 'update']);
    route::delete('order', [OrderController::class, 'destroy']);
});

// admin register
route::post('/a/register', [AdminAuthController::class, 'register']);
route::post('/a/login', [AdminAuthController::class, 'login']);
route::post('/a/logout', [AdminAuthController::class, 'logout']);

// driver register
route::post('/d/register', [DriverAuthController::class, 'register']);
route::post('/d/login', [DriverAuthController::class, 'login']);
route::post('/d/logout', [DriverAuthController::class, 'logout']);



