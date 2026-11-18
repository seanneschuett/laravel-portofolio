<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function home()
    {
        $profile = Profile::first();
        $skills = Skill::orderBy('sort_order')->orderBy('name')->get();
        $experiences = Experience::orderBy('sort_order')->orderByDesc('id')->get();
        $certificates = Certificate::orderBy('sort_order')->orderByDesc('id')->get();
        $projects = Project::orderBy('sort_order')->orderByDesc('id')->get();
        $testimonials = Testimonial::where('is_approved', true)->orderByDesc('id')->get();
        $posts = Post::where('is_published', true)
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        return view('home', compact(
            'profile',
            'skills',
            'experiences',
            'certificates',
            'projects',
            'testimonials',
            'posts'
        ));
    }

    public function about()
    {
        $profile = Profile::first();
        $skills = Skill::orderBy('sort_order')->orderBy('name')->get();
        $experiences = Experience::orderBy('sort_order')->orderByDesc('id')->get();

        return view('about', compact('profile', 'skills', 'experiences'));
    }

    public function projects(Request $request)
    {
        $search = trim((string) $request->query('q', ''));
        $tech = trim((string) $request->query('tech', ''));

        $projects = Project::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($sub) use ($search) {
                    $sub->where('title', 'like', '%'.$search.'%')
                        ->orWhere('description', 'like', '%'.$search.'%')
                        ->orWhere('problem', 'like', '%'.$search.'%')
                        ->orWhere('goal', 'like', '%'.$search.'%')
                        ->orWhere('tags', 'like', '%'.$search.'%');
                });
            })
            ->when($tech !== '', fn ($query) => $query->where('tags', 'like', '%"'.$tech.'"%'))
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        $technologies = Project::pluck('tags')
            ->flatMap(fn ($tags) => json_decode($tags ?? '[]', true) ?: [])
            ->filter()
            ->unique()
            ->sort()
            ->values();

        return view('projects_list', compact('projects', 'technologies', 'search', 'tech'));
    }

    public function projectShow(Project $project)
    {
        $feedbacks = $project->feedbacks()
            ->where('is_approved', true)
            ->orderByDesc('id')
            ->get();

        return view('project_detail', compact('project', 'feedbacks'));
    }

    public function storeFeedback(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $data['is_approved'] = false;

        $project->feedbacks()->create($data);

        return redirect('/projects/'.$project->id.'#feedback')
            ->with('feedback_success', 'Terima kasih! Feedback Anda menunggu persetujuan admin.');
    }

    public function storeTestimonial(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'origin' => 'nullable|string|max:50',
            'message' => 'required|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $data['rating'] = $data['rating'] ?? 5;
        $data['is_approved'] = false;

        Testimonial::create($data);

        return redirect('/#testimoni')
            ->with('testimonial_success', 'Terima kasih! Testimoni Anda menunggu persetujuan admin.');
    }

    public function certificates()
    {
        $certificates = Certificate::orderBy('sort_order')->orderByDesc('id')->get();

        return view('certificates', compact('certificates'));
    }

    public function blog()
    {
        $posts = Post::where('is_published', true)
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->get();

        return view('blog.index', compact('posts'));
    }

    public function postShow($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $latestPosts = Post::where('is_published', true)
            ->where('id', '!=', $post->id)
            ->orderByDesc('published_at')
            ->take(3)
            ->get();

        return view('blog.show', compact('post', 'latestPosts'));
    }

    public function cv()
    {
        $profile = Profile::first();
        $skills = Skill::orderBy('sort_order')->orderBy('name')->get();
        $experiences = Experience::orderBy('sort_order')->orderByDesc('id')->get();
        $certificates = Certificate::orderBy('sort_order')->orderByDesc('id')->get();

        return view('cv', compact('profile', 'skills', 'experiences', 'certificates'));
    }

    public function contact()
    {
        $profile = Profile::first();

        return view('contact', compact('profile'));
    }

    public function sendContact(Request $request)
    {
        return back()->with('success', 'Pesan berhasil dikirim');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/projects');
        }

        return back()
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
