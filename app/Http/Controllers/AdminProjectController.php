<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

        $project->update($this->validatedData($request, $project));

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

    private function validatedData(Request $request, ?Project $project = null): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'required|string',
            'problem' => 'nullable|string',
            'goal' => 'nullable|string',
            'role' => 'nullable|string|max:255',
            'features' => 'nullable|string',
            'image' => 'required|string|max:2048',
            'link' => 'required|string|max:2048',
            'github_url' => 'nullable|string|max:2048',
            'documentation' => 'nullable|string',
            'category' => 'nullable|string|max:100',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
            'tags' => 'nullable|array',
            'tags.*' => 'string|max:50',
        ]);

        $features = $data['features'] ?? '';
        $data['features'] = collect(preg_split('/\r\n|\r|\n/', $features))
            ->map(fn ($feature) => trim($feature))
            ->filter()
            ->values()
            ->all();

        $base = ($data['slug'] ?? null) ?: Str::slug($data['title']);
        $base = $base ?: 'project';
        $slug = $base;
        $counter = 1;

        while (Project::where('slug', $slug)
            ->when($project, fn ($query) => $query->where('id', '!=', $project->id))
            ->exists()) {
            $slug = $base.'-'.(++$counter);
        }

        $data['slug'] = $slug;
        $data['tags'] = json_encode($data['tags'] ?? []);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
