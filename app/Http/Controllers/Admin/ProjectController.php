<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::all();
        return view('admin.project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'title' => 'required|max:255',
            'descriptions' => 'required',
            'started_at' =>  'required|date|date_format:Y-m-d',
            'finished_at' =>  'required|date|date_format:Y-m-d',
            'missions' => 'required',
            'languages' => 'required',
            'software' => 'required',
            'links' => 'required',
            'github_links' => 'required',
            'online' => 'required',
            'pictures' => 'required',
        ]);

        $project = new Project();
        $project->title = $validated['title'];
        $project->descriptions = $validated['descriptions'];
        $project->started_at = $validated['started_at'];
        $project->finished_at = $validated['finished_at'];
        $project->missions = $validated['missions'];
        $project->languages = $validated['languages'];
        $project->software = $validated['software'];
        $project->links = $validated['links'];
        $project->github_links = $validated['github_links'];
        $project->online = $validated['online'];
        $project->pictures = $validated['pictures'];

        $project->save();
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.project.show', $project->id);
    }

    /**
     * Visualiser dans l'admin
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.project.show')->with('project', $project);
    }

    /**
     * Editer un Projet
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::find($project);
        return view('admin.project.edit')->with('project', $project);
    }

    /**
     * Mettre a jour un projet
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'descriptions' => 'required',
            'started_at' => 'required',
            'finished_at' => 'required',
            'missions' => 'required',
            'languages' => 'required',
            'software' => 'required',
            'links' => 'required',
            'github_links' => 'required',
            'online' => 'required',
            'pictures' => 'required'
        ]);
    }

    /**
     * Supprimer un projet
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
