<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as AdminAuthenticatedSessionController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

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


require __DIR__.'/auth.php';

Route::get('/', [DashboardController::class,'index'])->name('dashboard');
Route::get('/product/{product}', [DashboardController::class,'show'])->name('product');

/* Client Route */
Route::resource('order', OrderController::class);
Route::resource('cart', CartController::class);
Route::post('getroutes', [RouteController::class,'getroutes'])->name('getroutes');
/* End Client Route */

/* Admin Route */
Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function(){
        return view('admin.dashboard');
    })->middleware('admin')->name('home');
    Route::get('/login', [AdminAuthenticatedSessionController::class,'create'])->middleware('guest:admin')->name('login-form');
    Route::post('/login', [AdminAuthenticatedSessionController::class,'store'])->middleware('guest:admin')->name('login');
    Route::post('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])->middleware('auth:admin')->name('logout');
    Route::get('/register', [RegisteredAdminController::class,'create'])->middleware('guest:admin')->name('register');
    Route::post('/register', [RegisteredAdminController::class,'store'])->middleware('guest:admin');
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['admin'])->name('dashboard');

    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/order', AdminOrderController::class)->middleware('auth:admin');
});
/* End Admin Route */
