<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('profiles', ProfileController::class);
    Route::apiResource('profiles.tasks', TaskController::class);
    Route::post('logout',[AuthController::class,'logout']);
});