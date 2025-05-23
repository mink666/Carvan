<?php

namespace App\Http\Controllers;

use App\Models\RangeOfCar;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RangeOfCarController extends Controller
{
    public function index(): View
    {
        $rangesOfCars = RangeOfCar::where('is_active', true)
        ->orderBy('name')
        ->get();

        return view('range_of_car.index', compact('rangesOfCars'));
    }

    public function show(RangeOfCar $rangeOfCar): View
    {
        if (!$rangeOfCar->is_active) {
            abort(404);
        }
        $rangeOfCar->load(['carModels' => function ($query) {
        $query->with(['brand'])
              ->whereHas('inventories', function ($subQuery) {
                  $subQuery->where('is_active', true);
              })
              ->withMin(['inventories' => function ($subQuery) {
                  $subQuery->where('is_active', true);
              }], 'price')
              ->orderBy('brand_id')
              ->orderBy('year', 'desc')
              ->orderBy('name');
    }]);

    return view('range_of_car.show', compact('rangeOfCar'));
    }
}
