<?php

namespace App\Livewire;

use App\Models\Display;
use Livewire\Component;

class DisplayForm extends Component
{
    public string $name = '';

    public Display|null $display = null;

    public $rules = [
        'name' => 'required|string',
    ];

    public function render()
    {
        return view('livewire.display-form');
    }

    public function mount()
    {
        if ($this->display) {
            $this->name = $this->display->name ?? '';
        }
    }

    public function save()
    {
        $validated = $this->validate();

        if ($this->display) {
            $display = $this->display->fill([
                'name' => $validated['name'],
            ]);
            $display->save();
        } else {
            $display = Display::create([
                'name' => $validated['name'],
            ]);
        }

        $this->redirectRoute('displays.index');
    }
}
