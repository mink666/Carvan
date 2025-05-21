<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Brand;
use App\Models\CarModel;
use App\Models\Preowned;
use App\Models\News;

class PageController extends Controller
{
    public function home(): View
    {
        $featuredBrands = Brand::where('is_active', true)
                                ->inRandomOrder()
                                ->take(10)
                                ->get();
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

        $featuredPreownedCars = Preowned::where('is_active', true)
            ->inRandomOrder()
            ->take(3)
            ->get();

        $latestNews = News::where('is_active', true)
                         ->orderBy('date', 'desc')
                         ->take(4)
                         ->get();
        return view('home', compact('featuredBrands', 'popularModels', 'featuredPreownedCars', 'latestNews'));
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
