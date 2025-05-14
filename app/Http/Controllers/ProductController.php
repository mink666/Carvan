<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Brand;
use App\Models\RangeOfCar;
use App\Models\CarModel;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Inventory::with(['carModel.brand', 'carModel.rangeOfCars', 'preowned'])
            ->where('is_active', true)
            ->where('is_preowned', false);

        // Xử lý tìm kiếm
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->whereHas('carModel', function ($subQ) use ($searchTerm) {
                    $subQ->where('name', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                        ->orWhere('year', 'LIKE', "%{$searchTerm}%")
                        ->orWhereHas('brand', function ($brandQ) use ($searchTerm) {
                            $brandQ->where('name', 'LIKE', "%{$searchTerm}%");
                        })
                        ->orWhereHas('rangeOfCars', function ($rangeQ) use ($searchTerm) {
                            $rangeQ->where('name', 'LIKE', "%{$searchTerm}%");
                        });
                });
            });
        }

        // Xử lý filter theo brand
        if ($request->filled('brand')) {
            $query->whereHas('carModel.brand', function ($q) use ($request) {
                $q->where('id', $request->brand);
            });
        }

        // Xử lý filter theo range
        if ($request->filled('range')) {
            $query->whereHas('carModel.rangeOfCars', function ($q) use ($request) {
                $q->where('id', $request->range);
            });
        }

        // Xử lý filter theo loại xe (mới/cũ)
        if ($request->filled('type')) {
            $query->where('is_preowned', $request->type === 'preowned');
        }

        // Filter theo khoảng giá (đã được cập nhật theo VND)
        if ($request->filled('price_range')) {
            switch ($request->price_range) {
                case 'under_50000':
                    $query->where('price', '<', 1000000000); // Dưới 1 tỷ VND
                    break;
                case '50000_100000':
                    $query->whereBetween('price', [1000000000, 2000000000]); // 1-2 tỷ VND
                    break;
                case '100000_200000':
                    $query->whereBetween('price', [2000000000, 4000000000]); // 2-4 tỷ VND
                    break;
                case 'above_200000':
                    $query->where('price', '>', 4000000000); // Trên 4 tỷ VND
                    break;
            }
        }

        // Filter theo xuất xứ
        if ($request->filled('origin')) {
            $query->whereHas('carModel.brand', function ($q) use ($request) {
                $q->where('location', $request->origin);
            });
        }

        // Filter theo năm sản xuất
        if ($request->filled('year')) {
            $query->whereHas('carModel', function ($q) use ($request) {
                $q->where('year', $request->year);
            });
        }

        $products = $query->paginate(12)->withQueryString();

        // Chỉ lấy brands có xe active
        $brands = Brand::whereHas('carModels.inventories', function ($query) {
            $query->where('is_active', true)
                ->where('is_preowned', false);
        })->get();

        // Chỉ lấy ranges có xe active
        $ranges = RangeOfCar::whereHas('carModels.inventories', function ($query) {
            $query->where('is_active', true)
                ->where('is_preowned', false);
        })->get();

        // Lấy origins dựa trên brand được chọn
        if ($request->filled('brand')) {
            $origins = Brand::where('id', $request->brand)
                ->whereHas('carModels.inventories', function ($query) {
                    $query->where('is_active', true)
                        ->where('is_preowned', false);
                })
                ->pluck('location');
        } else {
            $origins = Brand::whereHas('carModels.inventories', function ($query) {
                $query->where('is_active', true)
                    ->where('is_preowned', false);
            })->distinct()->pluck('location');
        }

        $years = CarModel::whereHas('inventories', function ($query) {
            $query->where('is_active', true)
                ->where('is_preowned', false);
        })->distinct()->orderBy('year', 'desc')->pluck('year');

        return view('products.index', compact('products', 'brands', 'ranges', 'origins', 'years'));
    }

    public function show($id)
    {
        $carModel = CarModel::with(['brand', 'rangeOfCars', 'inventories'])
            ->findOrFail($id);

        return view('products.show', compact('carModel'));
    }

    public function getRangesByBrand($brandId)
    {
        try {
            if ($brandId === 'all') {
                // Trả về tất cả ranges có xe active
                $ranges = RangeOfCar::whereHas('carModels.inventories', function ($query) {
                    $query->where('is_active', true)
                        ->where('is_preowned', false);
                })->get();
            } else {
                // Trả về ranges của brand cụ thể có xe active
                $ranges = RangeOfCar::whereHas('carModels', function ($query) use ($brandId) {
                    $query->where('brand_id', $brandId)
                        ->whereHas('inventories', function ($invQuery) {
                            $invQuery->where('is_active', true)
                                ->where('is_preowned', false);
                        });
                })->get();
            }

            return response()->json($ranges);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Có lỗi xảy ra khi tải danh sách model range'], 500);
        }
    }

    public function getOriginsByBrand($brandId)
    {
        try {
            if ($brandId === 'all') {
                // Trả về tất cả origins có xe active
                $origins = Brand::whereHas('carModels.inventories', function ($query) {
                    $query->where('is_active', true)
                        ->where('is_preowned', false);
                })->distinct()->pluck('location');
            } else {
                // Trả về origin của brand cụ thể có xe active
                $origins = Brand::where('id', $brandId)
                    ->whereHas('carModels.inventories', function ($query) {
                        $query->where('is_active', true)
                            ->where('is_preowned', false);
                    })
                    ->pluck('location');
            }

            return response()->json($origins);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Có lỗi xảy ra khi tải danh sách xuất xứ'], 500);
        }
    }
}
