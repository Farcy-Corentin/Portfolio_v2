<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class ExperienceController extends Controller
{
    public function getExperience(): View|Factory
    {
        $experiences = Experience::all();
        return view('experiences', compact('experiences'));
    }
}
