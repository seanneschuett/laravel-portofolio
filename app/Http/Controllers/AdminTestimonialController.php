<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderByDesc('id')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function approve($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->update(['is_approved' => ! $testimonial->is_approved]);

        return back()->with('success', 'Status testimoni berhasil diubah');
    }

    public function destroy($id)
    {
        Testimonial::findOrFail($id)->delete();

        return back()->with('success', 'Testimoni berhasil dihapus');
    }
}
