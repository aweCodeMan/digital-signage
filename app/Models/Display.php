<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class)->withPivot(['order']);
    }

    public function default_media_content()
    {
        return $this->belongsTo(MediaContent::class, 'media_content_id', 'id')->with('media');
    }
}
