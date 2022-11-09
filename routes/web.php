<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [PageController::class, 'welcome'])->name('page.welcome');

Route::get('/category/{category:slug}', [PageController::class, 'categoryProducts'])->name('category.products');

Route::get('/category/{category:slug}/products/{product:slug}', [PageController::class, 'productDetails'])->name('product.details');

Route::get('/cart', [CartController::class, 'view'])->name('cart.view');


Route::get('/order/{order}/bill', [OrderController::class, 'bill'])->name('order.bill');

Route::get('/complete', [OrderController::class, 'complete'])->name('order.complete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
