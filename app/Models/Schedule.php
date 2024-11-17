<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function mediaContents()
    {
        return $this->belongsToMany(MediaContent::class)->withPivot(['cutoff_seconds', 'order'])->orderByPivot('order');
    }

    public function displays()
    {
        return $this->belongsToMany(Display::class)->withPivot(['order']);
    }

    public function scopeActive(Builder $query)
    {
        $query->where('start_at', '<=', now());
        $query->where('end_at', '>=', now());
    }

    public function scopeUpcoming(Builder $query)
    {
        $query->where('start_at', '>', now());
    }

    public function scopeExpired(Builder $query)
    {
        $query->where('end_at', '<', now());
    }

    public function isActive()
    {
        return $this->start_at <= now() && $this->end_at >= now();
    }

    public function isUpcoming()
    {
        return $this->start_at > now();
    }

    public function getNameAttribute()
    {
        if ($this->attributes['name']) {
            return $this->attributes['name'];
        }

        return "Schedule #$this->id";
    }
}
