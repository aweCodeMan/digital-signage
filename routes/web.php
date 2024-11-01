<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\MediaContentController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $stats = [
        ['label' => 'Displays', 'data' => \App\Models\Display::count(), 'link' => route('displays.index')],
        ['label' => 'Schedules', 'data' => \App\Models\Schedule::count(), 'link' => route('schedules.index')],
        ['label' => 'Media', 'data' => \App\Models\MediaContent::count(), 'link' => route('media_contents.index')],
    ];

    return view('dashboard', ['stats' => $stats]);
})->name('dashboard');


Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/schedules/form/{id?}', [ScheduleController::class, 'form'])->name('schedules.form');

Route::get('/displays', [DisplayController::class, 'index'])->name('displays.index');
Route::get('/displays/form/{id?}', [DisplayController::class, 'form'])->name('displays.form');

Route::get('/displays/{id}/schedules', function (string $id) {
    $schedules = \App\Models\Display::find($id)->schedules()->active()->with('mediaContents')->get();

    return \App\Http\Resources\ScheduleResource::collection($schedules);
})->name('displays.show');

Route::get('/displays/{id}', function (string $id) {
    $display = \App\Models\Display::with(['schedules' => function ($q) {
        return $q->active();
    }])->findOrFail($id);

    return view('display', ['display' => $display]);
})->name('displays.show');



Route::get('/media-contents', [MediaContentController::class, 'index'])->name('media_contents.index');
Route::get('/media-contents/form/{id?}', [MediaContentController::class, 'form'])->name('media_contents.form');
