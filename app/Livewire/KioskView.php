<?php

namespace App\Livewire;

use App\Models\Display;
use Livewire\Component;

class KioskView extends Component
{
    public Display $display;

    public function render()
    {
        return view('livewire.kiosk-view');
    }
}
