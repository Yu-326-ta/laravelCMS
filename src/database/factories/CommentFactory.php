<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;

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
    protected $model = Comment::class;

    
    public function definition()
    {
        $random_date = $this->faker->dateTimeBetween('-1year', '-1day');

        return [
            'comment' => $this->faker->realText(rand(20,50)),
            'published_at' => $random_date,
            'post_id' => $this->faker->numberBetween(1,50),
            'created_at' => $random_date,
            'updated_at' => $random_date
        ];
    }
}
