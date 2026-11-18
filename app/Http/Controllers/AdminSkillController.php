<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class AdminSkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.skills.index', compact('skills'));
    }

    public function store(Request $request)
    {
        Skill::create($this->validatedData($request));

        return back()->with('success', 'Skill berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->update($this->validatedData($request));

        return back()->with('success', 'Skill berhasil diperbarui');
    }

    public function destroy($id)
    {
        Skill::findOrFail($id)->delete();

        return back()->with('success', 'Skill berhasil dihapus');
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:hard,soft',
            'percentage' => 'required|integer|min:0|max:100',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
