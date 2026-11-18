<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::firstOrCreate([]);

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::firstOrCreate([]);

        $data = $request->validate([
            'full_name' => 'nullable|string|max:255',
            'nickname' => 'nullable|string|max:255',
            'class' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
            'school' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'bio' => 'nullable|string',
            'about' => 'nullable|string',
            'photo' => 'nullable|string|max:2048',
            'about_photo' => 'nullable|string|max:2048',
            'cv_file' => 'nullable|string|max:2048',
            'career_goal' => 'nullable|string',
            'interests' => 'nullable|string',
            'education' => 'nullable|string',
            'instagram' => 'nullable|string|max:2048',
            'github' => 'nullable|string|max:2048',
            'linkedin' => 'nullable|string|max:2048',
        ]);

        $profile->update($data);

        return back()->with('success', 'Profil berhasil diperbarui');
    }
}
