<?php

use Illuminate\Support\Facades\Route;

Route::get('/products', [\App\Http\Controllers\API\ProductController::class, 'index']);

Route::get('/products/{product}', [\App\Http\Controllers\API\ProductController::class, 'show']);

Route::post('/products', [\App\Http\Controllers\API\ProductController::class, 'store']);

Route::patch('/products/{product}', [\App\Http\Controllers\API\ProductController::class, 'update']);

Route::delete('/products/{product}', [\App\Http\Controllers\API\ProductController::class, 'destroy']);
