<?php

namespace App\Http\Controllers;

use App\Models\Display;
use App\Models\MediaContent;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard', ['stats' => [
            'displays' => Display::count(),
            'schedules' => Schedule::count(),
            'mediaContents' => MediaContent::count(),
        ]]);
    }
}
