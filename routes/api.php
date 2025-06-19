<?php

use App\Http\Controllers\Api\MiscApiController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ArticleController;
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
    Route::get('/products/catalog', 'catalog');
});

Route::controller(ArticleController::class)->group(function () {
    Route::get('/articles', 'index');
    Route::get('/articles/{slug}', 'show');
});