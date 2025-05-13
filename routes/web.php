<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\RangeOfCarController;

use App\Http\Controllers\TestDriveController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\EventController;
// use App\Http\Controllers\NewsController as UserNewsController;
// use App\Http\Controllers\EventController as UserEventController;
use App\Http\Controllers\NewsEventsController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\PreOwnedController;
use App\Http\Controllers\ProductController;


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/contact/submit', [ContactPageController::class, 'handleSubmit'])->name('contact.submit');

Route::get('/car_models', [CarModelController::class, 'index'])->name('car_models.index');
Route::get('/car_models/{carModel}', [CarModelController::class, 'show'])->name('car_models.show');

Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.show');

Route::get('/range_of_car', [RangeOfCarController::class, 'index'])->name('range_of_car.index');
Route::get('/range_of_car/{rangeOfCar}', [RangeOfCarController::class, 'show'])->name('range_of_car.show');


Route::get('/test_drive', [TestDriveController::class, 'index'])->name('test_drive.index');
Route::post('/test_drive', [TestDriveController::class, 'store'])->name('test_drive.store');

Route::get('/preOwned', [PreOwnedController::class, 'index'])->name('preOwned.index');

//Route for Admin
Route::get('/Admin', function () {
    return redirect('/Admin/Dashboard');
})->name('Admin.home');

Route::get('/Admin/{section}', [AdminController::class, 'index'])->name('Admin');

Route::get('/Admin/CarMgr', [CarModelController::class, 'index'])->name('Admin.CarMgr');
Route::get('/Admin/CarMgr/create', [CarModelController::class, 'create'])->name('Admin.CarMgr.create');
Route::post('/Admin/CarMgr/store', [CarModelController::class, 'store'])->name('Admin.CarMgr.store');
Route::get('/Admin/CarMgr/edit/{id}', [CarModelController::class, 'edit'])->name('Admin.CarMgr.edit');

Route::get('/Admin/BrandMgr', [BrandController::class, 'list'])->name('Admin.BrandMgr');
Route::get('/Admin/BrandMgr/create', [BrandController::class, 'create'])->name('Admin.BrandMgr.create');
Route::get('/Admin/BrandMgr/edit/{id}', [BrandController::class, 'edit'])->name('Admin.BrandMgr.edit');

Route::get('/Admin/RangesMgr', [RangeOfCarController::class, 'list'])->name('Admin.RangesMgr');
Route::get('/Admin/RangesMgr/create', [RangeOfCarController::class, 'create'])->name('Admin.RangesMgr.create');
Route::get('/Admin/RangesMgr/edit/{id}', [RangeOfCarController::class, 'edit'])->name('Admin.RangesMgr.edit');

Route::get('/Admin/UserMgr', [AdminController::class, 'userIndex'])->name('Admin.UserMgr');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('news', NewsController::class);
    Route::resource('events', EventController::class);
});

Route::get('/news', [NewsEventsController::class, 'newsIndex'])->name('news.index');
Route::get('/news/{news}', [NewsEventsController::class, 'newsShow'])->name('news.show');
Route::get('/events', [NewsEventsController::class, 'eventsIndex'])->name('events.index');
Route::get('/events/{event}', [NewsEventsController::class, 'eventsShow'])->name('events.show');
Route::get('/news-events', [NewsEventsController::class, 'index'])->name('news_events.index');
//products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// News & Events page
// Route::get('/news-events', function () {
//     return view('news_events.index');
// })->name('news_events.index');

