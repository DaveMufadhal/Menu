<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/menu', [MenuController::class, 'index']);
Route::get('/menu/{category:slug}', [MenuController::class, 'filter']);
Route::post('/menu/{menu:slug}/cart', [MenuController::class, 'cart']);

Route::get('/cart', [CartController::class, 'index']);




Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/admin', [AdminHomeController::class, 'index'])->middleware('admin');
Route::resource('/admin/user', AdminUserController::class)->middleware('admin');
Route::resource('/admin/menu', AdminMenuController::class)->middleware('admin');
Route::resource('/admin/category', AdminCategoryController::class)->middleware('admin');
