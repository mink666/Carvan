<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Preowned;
use Illuminate\Http\Request;

class AdminPreOwnedController extends Controller
{
    //
    public function list()
    {
        $PreOwneds = Preowned::get();
        return view('Admin', [
            'section' => 'PreOwnedMgr',
            'state' => 'list',
            'data' => compact('PreOwneds'),
        ]);
    }

    public function edit()
    {
        $PreOwneds = Preowned::get();
        return view('Admin', [
            'section' => 'PreOwnedMgr',
            'state' => 'edit',
            'data' => compact('PreOwneds'),
        ]);
    }

    public function create()
    {
        $PreOwneds = Preowned::all();
        // Lấy ID lớn nhất hiện tại và cộng thêm 1
        $nextId = \App\Models\Brand::max('id') + 1;
        return view('Admin', [
            'section' => 'PreOwnedMgr',
            'state' => 'create',
            'data' => compact('PreOwneds', 'nextId'),
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'mileage' => 'nullable|integer',
            'story' => 'nullable|string',
            'color' => 'nullable|string|max:255',
            'interior_color' => 'nullable|string|max:255',
            'condition' => 'nullable|in:excellent,very good,good,fair,poor',
            'features' => 'nullable|string',
            'purchase_date' => 'nullable|date',
            'price' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'name', 'mileage', 'story', 'color', 'interior_color', 'condition',
            'features', 'purchase_date', 'price',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->storeAs('images/preowned', $filename, 'public');
            $data['image'] = 'images/preowned/' . $filename;
        }


        Preowned::create($data);
        return redirect()->route('Admin.PreOwnedMgr')->with('success', 'PreOwnd car created successfully.');
    }

    public function update(Request $request, $id)
    {
        $preowned = Preowned::findOrFail($id);

        $request->validate([
            'name' => 'nullable|string|max:255',
            'mileage' => 'nullable|integer',
            'story' => 'nullable|string',
            'color' => 'nullable|string|max:255',
            'interior_color' => 'nullable|string|max:255',
            'condition' => 'nullable|in:excellent,very good,good,fair,poor',
            'features' => 'nullable|string',
            'purchase_date' => 'nullable|date',
            'price' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validated = $request->only([
            'name', 'mileage', 'story', 'color', 'interior_color', 'condition',
            'features', 'purchase_date', 'price',
        ]);

        // Nếu có ảnh mới thì xóa ảnh cũ và cập nhật
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('preowned_images');
        }

        $preowned->update($validated);

        return redirect()->back()->with('success', 'PreOwned updated successfully.');
    }
}
