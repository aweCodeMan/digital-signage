<?php

namespace App\Http\Controllers;

use App\Http\Resources\ScheduleResource;
use App\Models\Display;
use Illuminate\Http\Request;

class KioskController extends Controller
{
    public function show(string $id)
    {
        $display = Display::with(['schedules' => function ($query) {
            return $query->active();
        }])->findOrFail($id);

        return view('pages.kiosk', ['display' => $display]);
    }

    public function schedules(string $id)
    {
        $schedules = Display::findOrFail($id)->schedules()->active()->with('mediaContents')->get();

        return ScheduleResource::collection($schedules);
    }
}
