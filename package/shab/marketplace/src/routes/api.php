<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Shab\Marketplace\Http\Controllers\ProductController;
use Shab\Marketplace\Http\Controllers\PurchaseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('marketplace/api')->group(function () {

    Route::get('/health', function () {
        return 'health';
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/products/{id}', [ProductController::class, 'show']);
        Route::post('/products', [ProductController::class, 'store']);
        Route::put('/products/{id}', [ProductController::class, 'update']);
        Route::delete('/products/{id}', [ProductController::class, 'destroy']);

        Route::post('/purchase', [PurchaseController::class, 'purchaseProduct']);
    });
});

