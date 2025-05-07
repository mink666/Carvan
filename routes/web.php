<?php // Đảm bảo có thẻ mở <?php ở đầu file nếu chưa có

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\RangeController;
use App\Http\Controllers\ContactPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Routes cho trang Contact
// Sửa tên route từ 'contact.show' thành 'contact'
Route::get('/contact', [ContactPageController::class, 'showContactForm'])->name('contact'); // <<< ĐÃ SỬA TÊN ROUTE Ở ĐÂY
Route::post('/contact-submit', [ContactPageController::class, 'handleSubmit'])->name('contact.submit');

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/ranges', [RangeController::class, 'index'])->name('ranges.index');
