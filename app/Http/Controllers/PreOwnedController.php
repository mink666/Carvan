<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreOwned;

class PreOwnedController extends Controller
{
    public function index()
    {
        $preownedCars = Preowned::with(['inventory.carModel.brand', 'inventory.carModel.rangeOfCars'])
            ->orderBy('created_at', 'desc')
            ->paginate(12);
            dd($preownedCars);

        return view('preowned.index', compact('preownedCars'));
    }

    public function show(PreOwned $preOwned)
    {
         // Eager load các thông tin cần thiết
        $preownedCar->load(['inventory.carModel.brand', 'inventory.carModel.rangeOfCars']);

        // Lấy các xe pre-owned khác để gợi ý (ví dụ)
        $relatedPreownedCars = Preowned::with(['inventory.carModel.brand'])
            ->where('id', '!=', $preownedCar->id) // Loại trừ xe hiện tại
            ->inRandomOrder()
            ->take(4) // Lấy 4 xe ngẫu nhiên
            ->get();

        return view('preowned.show', compact('preownedCar', 'relatedPreownedCars'));
    }
}
