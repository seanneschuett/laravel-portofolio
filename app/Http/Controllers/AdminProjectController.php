<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

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
        $data = $request->all();
        $data['tags'] = json_encode($request->tags ?? []);

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

        $data = $request->all();
        $data['tags'] = json_encode($request->tags ?? []);

        $project->update($data);

        return redirect('/admin/projects');
    }

    public function destroy($id)
    {
        Project::destroy($id);

        return back();
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/images', $filename);
            
            return response()->json([
                'path' => '/storage/images/' . $filename,
                'url' => asset('storage/images/' . $filename)
            ]);
        }
        
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}