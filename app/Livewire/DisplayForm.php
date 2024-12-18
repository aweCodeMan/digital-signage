<?php

namespace App\Livewire;

use App\Models\Display;
use App\Models\MediaContent;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class DisplayForm extends Component
{
    public string $name = '';

    public Display|null $item = null;

    public Collection $mediaContents;

    public mixed $media_content_id = null;


    public $rules = [
        'name' => 'required|string',
        'media_content_id' => 'exists:media_contents,id|nullable',
    ];

    public function render()
    {
        return view('livewire.display-form');
    }

    public function mount()
    {
        $this->mediaContents = MediaContent::all();

        if ($this->item) {
            $this->name = $this->item->name ?? '';
            $this->media_content_id = $this->item->media_content_id;
        }
    }

    public function save()
    {
        $validated = $this->validate();

        $media_content_id = $validated['media_content_id'] ? $validated['media_content_id'] : null;

        if ($this->item) {
            $display = $this->item->fill([
                'name' => $validated['name'],
                'media_content_id' => $media_content_id
            ]);
            $display->save();
        } else {
            $display = Display::create([
                'name' => $validated['name'],
                'media_content_id' => $media_content_id
            ]);
        }

        $this->redirectRoute('displays.index');
    }
}
