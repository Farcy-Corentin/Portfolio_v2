<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function getProject()
    {
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

    /**
     * Affiche le slug (show project)
     */
    public function showProject($slug)
    {
        $project = Project::where('slug', $slug)->first();
        return view('single', compact('project'));
    }
}
