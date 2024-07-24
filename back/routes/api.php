<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
Route::get('/carousels', [\App\Http\Controllers\CarouselController::class,'index']);
Route::get('/products', [\App\Http\Controllers\ProductController::class,'index']);
Route::get('/producto/{id}', [\App\Http\Controllers\ProductController::class,'show']);
Route::get('/categories', [\App\Http\Controllers\CategoryController::class,'index']);

Route::post('/login', [\App\Http\Controllers\UserController::class,'login']);
