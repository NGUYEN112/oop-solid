<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Managers\CategoryController;
use App\Http\Controllers\Managers\ProductController;
use App\Repositories\Contracts\ProductsRepository;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'homePage']);
Route::get('get-product/{id}',[HomeController::class,'getProduct']);

Route::group(['prefix' => 'manager'], function() {
    Route::group(['prefix' => 'category'],function(){
        Route::get('/',[CategoryController::class,'categoriesPage']);
        Route::get('/create',[CategoryController::class,'createCategoryPage']);
        Route::post('/create',[CategoryController::class,'storeCategory']);
        Route::get('/update/{id}',[CategoryController::class,'editCategoryPage']);
        Route::post('/update/{id}',[CategoryController::class,'updateCategory']);
    });

    Route::group(['prefix' => 'product'],function(){
        Route::get('/',[ProductController::class,'productsPage']);
        Route::get('/create',[ProductController::class,'createProductPage']);
        Route::post('/create',[ProductController::class,'storeProduct']);
        Route::get('/update/{id}',[ProductController::class,'editProductPage']);
        Route::post('/update/{id}',[ProductController::class,'updateProduct']);
    });
});
