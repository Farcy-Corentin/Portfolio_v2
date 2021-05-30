<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\Contracts\View\View;

class ProjectController extends Controller
{
    public function getProject(): View|Factory
    {
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

    /**
     * Affiche le slug (show project)
     */
    public function showProject(string $slug): View|Factory
    {
        $project = Project::where('slug', $slug)->first();
        return view('single', compact('project'));
    }
}
