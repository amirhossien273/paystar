<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('v1')->group(function() {
    Route::post('login', App\Http\Controllers\v1\auth\LoginController::class);

    Route::middleware('auth:api')->prefix('producrs')->group(function() {
        Route::get('/all', App\Http\Controllers\v1\products\ShowProductForUserController::class);
    });

    Route::middleware('auth:api')->prefix('cart')->group(function() {
        Route::get('/add/{IdProduct}', App\Http\Controllers\v1\cart\AddproductToCartController::class);
        Route::get('/show', App\Http\Controllers\v1\cart\ShowCartController::class);
    });

    Route::middleware('auth:api')->prefix('pay')->group(function() {
        Route::get('/connect/{IdCart}', App\Http\Controllers\v1\payment\ConnectToPaystarController::class);
        Route::post('/back', App\Http\Controllers\v1\payment\BackPaystarController::class);
    });

});


Route::bind('IdProduct', function($id) {
    $product = new App\Repository\Products\ProductsRepository(new App\Models\Product());
    return $product->find($id);
});

Route::bind('IdCart', function($id) {
    $factor = new App\Repository\factors\FactorRepository(new App\Models\Factor());
    return $factor->find($id);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
