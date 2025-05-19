<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestDriveRequest;

class AdminTestDriveController extends Controller
{
    //
    public function list()
    {
        $requests = TestDriveRequest::get();
        return view('Admin', [
            'section' => 'TestDriveRequestMgr',
            'state' => 'list',
            'data' => compact('requests'),
        ]);
    }
    public function edit(string $id)
    {
        $testDriveRequest = TestDriveRequest::findOrFail($id);

        return view('Admin', [
            'section' => 'TestDriveRequestMgr',
            'state' => 'edit',
            'data' => compact('testDriveRequest'),
        ]);
    }
    public function editSchedule(string $id)
    {
        $schedule = TestDriveRequest::findOrFail($id);

        return view('Admin', [
            'section' => 'TestDriveScheduleMgr',
            'state' => 'edit',
            'data' => compact('schedule'),
        ]);
    }

}
