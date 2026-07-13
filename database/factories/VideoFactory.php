<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition(): array
    {
        $type = $this->faker->randomElement(['vip', 'regular']);

        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'thumbnail_url' => $this->faker->imageUrl(640, 360, 'nature', true, 'Tunda'),
            'video_url' => 'https://sample-videos.com/video321/mp4/720/big_buck_bunny_720p_1mb.mp4',
            'type' => $type,
            'is_featured' => $this->faker->boolean(20),
            'duration' => $this->faker->randomElement(['05:30', '12:45', '08:20', '15:10', '03:55']),
            'views' => $this->faker->numberBetween(100, 50000),
        ];
    }

    public function vip(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'vip',
            'is_featured' => true,
        ]);
    }

    public function regular(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'regular',
        ]);
    }
}
