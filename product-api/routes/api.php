<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('products', ProductController::class);
    Route::post('/products/{productId}/reviews', [ReviewController::class, 'store']);
    Route::get('/products/{productId}/reviews', [ReviewController::class, 'productReviews']); 
    Route::get('/users/{userId}/reviews', [ReviewController::class, 'userReviews']);     
});