<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CarModel;
use App\Models\Brand;
use App\Models\RangeOfCars;

class CarModelController extends Controller
{

    public function index()
    {
        $carModels = CarModel::with(['brand'])->get();
        return view('car_models.index', compact('carModels'));
    }

    public function create()
    {
        $brands = Brand::all();
        $ranges = RangeOfCars::all();
        return view('car_models.create');
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
            $path = $request->file('image')->store('car_models');
        }

        CarModel::create([
            'brand_id' => $request->brand_id,
            'range_of_cars_id' => $request->range_of_cars_id,
            'name' => $request->name,
            'year' => $request->year,
            'description' => $request->description,
            'image' => $path,
        ]);

        return redirect()->route('car_models.index')->with('success', 'Car model created successfully.');
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)

    {
        $carModel = CarModel::findOrFail($id);
        return view('car_models.edit', compact('carModel'));
    }


    public function update(Request $request, string $id)
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
        return redirect()->route('car_models.index')->with('success', 'Car model updated successfully.');
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
