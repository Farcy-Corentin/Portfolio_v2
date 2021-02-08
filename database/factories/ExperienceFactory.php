<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'descriptions' => $this->faker->sentence(6, true),
            'started_at' => $this->faker->date(),
            'finished_at' => $this->faker->date(),
            'missions' => $this->faker->sentence(6, true),
            'languages' => implode(', ', $this->faker->words(3)),
            'pictures' => 'https://via.placeholder.com/150',
            'links' => 'https://www.google.com/',
        ];
    }
}
