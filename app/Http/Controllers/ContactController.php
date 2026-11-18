<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $messages = Contact::latest()->get();

        return view('admin.messages', compact('messages'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        return back()->with('success', 'Message deleted successfully!');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        return back()->with('success', 'Message sent successfully!');
    }
}
