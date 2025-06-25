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
use App\Http\Controllers\CheckoutController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AccountController;

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
    Route::get('auth/login', [AuthController::class, 'showLoginForm'])->name('auth.login.page');
    Route::get('auth/register', [AuthController::class, 'showRegisterForm'])->name('auth.register.page');
    Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');
});

// Route::middleware(['authenticate', 'check.user.status'])->group(function () {
//     Route::get('/',[HomeController::class,'index'])->name('home');
//     Route::get('/home',[HomeController::class,'index'])->name('home.page');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home.page');
Route::get('/admin', [AdminController::class, 'index'])->middleware('admin')->name('admin.index');
Route::middleware(['authenticate'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.page');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.page');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/user/profile', [AccountController::class, 'profile'])->name('user.profile');
    Route::put('/user/profile', [AccountController::class, 'update'])->name('user.profile.update');
    Route::put('/user/profile/change-password', [AccountController::class, 'changePassword'])->name('user.profile.change-password');
});

Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::post('/update', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::post('/store', [OrderController::class, 'store'])->name('admin.orders.store');
        Route::post('/update', [OrderController::class, 'update'])->name('admin.orders.update');
        Route::delete('/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');
        Route::put('/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
        Route::get('/{id}', [OrderController::class, 'show'])->name('admin.orders.show');

    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::post('/store', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::post('/update', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products.index');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.products.store');
        Route::post('/update', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    });
    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin.settings.index');
        Route::post('/', [SettingController::class, 'update'])->name('admin.settings.update');
    });


});
