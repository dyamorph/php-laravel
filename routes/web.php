<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::redirect('/admin', '/admin/products');

Route::get('/', [ClientController::class, 'index'])->name('client.index');
Route::get('/{product}', [ClientController::class, 'show'])->name('client.show');

Route::prefix('admin')->group(function () {
    Route::resource('services', ServiceController::class)->names([
        'index' => 'service.index',
        'create' => 'service.create',
        'store' => 'service.store',
        'edit' => 'service.edit',
        'update' => 'service.update',
        'destroy' => 'service.destroy',
    ]);

    Route::resource('products', ProductController::class)->names([
        'index' => 'product.index',
        'show' => 'product.show',
        'create' => 'product.create',
        'store' => 'product.store',
        'edit' => 'product.edit',
        'update' => 'product.update',
        'destroy' => 'product.destroy',
    ]);
});
