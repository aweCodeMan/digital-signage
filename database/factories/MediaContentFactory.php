<?php

namespace Database\Factories;

use App\Models\MediaContent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MediaContent>
 */
class MediaContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'media_type' => MediaContent::MEDIA_TYPE_IMAGE,
            'cutoff_seconds' => 30,
        ];
    }
}
