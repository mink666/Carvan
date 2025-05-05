<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Car;

class CarController extends Controller
{
    public function index(): View
    {
        return view('cars.index');
    }

}
