<?php

namespace App\Http\Controllers\Admin;
use App\Models\Project;
use Illuminate\Support\Str;
use App\Models\ImageProject;
use Illuminate\Http\Request;
use App\Models\CategoryProject;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\View\Factory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(): View|Factory
    {
        $projects = Project::OrderBy('id', 'desc')->paginate(10);
        $images = ImageProject::all('image_path', 'id');
        $countProject = DB::table('projects')->count();
        
        return view('admin.project.index', compact('projects', 'images', 'countProject' ));
    }

    public function create(): Factory|View
    {
        return view('admin.project.create', [
            'categoriesProject' => $this->selectCategoriesProject(),
            'imageproject' => ImageProject::class
        ]);
    }

    public function store(Request $request): Redirector|RedirectResponse
    {
        $validated = $this->validate($request, [
            'title' => 'required|max:255',
            'descriptions' => 'required',
            'categoryproject' => 'required|exists:categoryproject,id',
            // 'slug' => 'required|alpha_dash|min:5|max:255|unique:projects,slug',
            'started_at' =>  'required|date|date_format:Y-m-d',
            'finished_at' =>  'required|date|date_format:Y-m-d',
            'missions' => 'required',
            'languages' => 'required',
            'software' => 'required',
            'links' => 'required',
            'github_links' => 'required',
            'imageFile' => 'required',
            'imageFile.*' => 'mimes:jpeg,jpg,png,gif|max:5000'
        ]);

        $project = new Project();
        $project->title = $validated['title'];
        $project->descriptions = $validated['descriptions'];
        $project->categoryproject_id = (string) $validated['categoryproject'];
        $project->slug = Str::slug($project->title, '-');
        $project->started_at = $validated['started_at'];
        $project->finished_at = $validated['finished_at'];
        $project->missions = $validated['missions'];
        $project->languages = $validated['languages'];
        $project->software = $validated['software'];
        $project->links = $validated['links'];
        $project->github_links = $validated['github_links'];
        $project->online = (int) $request->has('online');
        $project->save();
        $project->refresh();
        // upload image
        foreach($validated['imageFile'] as $file)
        {
            $random = Str::random();
            $filename = "{$project->id}-{$random}.{$file->getClientOriginalExtension()}";
            $file->move(public_path().'/uploads/', $filename);
            $fileModal = new ImageProject();
            $fileModal->project_id = $project->id;
            $fileModal->name = $file->getClientOriginalName();
            $fileModal->image_path = $filename;
            $fileModal->save();
        }

        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.project.show', $project->id);
    }

    public function show(Project $project, ImageProject $images): View|Factory
    {
        $images = ImageProject::find($project);
        return view('admin.project.show')
            ->with([
                'project' => $project,
                'images' => $images 
            ]);
    }

    public function edit(int $id): View|Factory
    {
        $project = Project::find($id);
        $categories = CategoryProject::all();

        $cats = [];
        foreach ($categories as $categoryproject) {
            $cats[$categoryproject->id] = $categoryproject->title;
        }

        return view('admin.project.edit')->with([
            'project' => $project,
            'categories' => $cats
        ]);

    }

    public function update(Request $request): Redirector|RedirectResponse
    {
        $post = new Project();
        if ($request->input('slug') == $post->slug) {
            $validated = $this->validate($request, [
                'title' => 'required',
                'descriptions' => 'required',
                'categoryproject' => 'required',
                'started_at' => 'required',
                'finished_at' => 'required',
                'missions' => 'required',
                'languages' => 'required',
                'software' => 'required',
                'links' => 'required',
                'github_links' => 'required',
                'online' => 'boolean',
                'imageproject' => 'required'
            ]);
        } else {
            $validated = $this->validate($request, [
                'title' => 'required',
                'descriptions' => 'required',
                'categoryproject' => 'required',
                'slug' => 'required|min:3|max:255|unique:projects, slug',
                'started_at' => 'required',
                'finished_at' => 'required',
                'missions' => 'required',
                'languages' => 'required',
                'software' => 'required',
                'links' => 'required',
                'github_links' => 'required',
                'online' => 'boolean',
                'imageproject' => 'required'
            ]);
        }

        $project = new Project();
        $project->title = $validated['title'];
        $project->descriptions = $validated['descriptions'];
        $project->categoryproject_id = $validated['categoryproject_id'];
        $project->slug = $validated['slug'];
        $project->started_at = $validated['started_at'];
        $project->finished_at = $validated['finished_at'];
        $project->missions = $validated['missions'];
        $project->languages = $validated['languages'];
        $project->software =$validated['software'];
        $project->links = $validated['links'];
        $project->github_links = $validated['github_links'];
        $project->online = $validated['online'];
        $project->imageproject_id = $validated['imageproject_id'];

        $project->save();
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.project.show', $project->id);
    }

    public function destroy(Request $request,mixed $id): Redirector|RedirectResponse
    {
        // $project = Project::findOrFail($id)->delete();
        $project = new Project();
        $project::find($id);
        $project->delete();
        $request->session()->flash('success', 'Le projet ' . $id . ' a bien etais suprpimer');
        return redirect()->route('admin.project.index', $project->id);
    }

    public function selectCategoriesProject(): Collection
    {
        return CategoryProject::all()->pluck('title', 'id');
    }

    public function countProject()
    {
      
    }
}
