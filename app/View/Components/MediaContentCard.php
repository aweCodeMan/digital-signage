<?php

namespace App\View\Components;

use App\Models\MediaContent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MediaContentCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public MediaContent $mediaContent)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.media-content-card');
    }
}
