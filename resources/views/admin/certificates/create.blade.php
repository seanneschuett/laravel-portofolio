@extends('admin.layout')

@section('title', 'Admin - Tambah Sertifikat')
@section('mobile_title', 'Tambah Sertifikat')
@section('container_class', 'max-w-4xl')

@section('content')
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Tambah Sertifikat</h1>
            <p class="text-slate-500 text-sm mt-1">Tambahkan sertifikat atau prestasi baru</p>
        </div>
        <a href="/admin/certificates" class="bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl font-semibold transition flex items-center gap-2 text-sm text-slate-700 shadow-sm">
            <span>Kembali</span>
        </a>
    </div>

    <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-sm">
        @include('admin.certificates.form', ['certificate' => null])
    </div>
@endsection
