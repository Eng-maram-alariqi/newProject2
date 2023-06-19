<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\RoleController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', ProductController::class)->except('destroy');
Route::put('products/{product}/changeStatus', [ProductController::class, 'changeStatus']);

Route::resource('categories', ProductCategoryController::class);
Route::resource('stores', StoreController::class);
// Route::resource('roles',RoleController::class);
Route::resource('orders', OrderController::class);

