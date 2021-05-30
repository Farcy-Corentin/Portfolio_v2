<?php

namespace App\Http\Controllers\Admin;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Expr\New_;

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


    public function store(Request $request): Redirector|RedirectResponse
    {
        $validated = $this->validate($request, [
            'title' => 'required',
            'descriptions' => 'required',
            'started_at' => 'required',
            'finished_at' => 'required',
            'missions' => 'required',
            'languages' => 'required',
            'pictures' => 'required',
            'links' => 'required'
        ]);

        $experience = new Experience();
        $experience->title = $validated['title'];
        $experience->descriptions = $validated['descriptions'];
        $experience->started_at = $validated['started_at'];
        $experience->finished_at = $validated['finished_at'];
        $experience->missions = $validated['missions'];
        $experience->languages = $validated['languages'];
        $experience->pictures = $validated['pictures'];
        $experience->links = $validated['links'];

        $experience->save();
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.experience.show', $experience->id);
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

    public function update(Request $request): Redirector|RedirectResponse
    {
         $validated = $this->validate($request, [
            'title' => 'required',
            'descriptions' => 'required',
            'started_at' => 'required',
            'finished_at' => 'required',
            'missions' => 'required',
            'languages' => 'required',
            'pictures' => 'required',
            'links' => 'required'
        ]);

        $experience = new Experience();
        $experience->title =  $validated['title'];
        $experience->descriptions = $validated['descriptions'];
        $experience->started_at = $validated['started_at'];
        $experience->finished_at =  $validated['finished_at'];
        $experience->missions =$validated['missions'];
        $experience->languages = $validated['languages'];
        $experience->pictures = $validated['pictures'];
        $experience->links = $validated['links'];

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
}
