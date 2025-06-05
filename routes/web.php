<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\AdminMiddleware;

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

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::middleware(['login'])->group(function () {
    Route::get('auth/login',[AuthController::class,'showLoginForm'])->name('auth.login.page');
    Route::get('auth/register',[AuthController::class,'showRegisterForm'])->name('auth.register.page');
    Route::post('auth/login',[AuthController::class,'login'])->name('auth.login');
    Route::post('auth/register',[AuthController::class,'register'])->name('auth.register');
});

// Route::middleware(['authenticate', 'check.user.status'])->group(function () {
//     Route::get('/',[HomeController::class,'index'])->name('home');
//     Route::get('/home',[HomeController::class,'index'])->name('home.page');
// });

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/home',[HomeController::class,'index'])->name('home.page');
Route::get('/admin', [AdminController::class, 'index'])->middleware('admin')->name('admin.index');
Route::get('/cart', [CartController::class, 'index'])->name('cart.page');
Route::get('/admin/categories', [CategoryController::class, 'index'])->middleware('admin')->name('admin.categories.index');
Route::get('/admin/products', [ProductController::class, 'index'])->middleware('admin')->name('admin.products.index');


Route::get('/admin/users', [UserController::class, 'index'])->middleware('admin')->name('admin.users.index');
Route::get('/admin/orders', [OrderController::class, 'index'])->middleware('admin')->name('admin.orders.index');
Route::get('/admin/settings', [SettingController::class, 'index'])->middleware('admin')->name('admin.settings.index');
