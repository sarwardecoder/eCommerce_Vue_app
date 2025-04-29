<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SSLCommerzCredentialController;

Route::redirect("/", '/dashboard');


Route::middleware(['auth', 'RoleMiddleware:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('page.dashboard');

    Route::resource('/settings', SSLCommerzCredentialController::class);
    Route::resource('/brands', BrandController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/sliders', SliderController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/orders', OrderController::class);
});


Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');