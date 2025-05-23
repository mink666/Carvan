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
use App\Http\Controllers\NewsEventsController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\PreOwnedController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminRangeOfCarController;
use App\Http\Controllers\Admin\AdminTestDriveController;
use App\Http\Controllers\Admin\AdminPreOwnedController;
use App\Http\Controllers\TestDriveScheduleController;
use App\Http\Middleware\CheckAdminRole;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Models\Range;
use App\Models\Product;
use App\Models\TestDriveSchedule;

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
Route::get('/schedules', [TestDriveScheduleController::class, 'index'])->name('schedules.index');
Route::get('/schedules/create', [TestDriveScheduleController::class, 'create'])->name('schedules.create');
Route::post('/schedules', [TestDriveScheduleController::class, 'store'])->name('schedules.store');
Route::get('/schedules/{schedule}/edit', [TestDriveScheduleController::class, 'edit'])->name('schedules.edit');
Route::put('/schedules/{schedule}', [TestDriveScheduleController::class, 'update'])->name('schedules.update');
Route::delete('/schedules/{schedule}', [TestDriveScheduleController::class, 'cancel'])->name('schedules.cancel');


//Route for Admin
Route::middleware([CheckAdminRole::class])->group(function () {
    Route::get('/Admin', function () {
        return redirect('/Admin/Dashboard');
    })->name('Admin.home');
});

Route::get('/Admin', function () {
        return redirect()->route('AdminLogin');
    })->name('Admin.login');


Route::get('/Admin/{section}', [AdminController::class, 'index'])->name('Admin');

Route::get('/Admin/CarMgr', [CarModelController::class, 'index'])->name('Admin.CarMgr');
Route::get('/Admin/CarMgr/create', [CarModelController::class, 'create'])->name('Admin.CarMgr.create');
Route::post('/Admin/CarMgr/store', [CarModelController::class, 'store'])->name('Admin.CarMgr.store');
Route::get('/Admin/CarMgr/edit/{id}', [CarModelController::class, 'edit'])->name('Admin.CarMgr.edit');
Route::put('/Admin/CarMgr/update/{id}', [CarModelController::class, 'update'])->name('Admin.CarMgr.update');

Route::get('/Admin/BrandMgr', [AdminBrandController::class, 'list'])->name('Admin.BrandMgr');
Route::get('/Admin/BrandMgr/create', [AdminBrandController::class, 'create'])->name('Admin.BrandMgr.create');
Route::post('/Admin/BrandMgr/store', [AdminBrandController::class, 'store'])->name('Admin.BrandMgr.store');
Route::get('/Admin/BrandMgr/edit/{id}', [AdminBrandController::class, 'edit'])->name('Admin.BrandMgr.edit');
Route::put('/Admin/BrandMgr/update/{id}', [AdminBrandController::class, 'update'])->name('Admin.BrandMgr.update');

Route::get('/Admin/RangesMgr', [AdminRangeOfCarController::class, 'list'])->name('Admin.RangesMgr');
Route::get('/Admin/RangesMgr/create', [AdminRangeOfCarController::class, 'create'])->name('Admin.RangesMgr.create');
Route::post('/Admin/RangesMgr/store', [AdminRangeOfCarController::class, 'store'])->name('Admin.RangesMgr.store');
Route::get('/Admin/RangesMgr/edit/{id}', [AdminRangeOfCarController::class, 'edit'])->name('Admin.RangesMgr.edit');
Route::put('/Admin/RangesMgr/update/{id}', [AdminRangeOfCarController::class, 'update'])->name('Admin.RangesMgr.update');

Route::get('/Admin/UserMgr', [UserController::class, 'index'])->name('Admin.UserMgr');
Route::get('/Admin/UserMgr/create', [UserController::class, 'create'])->name('Admin.UserMgr.create');
Route::post('/Admin/UserMgr/store', [UserController::class, 'store'])->name('Admin.UserMgr.store');
Route::get('/Admin/UserMgr/edit/{id}', [UserController::class, 'edit'])->name('Admin.UserMgr.edit');
Route::put('/Admin/UserMgr/update/{id}', [UserController::class, 'update'])->name('Admin.UserMgr.update');
Route::delete('/Admin/UserMgr/delete/{id}', [UserController::class, 'destroy'])->name('Admin.UserMgr.destroy');

Route::get('/Admin/PreOwnedMgr', [AdminPreOwnedController::class, 'list'])->name('Admin.PreOwnedMgr');
Route::get('/Admin/PreOwnedMgr/edit/{id}', [AdminPreOwnedController::class, 'edit'])->name('Admin.PreOwnedMgr.edit');
Route::get('/Admin/PreOwnedMgr/create', [AdminPreOwnedController::class, 'create'])->name('Admin.PreOwnedMgr.create');
Route::post('/Admin/PreOwnedMgr/store', [AdminPreOwnedController::class, 'store'])->name('Admin.PreOwnedMgr.store');
Route::put('/Admin/PreOwnedMgr/update/{id}', [AdminPreOwnedController::class, 'update'])->name('Admin.PreOwnedMgr.update');

Route::get('/Admin/TestDriveRequestMgr', [AdminTestDriveController::class, 'list'])->name('Admin.TestDriveMgr');
Route::get('/Admin/TestDriveRequestMgr/edit/{id}', [AdminTestDriveController::class, 'edit'])->name('Admin.TestDriveRequestMgr.edit');
Route::get('/Admin/TestDriveScheduleMgr/edit/{id}', [AdminTestDriveController::class, 'editSchedule'])->name('Admin.TestDriveScheduleMgr.edit');


// Route::get('/Admin/TestDriveRequestMgr', [AdminTestDriveController::class, 'list'])->name('Admin.TestDriveRequest');

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
Route::get('/products/{carModel}', [ProductController::class, 'show'])->name('products.show');
Route::get('/get-ranges-by-brand/{brandId}', [ProductController::class, 'getRangesByBrand'])->name('get.ranges.by.brand');
Route::get('/get-origins-by-brand/{brandId}', [ProductController::class, 'getOriginsByBrand'])->name('get.origins.by.brand');
//preowned
Route::get('/preowned', [PreOwnedController::class, 'index'])->name('preowned.index');
Route::get('/preowned/{id}', [PreOwnedController::class, 'show'])->name('preowned.show');
Route::get('/get-ranges-by-brand-preowned/{brandId}', [PreOwnedController::class, 'getRangesByBrand'])->name('get.ranges.by.brand.preowned');
Route::get('/get-origins-by-brand-preowned/{brandId}', [PreOwnedController::class, 'getOriginsByBrand'])->name('get.origins.by.brand.preowned');


Route::get('/LoginAdmin', [AuthController::class, 'showLogin'])->name('AdminLogin');
Route::post('/LoginAdmin', [AuthController::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('LoginAdmin');
})->name('logout');
