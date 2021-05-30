<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;

class SkillController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
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

    public function edit(int $id): View|Factory
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

    public function update(Request $request): Redirector|RedirectResponse
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

    public function show(Skill $skill): View|Factory
    {
        return view('admin.skill.show')->with('skill', $skill);
    }

    public function destroy(Request $request, int $id): Redirector|RedirectResponse
    {
        $skill = Skill::find($id);
        if ($skill === null) {
            return back()->with('error', 'Skill not found');
        }

        $skill->delete();

        $request->session()->flash('success', "La compétences {$id} a bien etais suprpimer");
        return redirect()->route('admin.skill.index', $skill->id);
    }

    /**
     * Selectionne toutes les catégories
     */
    private function selectCategorie(): Collection
    {
        return Category::all()->pluck('name', 'id');
    }
}
