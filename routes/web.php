<?php

use App\Http\Controllers\Admin\AdminController;
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


// BASKET
Route::group(['prefix' => 'basket'], function () {
    Route::get('/', [\App\Http\Controllers\BasketController::class, 'basket'])
        ->name('basket');
    Route::post('/', [\App\Http\Controllers\BasketController::class, 'basketAdd'])
        ->name('basket.add');
    Route::patch('/', [\App\Http\Controllers\BasketController::class, 'basketUpdate'])
        ->name('basket.update');
    Route::delete('/', [\App\Http\Controllers\BasketController::class, 'basketDelete'])
        ->name('basket.delete');
});

// OTHER ROUTES
Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])
    ->name('index');
Route::get('/contacts', [\App\Http\Controllers\MainController::class, 'contacts'])
    ->name('contacts');
Route::get('/delivery', [\App\Http\Controllers\MainController::class, 'delivery'])
    ->name('delivery');

// ADMIN
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])
        ->name('admin');
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])
        ->name('admin.orders');
    Route::get('/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])
        ->name('admin.order');
    Route::post('/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'update'])
        ->name('admin.orderUpdate');
    Route::delete('/order', [\App\Http\Controllers\Admin\OrderController::class, 'destroy'])
        ->name('admin.orderDelete');
    Route::patch('/order', [\App\Http\Controllers\Admin\OrderController::class, 'updateProduct'])
        ->name('admin.orderUpdateProduct');

    Route::resource('/users', \App\Http\Controllers\Admin\UserController::class);
});

// ORDER
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'order'])
    ->name('order');
Route::post('order', [\App\Http\Controllers\OrderController::class, 'orderAdd'])
    ->name('order.add');


// BRAND & PRODUCTS
Route::get('/{brand}', [\App\Http\Controllers\MainController::class, 'brand'])
    ->name('brand');
Route::get('/{brand}/{product}', [\App\Http\Controllers\MainController::class, 'product'])
    ->name('product');







