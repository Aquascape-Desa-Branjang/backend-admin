<?php

use App\Http\Controllers\Api\MiscApiController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Api Base
|--------------------------------------------------------------------------
*/

Route::get('/', [MiscApiController::class, 'index'])
    ->name('api.index');

Route::get('/ping', [MiscApiController::class, 'ping'])
    ->name('api.ping');

/*
|--------------------------------------------------------------------------
| Api Extra
|--------------------------------------------------------------------------
*/

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'products');
    Route::get('/product-categories', 'productCategories');
});
