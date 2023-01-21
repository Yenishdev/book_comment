<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->unique()->streetName(),
            'comment'=>$this->faker->unique()->realText($maxNbChars=50),
            'theme'=>'Beauty',
            'pages'=>$this->faker->numberBetween(150, 2500),
            'image_path'=>$this->faker->imageUrl(640,480)
        ];
    }
}
