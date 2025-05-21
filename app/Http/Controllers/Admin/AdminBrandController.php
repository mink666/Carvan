<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class AdminBrandController extends Controller
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
            'company_full_name' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'founder' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'motto' => 'nullable|string|max:255',
            'website_url' => 'nullable|url|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'key_achievements' => 'nullable|array',
            'key_achievements.*' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $data = $request->only([
            'name', 'company_full_name', 'year', 'founder', 'description', 'motto',
            'website_url', 'location'
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('brands');
        }

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('brands');
        }

        if ($request->has('key_achievements')) {
            $data['key_achievements'] = json_encode($request->input('key_achievements'));
        }

        Brand::create($data);
        return redirect()->route('Admin.BrandMgr')->with('success', 'Brand created successfully.');
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
            'company_full_name' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'founder' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'motto' => 'nullable|string|max:255',
            'website_url' => 'nullable|url|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'key_achievements' => 'nullable|array',
            'key_achievements.*' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'required|boolean',
        ]);

        $brand = Brand::findOrFail($id);

        $data = $request->only([
            'name', 'company_full_name', 'year', 'founder', 'description', 'motto',
            'website_url', 'location','is_active'
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('brands');
        }

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('brands');
        }

        if ($request->has('key_achievements')) {
            $data['key_achievements'] = json_encode($request->input('key_achievements'));
        }

        $brand->update($data);

        return redirect()->route('Admin.BrandMgr')->with('success', 'Brand updated successfully.');
    }



    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
