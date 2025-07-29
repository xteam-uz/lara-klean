<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'content' => $this->faker->text(1000),
            'photo' => 'blog-1.jpg',  // Foydalanuvchi tomonidan yuklangan rasm URL manzili
            // created_at va updated_at avtomatik to‘ldiriladi
        ];
    }
}
