<?php

use Illuminate\Support\Facades\Route;

Route::get('/orders', [\App\Http\Controllers\API\OrderController::class, 'index']);

Route::get('/orders/{order}', [\App\Http\Controllers\API\OrderController::class, 'show']);

Route::post('/orders', [\App\Http\Controllers\API\OrderController::class, 'store']);

Route::patch('/orders/{order}', [\App\Http\Controllers\API\OrderController::class, 'update']);

Route::delete('/orders/{order}', [\App\Http\Controllers\API\OrderController::class, 'destroy']);
