<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
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

Auth::routes();

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
Route::get('pagination/fetch_data', [\App\Http\Controllers\MainController::class, 'pagination'])
    ->name('pagination');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ADMIN
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])
        ->name('admin');
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])
        ->name('admin.orders');

    Route::group(['prefix' => 'brand'], function () {
        Route::get('/all', [\App\Http\Controllers\Admin\BrandController::class, 'index'])
            ->name('admin.brand.all');
        Route::get('/new', [\App\Http\Controllers\Admin\BrandController::class, 'create'])
            ->name('admin.brand.new');
        Route::post('/create', [\App\Http\Controllers\Admin\BrandController::class, 'store'])
            ->name('admin.brand.create');
        Route::post('/update', [\App\Http\Controllers\Admin\BrandController::class, 'update'])
            ->name('admin.brand.update');
        Route::delete('/delete', [\App\Http\Controllers\Admin\BrandController::class, 'destroy'])
            ->name('admin.brand.delete');
        Route::get('/{brand}', [\App\Http\Controllers\Admin\BrandController::class, 'show'])
            ->name('admin.brand');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\OrderController::class, 'index'])
            ->name('admin.orders');
        Route::get('/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])
            ->name('admin.order');
        Route::post('/{order}', [\App\Http\Controllers\Admin\OrderController::class, 'update'])
            ->name('admin.orderUpdate');
        Route::delete('/order', [\App\Http\Controllers\Admin\OrderController::class, 'destroy'])
            ->name('admin.orderDelete');
        Route::patch('/order', [\App\Http\Controllers\Admin\OrderController::class, 'updateProduct'])
            ->name('admin.orderUpdateProduct');
        Route::put('/order', [\App\Http\Controllers\Admin\OrderController::class, 'addProduct'])
            ->name('admin.orderAddProduct');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'index'])
            ->name('admin.products');
        Route::get('/createProduct', [\App\Http\Controllers\Admin\ProductController::class, 'create'])
            ->name('admin.createProduct');
        Route::get('/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'show'])
            ->name('admin.product');
    });

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

