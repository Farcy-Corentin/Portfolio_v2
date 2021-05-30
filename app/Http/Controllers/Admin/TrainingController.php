<?php

namespace App\Http\Controllers\Admin;

use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class TrainingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index(): View|Factory
    {
        $training = Training::all();
        return view('admin.training.index', compact('training'));
    }
    
    /**
     * 
     */
    public function create(): View|Factory
    {
        return view('admin.training.create');
    }

    public function store(Request $request): Redirector|RedirectResponse
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

    public function show(Training $training): View|Factory
    {
        return view('admin.training.show')->with('training', $training);
    }

    public function edit(int $id): View|Factory
    {
        $training = Training::find($id);
        return view('admin.training.edit')->with('training', $training);
    }

    /**
     * Update Formation
     */
    public function update(Request $request, int $id): Redirector|RedirectResponse
    {
        $validated = $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'started_at' =>  'required',
            'finished_at' =>  'required',
            'cursus' => 'required',
            'links' => 'required',
            'pictures' => 'required',
        ]);

        $training = new Training();
        $training->title = $validated['title'];;
        $training->description = $validated['description'];
        $training->started_at = $validated['started_at'];
        $training->finished_at = $validated['finished_at'];
        $training->cursus = $validated['cursus'];
        $training->links = $validated['links'];
        $training->pictures = $validated['pictures'];

        $training->save();
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.training.show', $training->id);
    }

    public function destroy(Request $request, int $id): Redirector|RedirectResponse
    {
        $training = new training();
        $training::find($id);
        $training->delete();
        $request->session()->flash('success', 'la Formation ' . $id . ' a bien été supprimer avec succès');
        return redirect()->route('admin.training.index', $training->id);
    }
}
