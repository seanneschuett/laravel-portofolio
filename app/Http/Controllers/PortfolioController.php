<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    public function home()
    {
        $projects = Project::all();
        $testimonials = Testimonial::where('is_approved', true)->orderByDesc('id')->get();

        return view('home', compact('projects', 'testimonials'));
    }

    public function storeTestimonial(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'origin' => 'nullable|in:guru,teman,pengguna,plk',
            'message' => 'required|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $data['is_approved'] = false;

        Testimonial::create($data);

        return redirect('/#testimoni')->with('testimonial_success', 'Terima kasih! Testimoni Anda menunggu persetujuan admin.');
    }

    public function contact()
    {
        return view('contact');
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
