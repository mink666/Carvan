<?php

namespace App\Http\Controllers;

use App\Models\RangeOfCar;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RangeOfCarController extends Controller
{
    public function index(): View
    {
        // Lấy tất cả các dòng xe, sắp xếp theo tên, có thể phân trang nếu muốn
        $rangesOfCars = RangeOfCar::orderBy('name')->paginate(12); // Ví dụ phân trang 12 mục/trang
        // Hoặc nếu không muốn phân trang:
        // $rangesOfCars = RangeOfCar::orderBy('name')->get();

        return view('range_of_car.index', compact('rangesOfCars'));
        // Đảm bảo view của bạn là resources/views/pages/range_of_car/index.blade.php
    }

    // Method show của bạn cho trang chi tiết từng dòng xe
    public function show(RangeOfCar $rangeOfCar): View
    {
        $rangeOfCar->load(['carModels' => function ($query) {
            $query->with(['brand'])
                  ->withMin('inventories', 'price')
                  ->orderBy('brand_id')
                  ->orderBy('year', 'desc')
                  ->orderBy('name');
        }]);
        return view('range_of_car.show', compact('rangeOfCar'));
    }
}
