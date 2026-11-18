<?php

namespace App\Http\Controllers;

use App\Models\ProjectFeedback;

class AdminFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = ProjectFeedback::with('project')->latest()->get();

        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function approve($id)
    {
        $feedback = ProjectFeedback::findOrFail($id);
        $feedback->update(['is_approved' => ! $feedback->is_approved]);

        return back()->with('success', 'Status feedback berhasil diubah');
    }

    public function destroy($id)
    {
        ProjectFeedback::findOrFail($id)->delete();

        return back()->with('success', 'Feedback berhasil dihapus');
    }
}
