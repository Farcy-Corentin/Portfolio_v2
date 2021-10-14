<?php

namespace App\Http\Controllers\Admin;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExperienceStoreFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Storage;


class ExperienceController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create(): View
    {
        return view('admin.experience.create');
    }

    public function index(): View|Factory
    {
        $experiences = Experience::all();
        return view('admin.experience.index', compact('experiences'));
    }

    public function store(ExperienceStoreFormRequest $request): Redirector|RedirectResponse
    {
        $experience = $this->storeExperience($request->all());
        // uploads files
        $file = $request->file('pictures');
        $filename = Str::uuid() . '.' . $file->extension();
        $file->move(public_path().'/uploads/experience/', $filename);
        $experience->pictures = $filename;

        $experience->save();
        return redirect()
                ->route('admin.experience.show', $experience->id)
                ->with(['success' => 'Création de L\'ex^périence']);
    }

    public function show(Experience $experience): View
    {
        return view('admin.experience.show')->with('experience', $experience);
    }
    
    public function edit(int $id): View|Factory
    {
        $experience = Experience::find($id);
        return view('admin.experience.edit')->with('experience', $experience);
    }

    public function update(ExperienceStoreFormRequest $request, Experience $experience): Redirector|RedirectResponse
    {
        $filepath = storage_path('app/public/uploads/experience/' . $experience->pictures);
        if (file_exists($filepath)) {
            unlink($filepath);
        }

        $this->storeExperience($request->all(), $experience);

        $file = $request->file('pictures');
        $filename = Str::uuid() . '-' . $file->extension();
        $file->storeAs('uploads/experience', $filename ,'public');

        $experience->pictures = $filename;
        $experience->save();
        
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.experience.show', $experience->id);
    }

    public function destroy(Request $request, int $id): Redirector|RedirectResponse
    {
        // $experience = Experience::findOrFail($id)->delete();
        $experience = new Experience();
        $experience::find($id);
        $experience->delete();
        $request->session()->flash('success', 'l\'expériences ' . $id . 'a bien été supprimer avec succès');
        return redirect()->route('admin.experience.index', $experience->id);
    }

    private function storeExperience(array $experienceData, Experience $experience = null): Experience
    {
        $experience ??= new Experience();
        $experience->title = $experienceData['title'];
        $experience->descriptions = $experienceData['descriptions'];
        $experience->started_at = $experienceData['started_at'];
        $experience->finished_at = $experienceData['finished_at'];
        $experience->missions = $experienceData['missions'];
        $experience->languages = $experienceData['languages'];
        $experience->pictures = $experienceData['pictures'];
        $experience->links = $experienceData['links'];
        $experience->save();

        return $experience;
    }
}
