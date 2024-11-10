<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\KioskController;
use App\Http\Controllers\MediaContentController;
use App\Http\Controllers\ScheduleController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/displays', [DisplayController::class, 'index'])->name('displays.index');
Route::get('/displays/form/{id?}', [DisplayController::class, 'form'])->name('displays.form');

Route::get('/kiosks/{id}', [KioskController::class, 'show'])->name('kiosks.show');
Route::get('/kiosks/{id}/schedules', [KioskController::class, 'schedules'])->name('kiosks.schedules');

Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');
Route::get('/schedules/form/{id?}', [ScheduleController::class, 'form'])->name('schedules.form');

Route::get('/media-contents', [MediaContentController::class, 'index'])->name('media_contents.index');
Route::get('/media-contents/form/{id?}', [MediaContentController::class, 'form'])->name('media_contents.form');
