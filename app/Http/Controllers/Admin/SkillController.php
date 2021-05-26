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

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * 
     */
    public function index(): Factory|View
    {
        return view('admin.skill.index', [
            'skills' => Skill::with('category')->get()
        ]);
    }

    /**
     * 
     */
    public function create(): Factory|View
    {
        return view('admin.skill.create', [
            'categories' => $this->selectCategorie()
        ]);
    }

    /**
     * Editer une Compétences
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::find($id);
        $categoriesSkill = Category::all();

        $cats = [];
        foreach ($categoriesSkill as $categorySkill) {
            $cats[$categorySkill->id] = $categorySkill->name;
        }

        return view('admin.skill.edit')->with([ 
            'skill' => $skill, 
            'categories' => $cats
            ]);
    }

    /**
     * Update Skill
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|max:255',
            'category_id' => 'required',
            'skills' => 'required'
        ]);

        $skill = new Skill();
        $skill->name = $validated['name'];
        $skill->category_id = (int) $validated['category_id'];
        $skill->skills = $validated['skills'];

        $skill->save();
        $request->session()->flash('success', 'Enregister');
        return redirect()->route('admin.skill.show', $skill->id);
    }

    /**
     * Visualiser les compétences
     * @param  \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        return view('admin.skill.show')->with('skill', $skill);
    }

    /**
     * Supprimer une compétence
     * @param  \App\Models\Skill $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        $request->session()->flash('success', 'La compétences ' . $id . ' a bien etais suprpimer');
        return redirect()->route('admin.skill.index', $skill->id);
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
