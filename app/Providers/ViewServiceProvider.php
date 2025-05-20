<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Brand;
use App\Models\RangeOfCar;
// Nếu bạn sử dụng type hint Builder cho closure ngoài cùng, hãy import nó:
// use Illuminate\Database\Eloquent\Builder;

class ViewServiceProvider extends ServiceProvider // Hoặc AppServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.partials.navbar', function ($view) {
            $brandsWithModelsForNavbar = Brand::where('is_active', true) // Lọc Brand đang hoạt động
                ->with(['carModels' => function ($query) { // $query ở đây là cho CarModel
                    // Chỉ lấy CarModel nào có ít nhất một Inventory đang hoạt động
                    $query->whereHas('inventories', function ($subQuery) { // $subQuery ở đây là cho Inventory
                        $subQuery->where('is_active', true);
                    })
                    // Lấy giá nhỏ nhất từ các Inventory đang hoạt động
                    ->withMin(['inventories' => function ($subQuery) { // $subQuery ở đây là cho Inventory
                        $subQuery->where('is_active', true);
                    }], 'price')
                    ->orderBy('year', 'desc')
                    ->orderBy('name');
                }])
                ->orderBy('name')
                ->get();

            $rangesWithModelsForNavbar = RangeOfCar::where('is_active', true) // Lọc RangeOfCar đang hoạt động
                ->with(['carModels' => function ($query) { // $query ở đây là cho CarModel
                    $query->with(['brand']) // Eager load 'brand' cho CarModel
                          // Chỉ lấy CarModel nào có ít nhất một Inventory đang hoạt động
                          ->whereHas('inventories', function ($subQuery) { // $subQuery ở đây là cho Inventory
                              $subQuery->where('is_active', true);
                          })
                          // Lấy giá nhỏ nhất từ các Inventory đang hoạt động
                          ->withMin(['inventories' => function ($subQuery) { // $subQuery ở đây là cho Inventory
                              $subQuery->where('is_active', true);
                          }], 'price')
                          ->orderBy('year', 'desc')
                          ->orderBy('name');
                }])
                ->orderBy('name')
                ->get();

            // Vòng lặp ->each() trước đó để gán inventories_min_price cho $rangesWithModelsForNavbar
            // không còn cần thiết nữa, vì ->withMin() sẽ tự động thêm thuộc tính 'inventories_min_price'.

            $view->with('brandsWithModelsForNavbar', $brandsWithModelsForNavbar)
                 ->with('rangesWithModelsForNavbar', $rangesWithModelsForNavbar);
        });
    }
}
