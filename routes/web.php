<?php

use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Auth\SecurityController;
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

Route::middleware('auth')->get(
    '/',
    [HomePageController::class, 'show']
)->name('home');

Route::controller(ProductCategoryController::class)->group(
    function () {
        Route::prefix('/admin/products-category')->middleware('auth')->group(
            function () {
                Route::get('/', 'index')->name('productCategory.index');
                Route::get('/create', 'create')->name('productCategory.create');
                Route::get('/{id}', 'show')->name('productCategory.show');
                Route::get('/{id}/edit', 'edit')->name('productCategory.edit');
                Route::put('/{id}', 'update')->name('productCategory.update');
                Route::delete('/{id}', 'delete')->name('productCategory.delete');
                Route::post('/', 'store')->name('productCategory.store');
            }
        );
    }
);

Route::controller(ProductController::class)->group(
    function () {
        Route::prefix('/admin/products')->middleware('auth')->group(
            function () {
                Route::get('/', 'index')->name('product.index');
                Route::get('/create', 'create')->name('product.create');
                Route::get('/{id}', 'show')->name('product.show');
                Route::get('/{id}/edit', 'edit')->name('product.edit');
                Route::put('/{id}', 'update')->name('product.update');
                Route::delete('/{id}', 'delete')->name('product.delete');
                Route::post('/', 'store')->name('product.store');
            }
        );
    }
);
Route::controller(SecurityController::class)->group(
    function () {
        Route::prefix('/auth')->group(
            function () {
                Route::get('/login', 'login')->name('auth.login');
                Route::get('/register', 'register')->name('auth.register');
                Route::post('/login', 'authenticate')->name('auth.authenticate');
                Route::post('/register', 'store')->name('auth.store');
                Route::get('/', 'logout')->name('auth.logout');
            }
        );
    }
);
