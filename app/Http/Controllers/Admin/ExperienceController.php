<?php

namespace App\Http\Controllers\Admin;

use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    /**
     * Create form admin experience
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.experience.create');
    }

    public function index()
    {
        $experiences = Experience::all();
        return view('admin.experience.index', compact('experiences'));
    }

    /**
     * Validation du formulaire
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    /**
     * See the experiences when sending the form
     * @param  \App\Models\Experience $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        return view('admin.experience.show')->with('experience', $experience);
    }

    public function edit($id)
    {
        $experience = Experience::find($id);
        return view('admin.experience.edit')->with('experience', $experience);
    }

    /**
     * Update experience 
     * @param Request $request
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
            'pictures' => 'required',
            'links' => 'required'
        ]);

        $experience = Experience::find($id);
        $experience->title = $request->input('title');
        $experience->descriptions = $request->input('descriptions');
        $experience->started_at = $request->input('started_at');
        $experience->finished_at = $request->input('finished_at');
        $experience->missions = $request->input('missions');
        $experience->languages = $request->input('languages');
        $experience->pictures = $request->input('pictures');
        $experience->links = $request->input('links');

        $experience->save();
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.experience.show', $experience->id);
    }

    /**
     * Delete expérience
     * @param Request $request 
     * @param $id : l'id de l'experience
     */
    public function destroy(Request $request, $id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        $request->session()->flash('success', 'l\'expériences ' . $id . 'a bien été supprimer avec succès');
        return redirect()->route('admin.experience.index', $experience->id);
    }
}
