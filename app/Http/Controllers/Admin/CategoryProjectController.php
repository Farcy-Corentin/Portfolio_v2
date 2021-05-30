<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CategoryProject;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

class CategoryProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
         
   public function index(): View|Factory
   {
     $categoryProject = CategoryProject::all();
     return view('admin.categoryProject.index', compact('categoryProject'));
   }

   /**
    * create
    *
    * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    */
   public function create()
   {
    return view('admin.categoryProject.create');
   }

    public function store(Request $request): Redirector|RedirectResponse
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
    
    public function show(CategoryProject $categoryProject): View|Factory
    {
        return view('admin.categoryProject.show')->with('categoryProject', $categoryProject);
    }

    public function edit(int $id): View|Factory
    {
        $categoryProject = CategoryProject::find($id);
        return view('admin.categoryProject.edit')->with('categoryProject', $categoryProject);
    }

    // public function update(Request $request, int $id): Redirect|RedirectResponse
    // {
    //     $this->validate($request, [
    //         'title' => 'required|null',
    //         'description' => 'required',
    //     ]);

    //     $categoryProject = CategoryProject::find($id);
    //     $categoryProject->title = $request->input('title');
    //     $categoryProject->description = $request->input('description');

    //     $categoryProject->save();
    //     $request->session()->flash('success', 'Enregister');
    //     return redirect()->route('admin.categoryProject.show', $categoryProject->id);
    // }

     public function update(Request $request, int $id): Redirect|RedirectResponse
    {
        $validated = $this->validate($request, [
            'title' => 'required|null',
            'description' => 'required|null',
        ]);

        $categoryProject = new CategoryProject();
        $categoryProject->title = $validated['title'];
        $categoryProject->description = $validated['description'];

        $categoryProject->save();
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.categoryProject.show', $categoryProject->id);
    }

    public function destroy(Request $request, int $id): Redirector|RedirectResponse
    {
        // $categoryProject = CategoryProject::find($id)->delete();
        $categoryProject = new CategoryProject();
        $categoryProject::find($id);
        $categoryProject->delete();
        $request->session()->flash('success', 'l\'expériences ' . $id . 'a bien été supprimer avec succès');
        return redirect()->route('admin.categoryProject.index', $categoryProject->id);
    }

}
