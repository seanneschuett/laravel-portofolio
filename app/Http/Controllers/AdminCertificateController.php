<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class AdminCertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('sort_order')->orderByDesc('id')->get();

        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        Certificate::create($this->validatedData($request));

        return redirect('/admin/certificates')->with('success', 'Sertifikat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);

        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->update($this->validatedData($request));

        return redirect('/admin/certificates')->with('success', 'Sertifikat berhasil diperbarui');
    }

    public function destroy($id)
    {
        Certificate::findOrFail($id)->delete();

        return back()->with('success', 'Sertifikat berhasil dihapus');
    }

    private function validatedData(Request $request): array
    {
        $data = $request->validate([
            'type' => 'required|in:sertifikat,prestasi',
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:20',
            'image' => 'nullable|string|max:2048',
            'documentation' => 'nullable|string',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
