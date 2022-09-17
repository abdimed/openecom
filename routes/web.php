<?php

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

Route::get('/{brand:slug}/products/{product:slug}', [ProductController::class, 'view'])->name('product.view');
Route::get('/{brand:slug}/products/{product:slug}/order', [ProductController::class, 'order'])->name('product.order');

Route::post('/{brand:slug}/products/{product:slug}/order', [OrderController::class, 'post'])->name('order.post');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
