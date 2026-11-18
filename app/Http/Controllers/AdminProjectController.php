<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('admin.manage.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.manage.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatedData($request);

        Project::create($data);

        return redirect('/admin/projects');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);

        return view('admin.manage.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $project->update($this->validatedData($request));

        return redirect('/admin/projects');
    }

    public function destroy($id)
    {
        Project::destroy($id);

        return back();
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        $file = $request->file('image');

        $filename = time().'_'.$file->getClientOriginalName();

        $path = $file->storeAs('images', $filename, 'public');

        return response()->json([
            'path' => '/storage/'.$path,
            'url' => asset('storage/'.$path),
        ]);
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string|max:2048',
            'link' => 'required|string|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
        ]);

        $data['tags'] = json_encode($data['tags'] ?? []);

        return $data;
    }
}
