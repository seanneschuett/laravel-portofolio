<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PortfolioController extends Controller
{
public function home()
    {
        $projects = Project::all();
        return view('home', compact('projects'));
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
        $username = $request->username;
        $password = $request->password;

        if ($username == 'admin' && $password == '12345') {
            session(['admin' => true]);
            return redirect('/admin/projects');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect('/admin/login');
    }
}

