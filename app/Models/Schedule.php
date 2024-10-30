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

    public function mediaContents()
    {
        return $this->belongsToMany(MediaContent::class)->withPivot(['cutoff_seconds']);
    }

    public function displays()
    {
        return $this->belongsToMany(Display::class)->withPivot(['order']);
    }

    public function getNameAttribute()
    {
        if ($this->attributes['name']) {
            return $this->attributes['name'];
        }

        return "Schedule #$this->id";
    }
}
