<?php

use App\Http\Controllers\_AdminController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
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


// User

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('products/{product:slug}', [ProductController::class, 'show']);

Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destory'])->middleware('auth');

Route::middleware('auth')->group(function () {
    // Profile Edit
    Route::get('profile', [ProfileController::class, 'index']);
    Route::get('profile/edit', [ProfileController::class, 'edit']);
    Route::patch('profile', [ProfileController::class, 'update']);

    // Password Change
    Route::get('user/password/edit', [UserController::class, 'edit']);
    Route::post('user/password/update', [UserController::class, 'update']);
});

Route::middleware('admin')->group(function () {

    // Admin Dashboard and Change Password
    Route::get('admin/dashboard', [_AdminController::class, 'index']);
    Route::get('admin/password/edit', [_AdminController::class, 'edit']);
    Route::post('admin/password/update', [_AdminController::class, 'update']);

    // Products
    Route::resource('admin/products', AdminProductController::class)->except('show');

    // Categories
    Route::resource('admin/categories', AdminCategoryController::class)->except('show');

    // Admins
    Route::resource('admin/admins', AdminController::class)->except('show');

});
