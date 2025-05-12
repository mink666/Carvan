<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CarModel;
use App\Models\TestDriveRequest;
use Illuminate\Http\Request;

class TestDriveController extends Controller
{
    public function index()
    {
        $carModels = CarModel::all();
        return view('test_drive.index', compact('carModels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_model_id' => 'required|exists:car_models,id',
            'request_date' => 'required|date|after:now',
            'note' => 'nullable|string',
        ]);

        TestDriveRequest::create([
            'user_id' => Auth::id(),
            'car_model_id' => $request->car_model_id,
            'request_date' => $request->request_date,
            'note' => $request->note,
        ]);

        return redirect()->route('test_drive.index')->with('success', 'Request for test drive submitted successfully.');
    }

}
