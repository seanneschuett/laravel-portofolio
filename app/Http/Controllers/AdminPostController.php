<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        Post::create($this->validatedData($request));

        return redirect('/admin/posts')->with('success', 'Artikel berhasil dibuat');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($this->validatedData($request, $post));

        return redirect('/admin/posts')->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return back()->with('success', 'Artikel berhasil dihapus');
    }

    private function validatedData(Request $request, ?Post $post = null): array
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'cover' => 'nullable|string|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        $base = ($data['slug'] ?? null) ?: Str::slug($data['title']);
        $base = $base ?: 'artikel';
        $slug = $base;
        $counter = 1;

        while ($this->slugExists($slug, $post?->id)) {
            $slug = $base.'-'.(++$counter);
        }

        $data['slug'] = $slug;
        $data['is_published'] = $request->boolean('is_published');
        $data['published_at'] = $data['is_published']
            ? ($post?->published_at ?? now())
            : null;

        return $data;
    }

    private function slugExists(string $slug, ?int $ignoreId): bool
    {
        return Post::where('slug', $slug)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists();
    }
}
