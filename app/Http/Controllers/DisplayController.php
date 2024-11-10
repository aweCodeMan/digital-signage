<?php

namespace App\Http\Controllers;

use App\Models\Display;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index()
    {
        $displays = Display::with([
            'schedules' => function ($query) {
                $query->active();
            }
        ])
            ->paginate();

        return view('pages.displays', ['displays' => $displays]);
    }

    public function form($id = null)
    {
        $item = null;

        if ($id) {
            $item = Display::findOrFail($id);
        }

        return view('pages.display-form', ['item' => $item]);
    }
}
