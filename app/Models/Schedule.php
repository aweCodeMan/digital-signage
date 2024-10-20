<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function mediaContent()
    {
        return $this->belongsTo(MediaContent::class);
    }

    public function display()
    {
        return $this->belongsTo(Display::class);
    }
}
