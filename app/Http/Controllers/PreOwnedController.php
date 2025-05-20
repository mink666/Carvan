<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preowned;
use Illuminate\Support\Facades\Log;

class PreOwnedController extends Controller
{
    public function index(Request $request)
    {
        $query = Preowned::query();

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

        // Filter theo range (SUV, Sedan, etc.)
        if ($request->filled('range')) {
            $rangeName = $request->range;
            $query->where('story', 'LIKE', "%{$rangeName}%");
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

        // Filter theo năm sản xuất (từ tên xe)
        if ($request->filled('year')) {
            $year = $request->year;
            $query->where('name', 'LIKE', "%{$year}%");
        }

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

        // Lấy danh sách ranges từ story
        $ranges = collect(['Sedan', 'SUV', 'Pickup Truck', 'Crossover'])
            ->filter(function ($range) {
                return Preowned::where('story', 'LIKE', "%{$range}%")->exists();
            });

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

        return view('preowned.index', compact('preownedCars', 'brands', 'ranges', 'years'));
    }

    public function show($id)
    {
        $preownedCar = Preowned::findOrFail($id);

        // Lấy các xe tương tự (cùng hãng hoặc cùng loại)
        $brandName = explode(' ', $preownedCar->name)[0];
        $similarVehicles = Preowned::where('id', '!=', $id)
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
