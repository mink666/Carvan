<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::orderBy('name')->get();
        return view('brands.index', compact('brands'));
    }

    public function list()
    {
        $brands = Brand::orderBy('name')->get();
        return view('Admin', [
            'section' => 'BrandMgr',
            'state' => 'list',
            'data' => compact('brands'),
        ]);
    }


    public function create()
    {
        $brands = Brand::all();
        // Lấy ID lớn nhất hiện tại và cộng thêm 1
        $nextId = \App\Models\Brand::max('id') + 1;
        return view('Admin', [
            'section' => 'BrandMgr',
            'state' => 'create',
            'data' => compact('brands', 'nextId'),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
            'year' => 'nullable|integer|min:2000|max:' . date('Y'),
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'year', 'description', 'location']);
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('brands');
        }else {
            $data['logo'] = null;
        }
        Brand::create($data);
        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }


    public function show(Brand $brand)
    {
        $brand->load(['carModels' => function ($query) {
            $query->withMin('inventories', 'price')
                  ->orderBy('year', 'desc')
                  ->orderBy('name');
        }]);
        return view('brands.show', compact('brand'));
    }


    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('Admin', [
            'section' => 'BrandMgr',
            'state' => 'edit',
            'data' => compact('brand'),
            ]);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $id,
            'year' => 'nullable|integer|min:2000|max:' . date('Y'),
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = $request->only(['name', 'year', 'description', 'location']);
        $brand = Brand::findOrFail($id);
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('brands');
        }
        $brand->update($data);
        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }


    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
