<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function getSkill()
    {
        $skills = Skill::all();
        return view('skills', compact('skills'));
    }
}
