<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Brand;
use App\Models\CarModel;

class PageController extends Controller
{
    public function home(): View
    {
        $featuredBrands = Brand::take(4)->inRandomOrder()->get();
        $popularModels = CarModel::with(['brand']) // Load brand information
                            ->withMin('inventories', 'price') // <<< TẠO RA 'inventories_min_price'
                            ->inRandomOrder()
                            ->take(3)
                            ->get();

        return view('home', compact('featuredBrands', 'popularModels'));
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
