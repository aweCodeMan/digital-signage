<?php

namespace App\View\Components;

use App\Models\Display;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DisplayCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public Display $display)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.display-card');
    }
}
