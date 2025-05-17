<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CarModel;
use App\Models\Brand;
use App\Models\RangeOfCar;

class CarModelController extends Controller
{

    public function index(Request $request)
    {
        $carModels = CarModel::with(['brand', 'rangeOfCars'])->get();

        return view('Admin', [
            'section' => 'CarMgr',
            'state' => 'list',
            'data' => compact('carModels'),
            ]);
    }

    public function create()
    {
        $brands = Brand::all();
        $ranges = RangeOfCar::all();
        // Lấy ID lớn nhất hiện tại và cộng thêm 1
        $nextId = \App\Models\CarModel::max('id') + 1;
        return view('Admin', [
            'section' => 'CarMgr',
            'state' => 'create',
            'data' => compact('brands', 'ranges', 'nextId'),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'range_of_cars_id' => 'nullable|exists:range_of_cars,id',
            'name' => 'required|string|max:255|unique:car_models,name',
            'year' => 'nullable|integer|min:2000|max:' . date('Y'),
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/car_models'), $imageName);
            $path = 'images/car_models/' . $imageName;
        }

        CarModel::create([
            'brand_id' => $request->brand_id,
            'range_of_cars_id' => $request->range_of_cars_id,
            'name' => $request->name,
            'year' => $request->year,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect()->route('Admin.CarMgr')->with('success', 'Car model created successfully.');
    }


    public function show(CarModel $carModel)
    {
        $carModel->load(['brand', 'rangeOfCars', 'inventories' => function($query){
            $query->orderBy('price');
        }]);
        return view('car_models.show', compact('carModel'));
    }


    public function edit(string $id)

    {
        $carModel = CarModel::findOrFail($id);
        $brands = Brand::all();
        $ranges = RangeOfCar::all();
        return view('Admin', [
            'section' => 'CarMgr',
            'state' => 'edit',
            'data' => compact('carModel', 'brands', 'ranges'),
        ]);
    }


    public function update(Request $request, $id)
    {
        $carModel = CarModel::findOrFail($id);
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'range_of_cars_id' => 'nullable|exists:range_of_cars,id',
            'name' => 'required|string|max:255|unique:car_models,name,' . $id , 'id',
            'year' => 'nullable|integer|min:2000|max:' . date('Y'),
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->only(['brand_id', 'range_of_cars_id', 'name', 'year', 'description']);
        if ($request->hasFile('image')) {
            if ($carModel->image) {
                Storage::delete($carModel->image);
            }
            $data['image'] = $request->file('image')->store('car_models');
        }
        $carModel->update($data);
        return redirect()->route('Admin.CarMgr')->with('success', 'Car model updated successfully.');
    }


    public function destroy(string $id)
    {
        $carModel = CarModel::findOrFail($id);
        if ($carModel->image) {
            Storage::delete($carModel->image);
        }
        $carModel->delete();
        return redirect()->route('car_models.index')->with('success', 'Car model deleted successfully.');
    }
}
