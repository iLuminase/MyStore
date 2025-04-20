<?php

use App\Http\Controllers\Admin\User\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MainController;
use \App\Http\Controllers\Admin\MenuController;

// Xử lý login khi submit form
Route::get('/admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

// Xử lý xác thực login trước khi vào main
Route::middleware(['auth'])->group(function () {

    #Group admin
    Route::prefix('admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
    });

    #Group menu
    Route::prefix('admin/menus')->group(function () {
        Route::get('add', [MenuController::class, 'create']);
        Route::post('add', [MenuController::class, 'store']);
    });

});

