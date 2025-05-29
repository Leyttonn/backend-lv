<?php

use App\Http\Controllers\AuthContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/v1/auth')->group(function(){

    Route::post('/login', [AuthContoller::class, 'funLogin']);
    Route::post('/register', [AuthContoller::class, 'funRegister']);
    
    Route::middleware('auth:sanctum')->group(function () { 
        Route::get('/profile', [AuthContoller::class, 'funProfile']);
        Route::post('/logout', [AuthContoller::class, 'funLogout']);
    });
});