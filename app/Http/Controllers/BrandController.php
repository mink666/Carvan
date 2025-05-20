<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::where('is_active', true)
        ->orderBy('name')
        ->get();
        return view('brands.index', compact('brands'));
    }

    public function show(Brand $brand)
    {
        if (!$brand->is_active) {
            abort(404); 
        }

        $brand->load(['carModels' => function ($query) {
            $query->withMin('inventories', 'price')
                  ->orderBy('year', 'desc')
                  ->orderBy('name');
        }]);
        return view('brands.show', compact('brand'));
    }
}
