<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function create()
    {
        return view('admin.training.create');
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
            'description' => 'required',
            'started_at' =>  'required|date|date_format:Y-m-d',
            'finished_at' =>  'required|date|date_format:Y-m-d',
            'cursus' => 'required',
            'links' => 'required',
            'pictures' => 'required',
        ]);

        $training = new Training();
        $training->title = $validated['title'];
        $training->description = $validated['description'];
        $training->started_at = $validated['started_at'];
        $training->finished_at = $validated['finished_at'];
        $training->cursus = $validated['cursus'];
        $training->links = $validated['links'];
        $training->pictures = $validated['pictures'];

        $training->save();
        $request->session()->flash('success', 'enregistrer');
        return redirect()->route('admin.training.show', $training->id);
    }

    /**
     * Visualiser dans l'admin Training
     * @param  \App\Models\Project $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.training.show');
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
