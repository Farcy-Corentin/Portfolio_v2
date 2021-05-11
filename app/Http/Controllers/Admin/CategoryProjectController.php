<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProject;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CategoryProjectController extends Controller
{
    /**
     * 
     */
   public function index()
   {
     $categoryProject = CategoryProject::all();
     return view('admin.categoryProject.index', compact('categoryProject'));
   }

   /**
    *
    */
   public function create(): Factory|View
   {
    return view('admin.categoryProject.create');
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
            'description' => 'required',
            
        ]);

        $categoryProject = new CategoryProject();
        $categoryProject->title = $validated['title'];
        $categoryProject->description = $validated['description'];
        $categoryProject->save();
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.categoryProject.show', $categoryProject->id);
    }
    
    /**
     * @param  \App\Models\CategoryProject $categoryProject
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryProject $categoryProject)
    {
        // dd($categoryProject);
        return view('admin.categoryProject.show')->with('categoryProject', $categoryProject);
    }


    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryProject = CategoryProject::find($id);
      
        return view('admin.categoryProject.edit')->with('categoryProject', $categoryProject);
    }

    /**
     * Mettre a jour un projet
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryProject $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $categoryProject = CategoryProject::find($id);
        $categoryProject->title = $request->input('title');
        $categoryProject->description = $request->input('description');

        $categoryProject->save();
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.categoryProject.show', $categoryProject->id);
    }

    
    /**
     * Delete Categorie Project
     * @param Request $request 
     * @param $id : l'id categorie
     */
    public function destroy(Request $request, $id)
    {
        $categoryProject = CategoryProject::find($id);
        $categoryProject->delete();
        $request->session()->flash('success', 'l\'expériences ' . $id . 'a bien été supprimer avec succès');
        return redirect()->route('admin.categoryProject.index', $categoryProject->id);
    }

}
