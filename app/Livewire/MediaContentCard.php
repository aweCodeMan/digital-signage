<?php

namespace App\Livewire;

use App\Models\MediaContent;
use Closure;
use Livewire\Component;

class MediaContentCard extends Component
{
    public MediaContent $mediaContent;

    public function render()
    {
        return view('livewire.media-content-card');
    }

    public function delete()
    {
        $this->mediaContent->delete();
        $this->js('window.location.reload()');
    }
}
