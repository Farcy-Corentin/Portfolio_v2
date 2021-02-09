<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function getIndex()
    {
        $skills = Skill::all();
        return view('skills', compact('skills'));
    }

    public function show()
    {
        
    }

}
