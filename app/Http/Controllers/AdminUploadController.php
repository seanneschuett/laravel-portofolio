<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUploadController extends Controller
{
    public function image(Request $request)
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

    public function file(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx|max:8192',
        ]);

        $file = $request->file('file');
        $filename = time().'_'.$file->getClientOriginalName();
        $path = $file->storeAs('files', $filename, 'public');

        return response()->json([
            'path' => '/storage/'.$path,
            'url' => asset('storage/'.$path),
        ]);
    }
}
