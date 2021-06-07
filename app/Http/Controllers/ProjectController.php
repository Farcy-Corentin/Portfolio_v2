<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ImageProject;
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
        $images = ImageProject::all();
        return view('single', compact('project', 'images'));
    }

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
