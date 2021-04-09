<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        $training = Training::all();
        return view('admin.training.index', compact('training'));
    }

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
            'started_at' =>  'required|date',
            'finished_at' =>  'required|date',
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
     * @param  \App\Models\Training $id
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        return view('admin.training.show')->with('training', $training);
    }

    /**
     * Edit Formation
     */
    public function edit($id)
    {
        $training = Training::find($id);
        return view('admin.training.edit')->with('training', $training);
    }

    /**
     * Update Formation
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'started_at' =>  'required|date',
            'finished_at' =>  'required|date',
            'cursus' => 'required',
            'links' => 'required',
            'pictures' => 'required',
        ]);

        $training = Training::find($id);
        $training->title = $request->input('title');
        $training->description = $request->input('description');
        $training->started_at = $request->input('started_at');
        $training->finished_at = $request->input('finished_at');
        $training->cursus = $request->input('cursus');
        $training->links = $request->input('links');
        $training->pictures = $request->input('pictures');

        $training->save();
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.training.show', $training->id);
    }

    /**
     * DELETE FORMATION
     */
    public function destroy(Request $request, $id)
    {
        $training = Training::find($id);
        $training->delete();
        $request->session()->flash('success', 'la Formation ' . $id . ' a bien été supprimer avec succès');
        return redirect()->route('admin.training.index', $training->id);
    }
}
