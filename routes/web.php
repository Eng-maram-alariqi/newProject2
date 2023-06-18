<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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


// dashboard Routes
// Route::get('/', [DashboardController::class, 'dashboardEcommerce'])->name('dashboard-ecommerce')->middleware('verified');

Route::get('/', function () {
    return view('auth/login');
}); 

Route::get('/home', function () {
    return view('dashboard.view');
})->name('dashboard.view');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    // Route::resource('roles',RoleController::class);
    // Route::resource('users', UserController::class);
    Route::resource('offers', OfferController::class);
    Route::resource('permissions', PermissionsController::class);
   
});


Route::get('/products', function () {
    return view('products.view');
})->name('products.view');

Route::get('/stores', function () {
    return view('stores.view');
})->name('stores.view');

Route::get('/users', function () {
    return view('users.show_user');
})->name('users.show_user');
Route::get('/roles', function () {
    return view('roles.index');
})->name('roles.index');

Route::get('/add-product', function () {
    return view('products.add');
})->name('products.add');




    /*-------------------------- Roles Routes  ---------------------------*/
    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('create', [RoleController::class, 'create'])->name('create');
        Route::post('store', [RoleController::class, 'store'])->name('store');
        Route::get('edit/{role}', [RoleController::class, 'edit'])->name('edit');
        Route::put('update/{role}', [RoleController::class, 'update'])->name('update');
        Route::post('delete/{role}', [RoleController::class, 'delete'])->name('delete');
        Route::post('getRoleDetailsAjax', [RoleController::class, 'getRoleDetailsAjax'])->name('getRoleDetailsAjax');

    });