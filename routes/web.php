<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\RangeOfCarController;
use App\Http\Controllers\AdminController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/cars', [CarModelController::class, 'index'])->name('cars.index');

Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');

Route::get('/ranges', [RangeOfCarController::class, 'index'])->name('ranges.index');

Route::get('/Admin', [AdminController::class, 'index'])->name('Admin');


