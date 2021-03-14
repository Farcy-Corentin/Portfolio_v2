<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    public function getProject()
    {
        $projects = Project::all();
        return view('admin.project', compact('project'));
    }
}
