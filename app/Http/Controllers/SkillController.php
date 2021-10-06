<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class SkillController extends Controller
{
    public function index(): View|Factory
    {
        $skills = Skill::all();
        $categories = Category::all();
        return view('skills', compact('skills', 'categories'));
    }

}
