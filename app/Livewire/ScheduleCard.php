<?php

namespace App\Livewire;

use App\Models\Schedule;
use Livewire\Component;

class ScheduleCard extends Component
{
    public Schedule $schedule;

    public function render()
    {
        return view('livewire.schedule-card');
    }

    public function delete()
    {
        $this->schedule->delete();
        $this->js('window.location.reload()');
    }
}
