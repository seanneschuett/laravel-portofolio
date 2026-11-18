<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class AdminExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('sort_order')->orderByDesc('id')->get();

        return view('admin.experiences.index', compact('experiences'));
    }

    public function store(Request $request)
    {
        Experience::create($this->validatedData($request));

        return back()->with('success', 'Experience berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);
        $experience->update($this->validatedData($request));

        return back()->with('success', 'Experience berhasil diperbarui');
    }

    public function destroy($id)
    {
        Experience::findOrFail($id)->delete();

        return back()->with('success', 'Experience berhasil dihapus');
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'type' => 'required|in:plk,organisasi,lomba',
            'title' => 'required|string|max:255',
            'place' => 'nullable|string|max:255',
            'period' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
