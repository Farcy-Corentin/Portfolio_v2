<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function getExperience()
    {
        $experiences = Experience::all();
        return view('experiences', compact('experiences'));
    }
}
