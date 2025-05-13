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
        $validatedData = $request->validate([
            'car_model_id' => 'required|exists:car_models,id',
            'request_date' => 'required|date|after:now',
            'note' => 'nullable|string',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'emailaddress' => 'required|email|max:255',
            'phonenumber' => 'required|string|max:20',
        ]);

        TestDriveRequest::create($validatedData);

        return redirect()->route('test_drive.index')->with('success', 'Request for test drive submitted successfully.');
    }

}
