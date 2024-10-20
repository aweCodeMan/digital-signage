<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
