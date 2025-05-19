<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

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
            $data['carModels'] = \App\Models\CarModel::with('brand','rangeOfCars','inventories')->get();
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
        } elseif ($section === 'TestDriveRequestMgr') {
            if ($state === 'create') {
                return redirect()->route('Admin.TestDriveRequestMgr.create');
            }
            $data['requests'] = \App\Models\TestDriveRequest::all();
        } elseif ($section === 'TestDriveScheduleMgr') {
            if ($state === 'create') {
                return redirect()->route('Admin.TestDriveScheduleMgr.create');
            }
            $data['schedules'] = \App\Models\TestDriveSchedule::all();
        } elseif ($section === 'Dashboard') {
            $data['userCount'] = \App\Models\User::count();
            $data['carCount'] = \App\Models\CarModel::count();
            $data['brandCount'] = \App\Models\Brand::count();
            $data['rangeCount'] = \App\Models\RangeOfCar::count();
            $data['NewsCount'] = \App\Models\News::count();
            $data['carCountsByBrand'] = \App\Models\CarModel::select('brand_id', DB::raw('count(*) as total'))
                ->groupBy('brand_id')
                ->with('brand')
                ->get()
                ->map(function ($item) {
                    return [
                        'brand' => $item->brand->name ?? 'Không xác định',
                        'total' => $item->total,
                    ];
                });
            $data['carCountsByRange'] = \App\Models\CarModel::select('range_of_cars_id', DB::raw('count(*) as total'))
                ->groupBy('range_of_cars_id')
                ->with('RangeOfCars')
                ->get()
                ->map(function ($item) {
                    return [
                        'range' => $item->RangeOfCars->name ?? 'Không xác định',
                        'total' => $item->total,
                    ];
                });

        }
        return view('Admin', compact('section', 'state','data'));
    }
}
