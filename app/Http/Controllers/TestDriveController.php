<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestDriveController extends Controller
{
    public function index()
    {
        return view('testDrive.index');
    }
}
