<?php

use App\Http\Controllers\Admin\User\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\ProductController;
// Xử lý login khi submit form
Route::get('/admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

// Xử lý xác thực login trước khi vào main
Route::middleware(['auth'])->group(function () {

    #Group admin
    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Group menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [\App\Http\Controllers\Admin\ProductController::class, 'store']);
            Route::get('list', [\App\Http\Controllers\Admin\ProductController::class, 'index']);
            Route::get('edit/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'show']);
            Route::post('edit/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'update']);
            Route::DELETE('destroy', [\App\Http\Controllers\Admin\ProductController::class, 'destroy']);
        });

    });

});

