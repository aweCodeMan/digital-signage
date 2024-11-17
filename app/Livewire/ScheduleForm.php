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

    public $sorted_media_contents;

    public $selected_displays = [];

    public $selected_media_contents = [];

    public function mount()
    {
        $this->displays = Display::all();
        $this->sorted_media_contents = MediaContent::all();
        $this->start_at = Carbon::now()->toDateTimeLocalString('minute');
        $this->end_at = Carbon::now()->addWeek()->toDateTimeLocalString('minute');

        if ($this->schedule) {
            $this->name = $this->schedule->name ?? '';
            $this->start_at = Carbon::parse($this->schedule->start_at)->toDateTimeLocalString('minute');
            $this->end_at = Carbon::parse($this->schedule->end_at)->toDateTimeLocalString('minute');
            $this->selected_displays = $this->schedule->displays->pluck('id') ?? [];
            $this->selected_media_contents = $this->schedule->mediaContents->pluck('id') ?? [];

            if ($this->schedule->mediaContents) {
                $this->sortMediaByExisting($this->schedule->mediaContents);
            }
        }

        if ($this->clone) {
            $this->name = "Clone " . $this->clone->name ?? '';
            $this->start_at = Carbon::parse($this->clone->start_at)->toDateTimeLocalString('minute');
            $this->end_at = Carbon::parse($this->clone->end_at)->toDateTimeLocalString('minute');
            $this->selected_displays = $this->clone->displays->pluck('id') ?? [];
            $this->selected_media_contents = $this->clone->mediaContents->pluck('id') ?? [];

            if ($this->clone->mediaContents) {
                $this->sortMediaByExisting($this->clone->mediaContents);
            }
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

        $sync = [];
        collect($validated['selected_media_contents'])->each(function ($selected_media_content_id) use (&$sync) {
            $order = $this->sorted_media_contents->search(function ($mediaContent) use ($selected_media_content_id) {
                return $mediaContent->id == $selected_media_content_id;
            });

            $sync[$selected_media_content_id] = ['order' => $order];
        });
        $schedule->mediaContents()->sync($sync);

        $this->redirectRoute('schedules.index');
    }

    public function render()
    {
        return view('livewire.schedule-form');
    }

    public function updateMediaOrder(array $sortOrders)
    {
        $this->sortMedia($sortOrders);
    }

    private function sortMedia(array $sortOrders)
    {
        $sort = [];

        foreach ($sortOrders as $sortOrder) {
            $mediaContent = $this->sorted_media_contents->first(function ($item) use ($sortOrder) {
                return $item->id == $sortOrder['value'];
            });

            $sort[] = $mediaContent;
        }

        $this->sorted_media_contents = collect($sort);
    }

    private function sortMediaByExisting($mediaContents)
    {
        $sortedOrder = [];
        $copy = $this->sorted_media_contents;

        foreach ($mediaContents as $mediaContent) {
            $sortedOrder[] = ['order' => count($sortedOrder) + 1, 'value' => $mediaContent->id];
            $copy = $copy->reject(function ($item) use ($mediaContent) {
                return $item->id === $mediaContent->id;
            }
            );
        }

        foreach ($copy as $item) {
            $sortedOrder[] = ['order' => count($sortedOrder) + 1, 'value' => $item->id];
        }

        $this->sortMedia($sortedOrder);
    }
}
