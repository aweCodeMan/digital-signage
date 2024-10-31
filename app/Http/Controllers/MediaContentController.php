<?php

namespace App\Http\Controllers;

use App\Models\MediaContent;
use Illuminate\Http\Request;

class MediaContentController extends Controller
{
    public function index()
    {
        $mediaContents = MediaContent::with('schedules')->orderByDesc('created_at')->paginate(5);

        return view('media-contents-page', ['mediaContents' => $mediaContents]);
    }

    public function form($id = null)
    {
        $item = null;

        if ($id) {
            $item = MediaContent::find($id);
        }

        return view('media-content-form-page', ['mediaContent' => $item]);
    }
}
