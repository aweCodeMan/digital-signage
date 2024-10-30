<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('mediaContents', 'displays')->orderByDesc('created_at')->paginate(5);

        return view('schedules-page', ['schedules' => $schedules]);
    }

    public function form($id = null)
    {
        $schedule = null;

        if ($id) {
            $schedule = Schedule::find($id);
        }

        return view('schedule-form-page', ['schedule' => $schedule]);
    }
}
