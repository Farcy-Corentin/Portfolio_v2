<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class SkillController extends Controller
{
    /**
     * 
     */
    public function index(): Factory|View
    {
        return view('admin.skill.index', [
            'skills' => Skill::with('category')->get()
        ]);
    }

    public function create(): Factory|View
    {
        return view('admin.skill.create', [
            'categories' => $this->selectCategorie()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|max:255',
            'category' => 'required|exists:categories,id',
            'skills' => 'required'
        ]);

        $skill = new Skill();
        $skill->name = $validated['name'];
        $skill->category_id = (int) $validated['category'];
        $skill->skills = $validated['skills'];

        $skill->save();
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.skill.show', $skill->id);
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return view('admin.skill.show');
    }
    
    /**
     * Selectionne toutes les catégories prèsente en BDD
     * @return \Illuminate\Support\Collection
     */
    private function selectCategorie(): Collection
    {
        return Category::all()->pluck('name', 'id');
    }
}
