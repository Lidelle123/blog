<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \app\Models\User;
use \app\Models\Annonce;

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
    public function definition(): array
    {
        return [
            'content' => $this->faker->text,
            'user_id' => User::inRandomOrder()->first()->id,
            'annonce_id' => Annonce::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
            //
        ];
    }
}
