<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Preowned;
use Illuminate\Http\Request;

class AdminPreOwnedController extends Controller
{
    //
    public function list()
    {
        $PreOwneds = Preowned::get();
        return view('Admin', [
            'section' => 'PreOwnedMgr',
            'state' => 'list',
            'data' => compact('PreOwneds'),
        ]);
    }

    public function edit()
    {
        $PreOwneds = Preowned::get();
        return view('Admin', [
            'section' => 'PreOwnedMgr',
            'state' => 'edit',
            'data' => compact('PreOwneds'),
        ]);
    }
}
