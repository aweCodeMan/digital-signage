<?php

namespace App\Livewire;

use App\Models\Display;
use App\Models\MediaContent;
use App\Models\Schedule;
use Carbon\Carbon;
use Livewire\Component;

class ScheduleForm extends Component
{
    public string $name = '';

    public Schedule|null $schedule = null;

    public Schedule|null $clone = null;

    public $rules = [
        'name' => 'string',
        'start_at' => 'required|date',
        'end_at' => 'required|date|after:start_at',
        'selected_displays' => 'array|exists:displays,id',
        'selected_media_contents' => 'array|exists:media_contents,id',
    ];

    public $start_at;

    public $end_at;

    public $displays;

    public $mediaContents;

    public $selected_displays = [];

    public $selected_media_contents = [];

    public function mount()
    {
        $this->displays = Display::all();
        $this->mediaContents = MediaContent::all();
        $this->start_at = Carbon::now()->toDateTimeLocalString('minute');
        $this->end_at = Carbon::now()->addWeek()->toDateTimeLocalString('minute');

        if ($this->schedule) {
            $this->name = $this->schedule->name ?? '';
            $this->start_at = Carbon::parse($this->schedule->start_at)->toDateTimeLocalString('minute');
            $this->end_at = Carbon::parse($this->schedule->end_at)->toDateTimeLocalString('minute');
            $this->selected_displays = $this->schedule->displays->pluck('id') ?? [];
            $this->selected_media_contents = $this->schedule->mediaContents->pluck('id') ?? [];
        }

        if ($this->clone) {
            $this->name = "Clone " .  $this->clone->name ?? '';
            $this->start_at = Carbon::parse($this->clone->start_at)->toDateTimeLocalString('minute');
            $this->end_at = Carbon::parse($this->clone->end_at)->toDateTimeLocalString('minute');
            $this->selected_displays = $this->clone->displays->pluck('id') ?? [];
            $this->selected_media_contents = $this->clone->mediaContents->pluck('id') ?? [];
        }
    }

    public function save()
    {
        $validated = $this->validate();

        if ($this->schedule) {
            $schedule = $this->schedule->fill([
                'name' => $validated['name'],
                'start_at' => $validated['start_at'],
                'end_at' => $validated['end_at'],
            ]);
            $schedule->save();
        } else {
            $schedule = Schedule::create([
                'name' => $validated['name'],
                'start_at' => $validated['start_at'],
                'end_at' => $validated['end_at'],
            ]);
        }

        $schedule->displays()->sync($validated['selected_displays']);
        $schedule->mediaContents()->sync($validated['selected_media_contents']);

        $this->redirectRoute('schedules.index');
    }

    public function render()
    {
        return view('livewire.schedule-form');
    }
}
