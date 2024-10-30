<?php

namespace App\Livewire;

use App\Models\MediaContent;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class MediaContentForm extends Component
{
    use WithFileUploads;

    public string $type = MediaContent::MEDIA_TYPE_IMAGE;

    public string $title = '';

    public int $cutoffSeconds = 30;

    public string $url = '';

    public $file;

    public $rules = [
        'cutoffSeconds' => 'required_if:type,image,url|integer',
        'file' => 'required_if:type,image,video|file',
        'url' => 'required_if:type,url|url',
        'type' => 'in:image,video,url',
    ];

    public array $types = [
        MediaContent::MEDIA_TYPE_IMAGE,
        MediaContent::MEDIA_TYPE_VIDEO,
        MediaContent::MEDIA_TYPE_URL,
    ];

    public function render()
    {
        return view('livewire.media-content-form');
    }

    public function save()
    {
        $validated = $this->validate();

        $cutoffSeconds = ($this->type === MediaContent::MEDIA_TYPE_IMAGE || $this->type ===
            MediaContent::MEDIA_TYPE_URL) ? $this->cutoffSeconds : null;

        $data = ($this->type === MediaContent::MEDIA_TYPE_URL) ? ['url' => $this->url] : [];


        $mediaContent = MediaContent::create([
            'title' => $this->file->getClientOriginalName(),
            'cutoff_seconds' => $cutoffSeconds,
            'data' => $data,
            'media_type' => $this->type,
        ]);

        $mediaContent
            ->addMedia($this->file->getRealPath())
            ->toMediaCollection();
    }
}
