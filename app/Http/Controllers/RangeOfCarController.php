<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RangeOfCar;

class RangeOfCarController extends Controller
{

    public function index()
    {
        $range = RangeOfCar::all();
        return view('range_of_car.index', compact('ranges'));
    }

    public function list()
    {
        $ranges = RangeOfCar::orderBy('name')->get();
        return view('Admin', [
            'section' => 'RangesMgr',
            'state' => 'list',
            'data' => compact('ranges'),
        ]);
    }


    public function create()
    {
        return view('range_of_car.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:range_of_cars,name',
            'description' => 'nullable|string',
        ]);
        RangeOfCar::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('range_of_car.index')->with('success', 'Range of car created successfully.');
    }

    public function show(RangeOfCar $rangeOfCar)
    {
        $rangeOfCar->load(['carModels' => function ($query) {
            $query->with(['brand'])
                  ->withMin('inventories', 'price')
                  ->orderBy('brand_id')
                  ->orderBy('year', 'desc')
                  ->orderBy('name');
        }]);
        return view('range_of_car.show', compact('rangeOfCar'));
    }

    public function edit(string $id)
    {
        $range = RangeOfCar::findOrFail($id);
        return view('range_of_car.edit', compact('rangeOfCar'));
    }


    public function update(Request $request, string $id)
    {
        $range = RangeOfCar::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:range_of_cars,name,' . $id,
            'description' => 'nullable|string',
        ]);
        $data = $request->only(['name', 'description']);
        $range->update($data);
        return redirect()->route('range_of_car.index')->with('success', 'Range of car updated successfully.');
    }

    public function destroy(string $id)
    {
        $range = RangeOfCar::findOrFail($id);
        $range ->delete();
        return redirect()->route('range_of_car.index')->with('success', 'Range of car deleted successfully.');
    }
}
