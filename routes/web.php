<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
    Route::get('auth/login',[AuthController::class,'showLogin'])->name('auth.login.page');
    Route::get('auth/register',[AuthController::class,'showRegister'])->name('auth.register.page');
    Route::post('auth/login',[AuthController::class,'login'])->name('auth.login');
    Route::post('auth/register',[AuthController::class,'register'])->name('auth.register');
});


Route::middleware(['authenticate', 'check.user.status'])->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/home',[HomeController::class,'index'])->name('home.page');
});

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');

Route::get('/admin/users', [AdminController::class, 'users'])->middleware('admin');


Route::delete('/user/delete/{id}', [HomeController::class, 'deleteUser'])->name('home.deleteUser');