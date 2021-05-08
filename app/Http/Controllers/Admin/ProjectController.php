<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\CategoryProject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $projects = Project::OrderBy('id', 'desc')->paginate(10);
        return view('admin.project.index', compact('projects'));
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
            'slug' => 'required|alpha_dash|min:5|max:255|unique:projects,slug',
            'categoryproject_id' => 'required|exists:categoryproject,id',
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
        $project->categoryproject_id = (int) $validated['categoryproject_id'];
        $project->slug = $validated['slug'];
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
        $post = Project::find($id);
        if ($request->input('slug') == $post->slug) {
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
        } else {
            $this->validate($request, [
                'title' => 'required',
                'descriptions' => 'required',
                'slug' => 'required|min:3|max:255|unique:projects, slug',
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
        }

        $project = Project::find($id);
        $project->title = $request->input('title');
        $project->descriptions = $request->input('descriptions');
        $project->slug = $request->input('slug');
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
