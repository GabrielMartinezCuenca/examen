<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Editorial;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->text(15),
            'category_id' => Category::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1, 10),
            'editorial_id' => Editorial::inRandomOrder()->first()->id,
        ];
    }
}
