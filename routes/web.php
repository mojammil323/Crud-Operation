<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});





Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::get('/', 'index')->name('products.index'); // /product
    Route::get('/create', 'create')->name('products.create');
    Route::get('/new', 'new')->name('products.new');
    Route::post('/store', 'store')->name('products.store');
    Route::get('/{product}/edit', 'edit')->name('products.edit');
    Route::get('/delete/{id}', 'delete')->name('products.delete');
});


