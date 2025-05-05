<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(): View
    {
        return view('brands.index');
    }
}
