<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('mediaContents', 'displays')->orderByDesc('created_at')->paginate(5);

        return view('pages.schedules', ['schedules' => $schedules]);
    }

    public function form(Request $request, string $id = null)
    {
        $schedule = null;
        $clone = null;

        if ($request->has('clone')) {
            $clone = Schedule::find($request->get('clone'));
        }

        if ($id) {
            $schedule = Schedule::findOrFail($id);
        }

        return view('pages.schedule-form', ['schedule' => $schedule, 'clone' => $clone]);
    }
}
