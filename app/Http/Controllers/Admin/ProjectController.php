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
    public function edit($id)
    {
        $project = Project::find($id);
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
            'online' => 'boolean',
            'pictures' => 'required'
        ]);

        $project = Project::find($id);
        $project->title = $request->input('title');
        $project->descriptions = $request->input('descriptions');
        $project->started_at = $request->input('started_at');
        $project->finished_at = $request->input('finished_at');
        $project->missions = $request->input('missions');
        $project->languages = $request->input('languages');
        $project->software = $request->input('software');
        $project->links = $request->input('links');
        $project->github_links = $request->input('github_links');
        $project->online = $request->input('online');
        $project->pictures = $request->input('pictures');

        $project->save();
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.project.show', $project->id);
    }

    /**
     * Supprimer un projet
     * @param  \App\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $project = Project::find($id);
        $project->delete();
        $request->session()->flash('success', 'Le projet ' . $id . ' a bien etais suprpimer');
        return redirect()->route('admin.project.index', $project->id);
    }
}
