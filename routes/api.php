<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DriverAuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;



route::group(['middleware'=>['auth:admin']],function (){
    //Orders
    route::get('order', [OrderController::class, 'index']);
    route::post('order', [OrderController::class, 'store']);
    route::patch('order/{id}', [OrderController::class, 'update']);
    route::delete('order', [OrderController::class, 'destroy']);

    //Users
    route::get('/user', [UserController::class, 'index']);
    route::post('/user', [UserController::class, 'store']);
    route::patch('/user/{id}', [UserController::class, 'update']);
    route::delete('/user/{id}', [UserController::class, 'destroy']);

    //Histories
    route::get('/history', [HistoryController::class, 'index']);

});
route::group(['middleware'=>['auth:admin,']],function (){
    route::patch('order/{id}', [OrderController::class, 'update']);
});

// admin register
Route::prefix('a')->group(function(){
route::post('register', [AdminAuthController::class, 'register']);
route::post('login', [AdminAuthController::class, 'login']);
route::post('logout', [AdminAuthController::class, 'logout']);
});
// driver register
Route::prefix('d')->group(function () {
    Route::post('register', [DriverAuthController::class, 'register']);
    Route::post('login',    [DriverAuthController::class, 'login']);
    Route::post('logout',   [DriverAuthController::class, 'logout']);
});


route::get('/history', [HistoryController::class, 'index']);
route::patch('/admin/{id}', [AdminController::class, 'update']);
