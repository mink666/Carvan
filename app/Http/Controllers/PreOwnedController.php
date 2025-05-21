<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preowned;
use Illuminate\Support\Facades\Log;

class PreOwnedController extends Controller
{
    public function index(Request $request)
    {
        $query = Preowned::where('is_active', true);

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('condition', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('story', 'LIKE', "%{$searchTerm}%")
                    ->orWhere(function ($q) use ($searchTerm) {
                        if (strpos(strtolower($searchTerm), 'low mileage') !== false) {
                            $q->where('mileage', '<', 30000);
                        }
                    });
            });
        }

        // Filter theo brand
        if ($request->filled('brand')) {
            $brandName = $request->brand;
            $query->where('name', 'LIKE', "%{$brandName}%");
        }

        // Filter theo condition
        if ($request->filled('condition')) {
            $condition = $request->condition;
            $query->where('condition', $condition);
        }

        // Filter theo khoảng giá
        if ($request->filled('price_range')) {
            switch ($request->price_range) {
                case 'under_500':
                    $query->where('price', '<', 500000000);
                    break;
                case '500_1000':
                    $query->whereBetween('price', [500000000, 1000000000]);
                    break;
                case '1000_2000':
                    $query->whereBetween('price', [1000000000, 2000000000]);
                    break;
                case 'above_2000':
                    $query->where('price', '>', 2000000000);
                    break;
            }
        }

        // Filter theo số km đã đi
        if ($request->filled('mileage')) {
            switch ($request->mileage) {
                case 'under_10000':
                    $query->where('mileage', '<', 10000);
                    break;
                case '10000_30000':
                    $query->whereBetween('mileage', [10000, 30000]);
                    break;
                case '30000_50000':
                    $query->whereBetween('mileage', [30000, 50000]);
                    break;
                case 'above_50000':
                    $query->where('mileage', '>', 50000);
                    break;
            }
        }

        // Filter theo năm sản xuất (từ tên xe)
        if ($request->filled('year')) {
            $year = $request->year;
            $query->where('name', 'LIKE', "%{$year}%");
        }

        // Get all preowned cars for comparison
        $allPreownedCars = Preowned::where('is_active', true)->get();

        $preownedCars = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        // Lấy danh sách brands từ tên xe
        $brands = Preowned::select('name')
            ->get()
            ->map(function ($car) {
                $nameParts = explode(' ', $car->name);
                return $nameParts[0]; // Lấy phần đầu tiên của tên (thường là tên hãng)
            })
            ->unique()
            ->values();

        // Lấy danh sách năm từ tên xe
        $years = Preowned::select('name')
            ->get()
            ->map(function ($car) {
                preg_match('/\d{4}/', $car->name, $matches);
                return $matches[0] ?? null;
            })
            ->filter()
            ->unique()
            ->sort()
            ->values();

        return view('preowned.index', compact('preownedCars', 'brands', 'years', 'allPreownedCars'));
    }

    public function show($id)
    {
        $preownedCar = Preowned::where('is_active', true)->findOrFail($id);

        // Lấy các xe tương tự (cùng hãng hoặc cùng loại)
        $brandName = explode(' ', $preownedCar->name)[0];
        $similarVehicles = Preowned::where('is_active', true)->where('id', '!=', $id)
            ->where(function ($query) use ($brandName, $preownedCar) {
                $query->where('name', 'LIKE', "{$brandName}%")
                    ->orWhere(function ($q) use ($preownedCar) {
                        // Tìm xe cùng loại (SUV, Sedan, etc.) từ story
                        $carTypes = ['SUV', 'Sedan', 'Pickup', 'Crossover'];
                        foreach ($carTypes as $type) {
                            if (stripos($preownedCar->story, $type) !== false) {
                                $q->orWhere('story', 'LIKE', "%{$type}%");
                            }
                        }
                    });
            })
            ->take(4)
            ->get();

        return view('preowned.show', compact('preownedCar', 'similarVehicles'));
    }

    public function getRangesByBrand($brandName)
    {
        if ($brandName === 'all') {
            // Trả về tất cả ranges có xe cũ
            $ranges = collect(['Sedan', 'SUV', 'Pickup Truck', 'Crossover'])
                ->filter(function ($range) {
                    return Preowned::where('story', 'LIKE', "%{$range}%")->exists();
                });
        } else {
            // Trả về ranges của brand cụ thể có xe cũ
            $ranges = collect(['Sedan', 'SUV', 'Pickup Truck', 'Crossover'])
                ->filter(function ($range) use ($brandName) {
                    return Preowned::where('name', 'LIKE', "{$brandName}%")
                        ->where('story', 'LIKE', "%{$range}%")
                        ->exists();
                });
        }

        return response()->json($ranges);
    }

    public function getOriginsByBrand($brandName)
    {
        $origins = [
            'Toyota' => 'Japan',
            'Honda' => 'Japan',
            'Ford' => 'USA',
            'Hyundai' => 'Korea',
            'Mazda' => 'Japan',
            'Kia' => 'Korea',
            'Nissan' => 'Japan',
            'Subaru' => 'Japan',
            'Volkswagen' => 'Germany',
            'Volvo' => 'Sweden'
        ];

        if ($brandName === 'all') {
            // Trả về tất cả origins có xe cũ
            $brandNames = Preowned::select('name')
                ->get()
                ->map(function ($car) {
                    return explode(' ', $car->name)[0];
                })
                ->unique();

            $availableOrigins = collect($origins)
                ->filter(function ($origin, $brand) use ($brandNames) {
                    return $brandNames->contains($brand);
                })
                ->unique()
                ->values();

            return response()->json($availableOrigins);
        } else {
            // Trả về origin của brand cụ thể
            return response()->json([$origins[$brandName] ?? 'Unknown']);
        }
    }
}
