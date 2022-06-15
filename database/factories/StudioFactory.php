<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Studio>
 */
class StudioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,3)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // 'desc' => '<p>'. implode('</p><p>', $this->faker->paragraphs(mt_rand(1,3))) . '</p>',
            'desc' => collect($this->faker->paragraphs(mt_rand(1,3)))
                        ->map(fn($p) => "<p>$p</p>")
                        // ->map(function($p){
                        //     return "<p>$p</p>";
                        // })
                        ->implode(''),
            'user_id' => $this->faker->unique()->numberBetween(2,11),
            'category_id' => mt_rand(1,4),

        ];
    }
}
