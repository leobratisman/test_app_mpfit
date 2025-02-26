<?php

use Illuminate\Support\Facades\Route;

Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

Route::get('/products/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');

Route::get('/products/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::get('/products/{product}/edit', [\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');

Route::post('/products', [\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');

Route::patch('/products/{product}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');

Route::delete('/products/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
