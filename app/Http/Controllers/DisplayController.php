<?php

namespace App\Http\Controllers;

use App\Models\Display;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index()
    {
        $displays = Display::with('schedules')->orderByDesc('created_at')->paginate(5);

        return view('displays-page', ['displays' => $displays]);
    }

    public function form($id = null)
    {
        $display = null;

        if ($id) {
            $display = Display::find($id);
        }

        return view('display-form-page', ['display' => $display]);
    }
}
