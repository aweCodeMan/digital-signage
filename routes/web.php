<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $displays = \App\Models\Display::with('schedules')->get();

    $mediaContents = \App\Models\MediaContent::with('media', 'schedules')->get();

    return view('welcome', ['displays' => $displays, 'mediaContents' => $mediaContents]);
});

Route::get('/displays/{id}', function (string $id) {
    $display = \App\Models\Display::with('schedules', 'schedules.mediaContent')->findOrFail($id);

    return view('display', ['display' => $display]);
})->name('displays.show');
