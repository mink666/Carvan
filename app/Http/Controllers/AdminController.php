<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index($section, Request $request)
    {
        $state = $request->query('state', 'list'); // Mặc định là 'list'
        $data = []; // Dữ liệu mặc định

        // Xử lý từng section
        if ($section === 'CarMgr') {
            if ($state === 'create') {
                return redirect()->route('Admin.CarMgr.create');
            }
            $data['carModels'] = \App\Models\CarModel::with('brand')->get();
        } elseif ($section === 'UserMgr') {
            if ($state === 'create') {
                return redirect()->route('Admin.UserMgr.create');
            }
            $data['users'] = \App\Models\User::all();
        } elseif ($section === 'BrandMgr') {
            if ($state === 'create') {
                return redirect()->route('Admin.BrandMgr.create');
            }
            $data['brands'] = \App\Models\Brand::all();
        } elseif ($section === 'RangesMgr') {
            if ($state === 'create') {
                return redirect()->route('Admin.RangesMgr.create');
            }
            $data['ranges'] = \App\Models\RangeOfCar::all();
        }

        return view('Admin', compact('section', 'state','data'));
    }
}
