<?php

namespace Database\Factories;

use App\Models\CategoryProject;
use App\Models\ImageProject;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ImageProject::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => Project::factory(),
            'name' => $this->faker->name,
            'image_path' => null
        ];
    }
}