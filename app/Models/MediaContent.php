<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MediaContent extends Model implements HasMedia
{
    use InteractsWithMedia;

    const MEDIA_TYPE_IMAGE = 'image';

    const MEDIA_TYPE_VIDEO = 'video';
    const MEDIA_TYPE_URL = 'url';

    protected $guarded = [];

    protected $casts = [
        'data' => 'json',
    ];

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class)->withPivot(['cutoff_seconds']);
    }
}
