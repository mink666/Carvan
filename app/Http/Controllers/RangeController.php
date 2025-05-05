<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\RangeOfCar;

class RangeController extends Controller
{
    public function index(): View
    {
        return view('ranges.index');
    }
}
