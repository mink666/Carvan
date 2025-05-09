<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreOwned;

class PreOwnedController extends Controller
{
    public function index()
    {
        // Fetch all pre-owned cars; adjust the query as needed.
        $preOwnedCars = PreOwned::all();

        // Return a view (create resources/views/preOwned/index.blade.php) and pass the data.
        return view('preOwned.index', compact('preOwnedCars'));
    }

    public function show(PreOwned $preOwned)
    {
        // Eager load related models
        $preOwned->load(['brand', 'rangeOfCars', 'inventories' => function($query) {
            $query->orderBy('price');
        }]);

        // Pass the fetched preOwned model to the view (adjust variable name if needed)
        return view('preOwned.show', compact('preOwned'));
    }
}
