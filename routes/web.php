<?php

use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $displays = \App\Models\Display::with('schedules', 'schedules.mediaContents')->get();

    $mediaContents = \App\Models\MediaContent::with('media', 'schedules')->get();

    $schedules = \App\Models\Schedule::with('mediaContents')->get();

    return view('welcome', ['displays' => $displays, 'mediaContents' => $mediaContents, 'schedules' => $schedules]);
});

Route::get('/displays/{id}', function (string $id) {
    $display = \App\Models\Display::with('schedules', 'schedules.mediaContents')->findOrFail($id);

    return view('display', ['display' => $display]);
})->name('displays.show');

Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/schedules/form/{id?}', [ScheduleController::class, 'form'])->name('schedules.form');
