<?php

namespace App\Http\Controllers;

use App\Models\MediaContent;
use Illuminate\Http\Request;

class MediaContentController extends Controller
{
    public function index()
    {
        $mediaContents = MediaContent::with([
            'schedules' => function ($query) {
                $query->active();
            }
        ])
            ->paginate();

        return view('pages.media-contents', ['mediaContents' => $mediaContents]);
    }

    public function form($id = null)
    {
        $item = null;

        if ($id) {
            $item = MediaContent::findOrFail($id);
        }

        return view('pages.media-content-form', ['item' => $item]);
    }
}
