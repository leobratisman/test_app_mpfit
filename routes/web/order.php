<?php

use Illuminate\Support\Facades\Route;

Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('order.index');

Route::get('/orders/create/{product}', [\App\Http\Controllers\OrderController::class, 'create'])->name('order.create');

Route::get('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('order.show');

Route::post('/orders', [\App\Http\Controllers\OrderController::class, 'store'])->name('order.store');

Route::patch('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'update'])->name('order.update');

Route::delete('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'destroy'])->name('order.destroy');
