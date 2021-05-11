<?php

namespace Database\Factories;

use App\Models\CategoryProject;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryProject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->name
        ];
    }
}