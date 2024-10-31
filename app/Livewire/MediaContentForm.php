<?php

namespace App\Livewire;

use App\Models\MediaContent;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class MediaContentForm extends Component
{
    use WithFileUploads;

    public MediaContent|null $mediaContent = null;

    public string $type = MediaContent::MEDIA_TYPE_IMAGE;

    public string $title = '';

    public int $cutoffSeconds = 30;

    public string $url = '';

    public $file;

    public $rules = [
        'title' => 'string',
        'cutoffSeconds' => 'required_if:type,image,url|integer',
        'file' => 'required_if:type,image,video|nullable|file',
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

    public function mount()
    {
        if ($this->mediaContent) {
            $this->title = $this->mediaContent->title;
            $this->type = $this->mediaContent->media_type;

            if ($this->type !== MediaContent::MEDIA_TYPE_VIDEO) {
                $this->cutoffSeconds = $this->mediaContent->cutoff_seconds;
            }

            if ($this->type === MediaContent::MEDIA_TYPE_URL) {
                $this->url = $this->mediaContent->data['url'];
            }
        }
    }

    public function save()
    {
        if($this->mediaContent){
            unset($this->rules['file']);
        }

        $validated = $this->validate();
        $data = ($this->type === MediaContent::MEDIA_TYPE_URL) ? ['url' => $validated['url']] : [];

        if (!$this->mediaContent) {
            $cutoffSeconds = ($this->type === MediaContent::MEDIA_TYPE_IMAGE || $this->type ===
                MediaContent::MEDIA_TYPE_URL) ? $this->cutoffSeconds : null;

            $title = $validated['title'] ?? '';

            if (!$title && $validated['file']) {
                $title = $validated['file']->getClientOriginalName();
            } else {
                $title = $validated['url'];
            }

            $mediaContent = MediaContent::create([
                'title' => $title,
                'cutoff_seconds' => $cutoffSeconds,
                'data' => $data,
                'media_type' => $validated['type'],
            ]);

            if ($this->type !== MediaContent::MEDIA_TYPE_URL) {
                $mediaContent
                    ->addMedia($this->file->getRealPath())
                    ->toMediaCollection();
            }
        } else {
            $mediaContent = $this->mediaContent->fill([
                'title' => $validated['title'],
                'cutoff_seconds' => $validated['cutoffSeconds'],
                'data' => $data,
            ]);

            $mediaContent->save();
        }

        $this->redirectRoute('media_contents.index');
    }
}
