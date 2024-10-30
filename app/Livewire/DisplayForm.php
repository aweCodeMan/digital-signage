<?php

namespace App\Livewire;

use App\Models\Display;
use Livewire\Component;

class DisplayForm extends Component
{

    public string $name = '';

    public $rules = [
        'name' => 'required',
    ];

    public function render()
    {
        return view('livewire.display-form');
    }

    public function save()
    {
        $validated = $this->validate();

        $display = Display::create([
            'name' => $validated['name'],
        ]);

        $this->js('window.location.reload()');
    }
}
