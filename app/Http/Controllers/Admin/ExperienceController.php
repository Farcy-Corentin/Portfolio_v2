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
}
