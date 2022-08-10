<?php

namespace Database\Factories;

use App\Models\{Category, User};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Console\Factories\{UserFactory, CategoryFactory};

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
	        'user_id' => User::factory(),
	        'category_id' => Category::factory(),
	        'title' => $this->faker->sentence,
	        'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
	        'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
	        'slug' => $this->faker->slug,
	        'published_at' => $this->faker->date
        ];
    }
}
