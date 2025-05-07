<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Brand;
use App\Models\RangeOfCar;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.partials.navbar', function ($view) {
            $brandsWithModelsForNavbar = Brand::with([
                'carModels' => function ($query) {
                    $query->withMin('inventories', 'price')
                          ->orderBy('year', 'desc')
                          ->orderBy('name');
                }
            ])
            ->orderBy('name')
            ->get();

            $rangesWithModelsForNavbar = RangeOfCar::with([
                'carModels' => function ($query) {
                    $query->with(['brand', 'inventories' => function ($subQuery) {
                        $subQuery->selectRaw('car_model_id, MIN(price) as min_price')->groupBy('car_model_id');
                    }])
                    ->orderBy('year', 'desc')
                    ->orderBy('name');
                }
            ])
            ->orderBy('name')
            ->get();

            $rangesWithModelsForNavbar->each(function ($range) {
                $range->carModels->each(function ($carModel) {
                    $inventoryMinPrice = $carModel->inventories->first();
                    $carModel->inventories_min_price = $inventoryMinPrice ? $inventoryMinPrice->min_price : 0;
                });
            });

            $view->with('brandsWithModelsForNavbar', $brandsWithModelsForNavbar)
                 ->with('rangesWithModelsForNavbar', $rangesWithModelsForNavbar);
        });
    }
}
