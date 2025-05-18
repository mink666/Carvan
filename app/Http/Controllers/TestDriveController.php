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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email_address' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
        ]);

        // dd($validatedData);
        $test = TestDriveRequest::create($validatedData);
        return redirect()->route('test_drive.index')->with('success', 'Request for test drive submitted successfully.');
    }

    public function show()
    {
        $requests = TestDriveRequest::with('carModel')->latest()->paginate(10);
        return view('test_drive.list', compact('requests'));
    }

}
