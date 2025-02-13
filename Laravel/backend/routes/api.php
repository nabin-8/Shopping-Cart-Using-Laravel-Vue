<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::get('products', [ProductController::class, 'index']);
Route::post('pay/order', [\App\Http\Controllers\Api\PaymentController::class, 'payByStripe']);
Route::get('products', [ProductController::class, 'index']);
