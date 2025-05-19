<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preowned;
use App\Models\Brand;
use App\Models\RangeOfCar;
use App\Models\CarModel;
use Illuminate\Support\Facades\Log;

class PreOwnedController extends Controller
{
    public function index(Request $request)
    {
        $query = Preowned::with(['inventory.carModel.brand', 'inventory.carModel.rangeOfCars']);

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->whereHas('inventory.carModel', function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', "%{$searchTerm}%")
                        ->orWhereHas('brand', function ($q) use ($searchTerm) {
                            $q->where('name', 'LIKE', "%{$searchTerm}%");
                        });
                })
                    ->orWhere('condition', 'LIKE', "%{$searchTerm}%")
                    ->orWhere(function ($q) use ($searchTerm) {
                        if (strpos(strtolower($searchTerm), 'low mileage') !== false) {
                            $q->where('mileage', '<', 30000);
                        }
                    });
            });
        }

        // Filter theo brand
        if ($request->filled('brand')) {
            $query->whereHas('inventory.carModel.brand', function ($q) use ($request) {
                $q->where('id', $request->brand);
            });
        }

        // Filter theo range
        if ($request->filled('range')) {
            $query->whereHas('inventory.carModel.rangeOfCars', function ($q) use ($request) {
                $q->where('id', $request->range);
            });
        }

        // Filter theo khoảng giá
        if ($request->filled('price_range')) {
            switch ($request->price_range) {
                case 'under_300':
                    $query->where('price', '<', 300000000);
                    break;
                case '300_500':
                    $query->whereBetween('price', [300000000, 500000000]);
                    break;
                case '500_800':
                    $query->whereBetween('price', [500000000, 800000000]);
                    break;
                case 'above_800':
                    $query->where('price', '>', 800000000);
                    break;
            }
        }

        // Filter theo số km đã đi
        if ($request->filled('mileage')) {
            switch ($request->mileage) {
                case 'under_50000':
                    $query->where('mileage', '<', 50000);
                    break;
                case '50000_100000':
                    $query->whereBetween('mileage', [50000, 100000]);
                    break;
                case '100000_150000':
                    $query->whereBetween('mileage', [100000, 150000]);
                    break;
                case 'above_150000':
                    $query->where('mileage', '>', 150000);
                    break;
            }
        }

        // Filter theo năm sản xuất
        if ($request->filled('year')) {
            $query->whereHas('inventory.carModel', function ($q) use ($request) {
                $q->where('year', $request->year);
            });
        }

        $preownedCars = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        // Lấy danh sách brands có xe preowned
        $brands = Brand::whereHas('carModels.inventories.preowned')->get();

        // Lấy danh sách ranges có xe preowned
        $ranges = RangeOfCar::whereHas('carModels.inventories.preowned')->get();

        // Lấy danh sách năm sản xuất có xe preowned
        $years = CarModel::whereHas('inventories.preowned')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('preowned.index', compact('preownedCars', 'brands', 'ranges', 'years'));
    }

    public function show($id)
    {
        $preownedCar = Preowned::with([
            'inventory.carModel.brand',
            'inventory.carModel.rangeOfCars'
        ])->findOrFail($id);

        // Lấy các xe tương tự (cùng brand hoặc cùng range)
        $similarVehicles = Preowned::with(['inventory.carModel.brand'])
            ->where('id', '!=', $id)
            ->where(function ($query) use ($preownedCar) {
                $query->whereHas('inventory.carModel', function ($q) use ($preownedCar) {
                    $q->where('brand_id', $preownedCar->inventory->carModel->brand_id)
                        ->orWhere('range_of_cars_id', $preownedCar->inventory->carModel->range_of_cars_id);
                });
            })
            ->take(4)
            ->get();

        return view('preowned.show', compact('preownedCar', 'similarVehicles'));
    }

    public function getRangesByBrand($brandId)
    {
        if ($brandId === 'all') {
            // Trả về tất cả ranges có xe cũ
            $ranges = RangeOfCar::whereHas('carModels.inventories.preowned')
                ->get();
        } else {
            // Trả về ranges của brand cụ thể có xe cũ
            $ranges = RangeOfCar::whereHas('carModels', function ($query) use ($brandId) {
                $query->where('brand_id', $brandId)
                    ->whereHas('inventories.preowned');
            })->get();
        }

        return response()->json($ranges);
    }

    public function getOriginsByBrand($brandId)
    {
        if ($brandId === 'all') {
            // Trả về tất cả origins có xe cũ
            $origins = Brand::whereHas('carModels.inventories.preowned')
                ->distinct()
                ->pluck('location');
        } else {
            // Trả về origin của brand cụ thể có xe cũ
            $origins = Brand::where('id', $brandId)
                ->whereHas('carModels.inventories.preowned')
                ->pluck('location');
        }

        return response()->json($origins);
    }
}
