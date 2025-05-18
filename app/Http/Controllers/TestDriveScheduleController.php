<?php

namespace App\Http\Controllers;

use App\Models\TestDriveRequest;
use App\Models\TestDriveSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestDriveScheduleController extends Controller
{
    public function index()
    {
        $schedules = TestDriveSchedule::with('testDriveRequest')->latest()->paginate(10);
        return view('schedules.index', compact('schedules'));
    }

    public function create(Request $request)
    {
        $testDriveRequest = TestDriveRequest::findOrFail($request->get('request_id'));

        return view('schedules.create', compact('testDriveRequest'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'test_drive_request_id' => 'required|exists:test_drive_requests,id',
            'scheduled_date' => 'required|date|after:now',
            'location' => 'required|string|max:255',
        ]);

        $schedule = new TestDriveSchedule($validated);
        $schedule->updated_by = Auth::id(); // lưu user đang tạo
        $schedule->save();

        // Cập nhật trạng thái request
        $testDrive = TestDriveRequest::findOrFail($validated['test_drive_request_id']);
        $testDrive->status = 'processed';
        $testDrive->save();

        return redirect()->route('Admin.TestDriveMgr')->with('success', 'Test drive has been scheduled successfully.');
    }

    public function edit(TestDriveSchedule $schedule)
    {
        return view('schedules.edit', compact('schedule'));
    }

    public function update(Request $request, TestDriveSchedule $schedule)
    {
        $validated = $request->validate([
            'scheduled_date' => 'required|date|after:now',
            'location' => 'required|string|max:255',
        ]);

        $schedule->update($validated);

        return redirect()->route('Admin.TestDriveMgr')->with('success', 'Schedule updated successfully.');
    }

    public function cancel(TestDriveSchedule $schedule)
    {
        $schedule->update(['status' => 'cancelled']);

        if ($schedule->testDriveRequest) {
            $schedule->testDriveRequest->update(['status' => 'cancelled']);
        }

        return redirect()->route('Admin.TestDriveMgr')->with('success', 'Schedule cancelled.');
    }
}

