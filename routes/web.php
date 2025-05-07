<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\RangeOfCarController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\NewsController as UserNewsController;
use App\Http\Controllers\EventController as UserEventController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/car_models', [CarModelController::class, 'index'])->name('car_models.index');
Route::get('/car_models/{carModel}', [CarModelController::class, 'show'])->name('car_models.show');

Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.show');

Route::get('/range_of_car', [RangeOfCarController::class, 'index'])->name('range_of_car.index');
Route::get('/range_of_car/{rangeOfCar}', [RangeOfCarController::class, 'show'])->name('range_of_car.show');


//Route for Admin
Route::get('/Admin', function () {
    return redirect('/Admin/Dashboard');
})->name('Admin.home');

Route::get('/Admin/{section}', [AdminController::class, 'index'])->name('Admin');

Route::prefix('admin')->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('events', EventController::class);
});

Route::get('/news', [UserNewsController::class, 'index'])->name('user.news.index');
Route::get('/news/{news}', [UserNewsController::class, 'show'])->name('user.news.show');

Route::get('/events', [UserEventController::class, 'index'])->name('user.events.index');
Route::get('/events/{event}', [UserEventController::class, 'show'])->name('user.events.show');

Route::get('/news-events', function () {
    return view('news_events.index');
})->name('news_events.index');
