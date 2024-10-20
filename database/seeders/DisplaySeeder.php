<?php

namespace Database\Seeders;

use App\Models\Display;
use App\Models\MediaContent;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisplaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $display1 = Display::create([
            'name' => 'Blagajna #1',
        ]);

        $display2 = Display::create([
            'name' => 'Blagajna #2',
        ]);

        $display3 = Display::create([
            'name' => 'Vhod #1',
        ]);

        $display4 = Display::create([
            'name' => 'Vhod #2',
        ]);

        $image = MediaContent::create(['media_type' => MediaContent::MEDIA_TYPE_IMAGE, 'title' => 'Image']);
        $image->addMedia(storage_path('/seeds/image.jpeg'))
            ->preservingOriginal()
            ->toMediaCollection();

        $video = MediaContent::create(['media_type' => MediaContent::MEDIA_TYPE_VIDEO, 'title' => 'Video']);
        $video->addMedia(storage_path('/seeds/video.mp4'))
            ->preservingOriginal()
            ->toMediaCollection();

        $url = MediaContent::create(['media_type' => MediaContent::MEDIA_TYPE_URL, 'title' => 'Url']);

        Schedule::create([
            'display_id' => $display1->id,
            'media_content_id' =>$image->id,
            'start_at' => Carbon::now()->startOfDay(),
            'end_at' => Carbon::now()->addWeeks(random_int(1, 8))->endOfDay(),
        ]);
        Schedule::create([
            'display_id' => $display2->id,
            'media_content_id' =>$video->id,
            'start_at' => Carbon::now()->startOfDay(),
            'end_at' => Carbon::now()->addWeeks(random_int(1, 8))->endOfDay(),
        ]);

        Schedule::create([
            'display_id' => $display3->id,
            'media_content_id' =>$url->id,
            'start_at' => Carbon::now()->startOfDay(),
            'end_at' => Carbon::now()->addWeeks(random_int(1, 8))->endOfDay(),
        ]);


        Schedule::create([
            'display_id' => $display4->id,
            'media_content_id' =>$image->id,
            'start_at' => Carbon::now()->startOfDay(),
            'end_at' => Carbon::now()->addWeeks(random_int(1, 8))->endOfDay(),
        ]);
        Schedule::create([
            'display_id' => $display4->id,
            'media_content_id' =>$video->id,
            'start_at' => Carbon::now()->startOfDay(),
            'end_at' => Carbon::now()->addWeeks(random_int(1, 8))->endOfDay(),
        ]);

        Schedule::create([
            'display_id' => $display4->id,
            'media_content_id' =>$url->id,
            'start_at' => Carbon::now()->startOfDay(),
            'end_at' => Carbon::now()->addWeeks(random_int(1, 8))->endOfDay(),
        ]);
    }
}
