<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::$table('skills')->insert([
            'name' => Str::random(10),
            'categories' => Str::random(10),
            'skills' => Str::random(10),
        ]);
    }
}
