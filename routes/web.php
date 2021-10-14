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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('index');
Route::get('/order', [\App\Http\Controllers\OrderController::class, 'order'])->name('order');
Route::get('/contacts', [\App\Http\Controllers\MainController::class, 'contacts'])->name('contacts');
Route::get('/delivery', [\App\Http\Controllers\MainController::class, 'delivery'])->name('delivery');
Route::get('/admin', [\App\Http\Controllers\Admin\AdminController::class, 'index']);
Route::get('/admin/order_1', [\App\Http\Controllers\Admin\OrderController::class, 'show']);
Route::get('/admin/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index']);


Route::get('/basket', [\App\Http\Controllers\BasketController::class, 'basket'])->name('basket');


Route::get('/{brand}', [\App\Http\Controllers\MainController::class, 'brand'])->name('brand');
Route::get('/{brand}/{product}', [\App\Http\Controllers\MainController::class, 'product'])->name('product');

Route::post('order', [\App\Http\Controllers\OrderController::class, 'orderAdd'])->name('order.add');


Route::post('/basket', [\App\Http\Controllers\BasketController::class, 'basketAdd'])->name('basket.add');
Route::patch('/basket', [\App\Http\Controllers\BasketController::class, 'basketUpdate'])->name('basket.update');
Route::delete('/basket', [\App\Http\Controllers\BasketController::class, 'basketDelete'])->name('basket.delete');


