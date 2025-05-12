<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Inventory::query()
            ->where('is_active', true)
            ->where('is_preowned', false);

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            });
        }

        // Filter brand
        if ($request->filled('brand')) {
            $query->where('brand', $request->input('brand'));
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(12)->withQueryString();


        return view('products.index', compact('products'));
    }
}
