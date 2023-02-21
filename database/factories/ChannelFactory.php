<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Channel>
 */
class ChannelFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'title' => $this->faker->word(),
            'link_youtube' => 'https://www.youtube.com/@akramulfata9815',
            'cover' => $this->faker->imageUrl(640, 480, 'animals', true),
            'ispublish' => 1,
        ];
    }
}