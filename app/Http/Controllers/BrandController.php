<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }


    public function create()
    {
        return view('brands.create');
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


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit', compact('brand'));
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
