<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'cutoffSeconds' => $this->cutoff_seconds,
            'mediaType' => $this->media_type,
            'data' => $this->data,
            'title' => $this->title,
            'media' => MediaResource::collection($this->getMedia()),
        ];
    }
}
