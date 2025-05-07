<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index($section, Request $request)
    {
        $state = $request->query('state' ,'default');
        return view('Admin', compact('section', 'state'));
    }
}
