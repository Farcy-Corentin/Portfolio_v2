<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\CategoryProject;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->name;
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'descriptions' => $this->faker->sentence(6, true),
            'categoryproject_id' => CategoryProject::factory(),
            'slug' => $slug,
            'started_at' => $this->faker->date(),
            'finished_at' => $this->faker->date(),
            'missions' =>  $this->faker->sentence(6, true),
            'languages' => $this->faker->sentence(6, true),
            'software' => $this->faker->sentence(6, true),
            'links' => 'https://www.google.com/',
            'github_links' => 'https://github.com/Grezor',
            'online' => $this->faker->boolean,
            'pictures' => 'https://via.placeholder.com/150',
        ];
    }
}
