<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\RangeController;
use App\Http\Controllers\TestDriveController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');

Route::get('/ranges', [RangeController::class, 'index'])->name('ranges.index');

Route::get('/testDrive', [TestDriveController::class, 'index'])->name('testDrive.index');

