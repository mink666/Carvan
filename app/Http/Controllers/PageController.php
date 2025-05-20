<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Preowned;

class PageController extends Controller
{
    public function home(): View
    {
        $featuredBrands = Brand::take(10)->inRandomOrder()->get();
        $popularModels = CarModel::with([
            'brand',
            'rangeOfCars',
            'inventories' => function ($query) {
                $query->where('is_active', true)
                      ->orderBy('price', 'asc');
            }
        ])
        ->whereHas('inventories', function ($query) {
            $query->where('is_active', true);
        })
        ->inRandomOrder()
        ->take(3)
        ->get();

        $popularModels->each(function ($model) {
            $activeInventories = $model->inventories->where('is_active', true);
            $model->displayInventory = $activeInventories->sortBy('price')->first(); // Lấy inventory có giá thấp nhất đang active
            $model->inventories_min_price = $model->displayInventory ? $model->displayInventory->price : 0;
        });
        // $featuredPreownedCars = Preowned::with([
        //     'inventory.carModel.brand',
        //     'inventory.carModel.rangeOfCars'
        // ])
        // ->whereHas('inventory.carModel.brand') // Đảm bảo có đủ thông tin liên kết
        // ->whereHas('inventory', function ($query) {
        //     $query->where('is_active', true); // Chỉ lấy inventory preowned đang active
        // })
        // ->inRandomOrder()
        // ->take(3) // Hiển thị 3 xe pre-owned nổi bật
        // ->get();
        $featuredPreownedCars = Preowned::inRandomOrder()
            ->take(3) // Hiển thị 3 xe pre-owned nổi bật
            ->get();

        return view('home', compact('featuredBrands', 'popularModels', 'featuredPreownedCars'));
    }

    public function about(): View
    {
        return view('about');
    }

    public function contact(): View
    {
        return view('contact');
    }
}
