<?php

use App\Http\Controllers\AuhtController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::resource('products', ProductController::class);

//Public routes
Route::post('/register', [AuhtController::class, 'register']);
Route::post('/login', [AuhtController::class, 'login']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::post('/logout', [AuhtController::class, 'logout']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});
