<?php

use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;

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

Route::get(
    '/home',
    [HomePageController::class, 'show']
);
Route::get(
    '/admin/products-category',
    [ProductCategoryController::class, 'index']
)->name('productCategory.index');
Route::get(
    '/admin/products-category/create',
    [ProductCategoryController::class, 'create']
)->name('productCategory.create');
Route::get(
    '/admin/products-category/{id}',
    [ProductCategoryController::class, 'show']
)->name('productCategory.show');
Route::put(
    '/admin/products-category/{id}',
    [ProductCategoryController::class, 'update']
)->name('productCategory.update');
Route::delete(
    '/admin/products-category/{id}',
    [ProductCategoryController::class, 'delete']
)->name('productCategory.delete');
Route::post(
    '/admin/products-category',
    [ProductCategoryController::class, 'store']
)->name('productCategory.store');

Route::get('/admin/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::get('/admin/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/admin/products', [ProductController::class, 'store'])->name('product.store');
Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/admin/products/{id}', [ProductController::class, 'delete'])->name('product.delete');
