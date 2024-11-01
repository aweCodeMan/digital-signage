<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
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
            'name' => $this->name,
            'startAt' => $this->start_at,
            'endAt' => $this->end_at,
            'mediaContents' => MediaContentResource::collection($this->whenLoaded('mediaContents')),
        ];
    }
}
