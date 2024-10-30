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

        $image = MediaContent::create(['media_type' => MediaContent::MEDIA_TYPE_IMAGE, 'title' => 'Image', 'cutoff_seconds' => 30]);
        $image->addMedia(storage_path('/seeds/image.jpeg'))
            ->preservingOriginal()
            ->toMediaCollection();

        $video = MediaContent::create(['media_type' => MediaContent::MEDIA_TYPE_VIDEO, 'title' => 'Video']);
        $video->addMedia(storage_path('/seeds/video.mp4'))
            ->preservingOriginal()
            ->toMediaCollection();

        $url = MediaContent::create(['media_type' => MediaContent::MEDIA_TYPE_URL, 'title' => 'Url', 'cutoff_seconds'
        => 30, 'data' => ['url' => 'https://kinodvor.kupikarto.si/index.php']]);

        $s1 = Schedule::create([
            'start_at' => Carbon::now()->startOfDay(),
            'end_at' => Carbon::now()->addWeeks(random_int(1, 8))->endOfDay(),
        ]);
        $s1->mediaContents()->attach([$image->id]);
        $s1->displays()->attach([$display1->id]);


        $s2 = Schedule::create([
            'start_at' => Carbon::now()->startOfDay(),
            'end_at' => Carbon::now()->addWeeks(random_int(1, 8))->endOfDay(),
        ]);
        $s2->mediaContents()->attach([$video->id]);
        $s2->displays()->attach([$display2->id]);


        $s3 = Schedule::create([
            'start_at' => Carbon::now()->startOfDay(),
            'end_at' => Carbon::now()->addWeeks(random_int(1, 8))->endOfDay(),
        ]);
        $s3->mediaContents()->attach([$url->id]);
        $s3->displays()->attach([$display3->id]);

        $s4 = Schedule::create([
            'start_at' => Carbon::now()->startOfDay(),
            'end_at' => Carbon::now()->addWeeks(random_int(1, 8))->endOfDay(),
        ]);
        $s4->mediaContents()->attach([$image->id, $video->id, $url->id]);
        $s4->displays()->attach([$display4->id]);

        $s5 = Schedule::create([
            'start_at' => Carbon::now()->startOfDay(),
            'end_at' => Carbon::now()->addWeeks(random_int(1, 8))->endOfDay(),
        ]);
        $s5->mediaContents()->attach([$image->id, $video->id, $url->id]);
        $s5->displays()->attach([$display1->id, $display2->id]);
    }
}
