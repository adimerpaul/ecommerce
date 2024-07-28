<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Laravel\Facades\Image;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
Route::get('/carousels', [\App\Http\Controllers\CarouselController::class,'index']);
Route::get('/products', [\App\Http\Controllers\ProductController::class,'index']);
Route::get('/producto/{id}', [\App\Http\Controllers\ProductController::class,'show']);
Route::get('/categories', [\App\Http\Controllers\CategoryController::class,'index']);
Route::get('/subCategories', [\App\Http\Controllers\SubCategoryController::class,'index']);

Route::post('/login', [\App\Http\Controllers\UserController::class,'login']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/me', [\App\Http\Controllers\UserController::class,'me']);
    Route::post('/logout', [\App\Http\Controllers\UserController::class,'logout']);

    Route::put('/products/{id}', [\App\Http\Controllers\ProductController::class,'update']);
    Route::post('/products', [\App\Http\Controllers\ProductController::class,'store']);
    Route::post('/uploadProduct/{id}', [\App\Http\Controllers\ProductController::class,'uploadProduct']);
    Route::delete('/products/{id}', [\App\Http\Controllers\ProductController::class,'destroy']);

    Route::post('/categories', [\App\Http\Controllers\CategoryController::class,'store']);
    Route::put('/categories/{id}', [\App\Http\Controllers\CategoryController::class,'update']);
    Route::delete('/categories/{id}', [\App\Http\Controllers\CategoryController::class,'destroy']);

    Route::post('/subCategories', [\App\Http\Controllers\SubCategoryController::class,'store']);
    Route::put('/subCategories/{id}', [\App\Http\Controllers\SubCategoryController::class,'update']);
    Route::delete('/subCategories/{id}', [\App\Http\Controllers\SubCategoryController::class,'destroy']);
});
Route::get('/test-image', function() {
    $img = Image::make('images/1.png')->resize(300, 200);
//    return $img->response('jpg');
});
Route::get('/', function () {
    $manager = new ImageManager(new Driver());
    $image = $manager->read('images/a.webp');

    $image->scale(height: 600);
// scale to 200 x 100 pixel
//    $image->scale(200, 100); // 200 x 150
    //guardar
    $image->save('images/a1.webp');
});
