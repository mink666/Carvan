<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RangeOfCar;

class AdminRangeOfCarController extends Controller
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
        $range = RangeOfCar::all();
        // Lấy ID lớn nhất hiện tại và cộng thêm 1
        $nextId = \App\Models\RangeOfCar::max('id') + 1;
        return view('Admin', [
            'section' => 'RangesMgr',
            'state' => 'create',
            'data' => compact('range', 'nextId'),
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:range_of_cars,name',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);
        RangeOfCar::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active,
        ]);
        return redirect()->route('Admin.RangesMgr')->with('success', 'Range of car created successfully.');
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
        return view('Admin', [
            'section' => 'RangesMgr',
            'state' => 'edit',
            'data' => compact('range'),
        ]);
    }


    public function update(Request $request, string $id)
    {
        $range = RangeOfCar::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:range_of_cars,name,' . $id,
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);
        $data = $request->only(['name', 'description','is_active']);
        $range->update($data);
        return redirect()->route('Admin.RangesMgr')->with('success', 'Range of car updated successfully.');
    }

    public function destroy(string $id)
    {
        $range = RangeOfCar::findOrFail($id);
        $range ->delete();
        return redirect()->route('range_of_car.index')->with('success', 'Range of car deleted successfully.');
    }
}
