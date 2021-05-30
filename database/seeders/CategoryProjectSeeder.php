<?php

namespace Database\Seeders;

use App\Models\CategoryProject;
use App\Models\ImageProject;
use App\Models\Project;
use Illuminate\Database\Seeder;

class CategoryProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryProject::factory()
            ->count(5)
            ->has(Project::factory()->has(ImageProject::factory()->count(1), 'images')->count(5), 'projects')
            ->create();
    }
}
