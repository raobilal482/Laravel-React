<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnitController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

   Route::prefix('/')->group(function(){
        Route::apiResource('property',PropertyController::class);
    });

     Route::prefix('/')->group(function(){
        Route::apiResource('types',TypeController::class);
    });
     Route::prefix('/')->group(function(){
        Route::apiResource('units',UnitController::class);
    });

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/logout',[AuthController::class,'logout']);
    Route::get('/users',[AuthController::class,'index']);



    Route::prefix('/')->group(function(){
        Route::apiResource('type',TypeController::class);
    });
});

