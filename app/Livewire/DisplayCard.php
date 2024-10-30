<?php

namespace App\Livewire;

use App\Models\Display;
use Livewire\Component;

class DisplayCard extends Component
{
    public Display $display;

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('livewire.display-card');
    }

    public function delete()
    {
        $this->display->delete();
        $this->js('window.location.reload()');
    }
}
