@extends('admin.layout')

@section('title', 'Admin - Sertifikat')
@section('mobile_title', 'Sertifikat')
@section('container_class', 'max-w-6xl')

@section('content')
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Sertifikat & Prestasi</h1>
            <p class="text-slate-500 text-sm mt-1">Kelola sertifikat, prestasi, dan dokumentasinya</p>
        </div>
        <a href="/admin/certificates/create"
           class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-5 py-2.5 rounded-xl font-bold text-sm transition flex items-center gap-2 shadow-md shadow-emerald-600/20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Sertifikat</span>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($certificates as $certificate)
        <div class="bg-white border border-slate-200/80 rounded-2xl overflow-hidden shadow-sm flex flex-col justify-between">
            <div>
                <div class="aspect-video bg-slate-100 overflow-hidden">
                    @if($certificate->image)
                        <img src="{{ $certificate->image }}" alt="{{ $certificate->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-slate-400 text-sm">Tanpa gambar</div>
                    @endif
                </div>
                <div class="p-5">
                    <span class="inline-block text-[11px] font-semibold px-2.5 py-0.5 rounded-lg border mb-2 {{ $certificate->type === 'prestasi' ? 'bg-amber-50 text-amber-700 border-amber-200' : 'bg-emerald-50 text-emerald-700 border-emerald-200' }}">
                        {{ ucfirst($certificate->type) }}
                    </span>
                    <h2 class="text-lg font-bold text-slate-900 line-clamp-1">{{ $certificate->title }}</h2>
                    <p class="text-slate-500 text-sm mt-1">{{ $certificate->issuer }}{{ $certificate->year ? ' · '.$certificate->year : '' }}</p>
                </div>
            </div>
            <div class="px-5 pb-5 flex items-center gap-2">
                <a href="/admin/certificates/{{ $certificate->id }}/edit"
                   class="flex-1 bg-amber-50 hover:bg-amber-100 text-amber-700 border border-amber-200/80 py-2 rounded-xl text-xs font-semibold transition text-center">
                    Edit
                </a>
                <form action="/admin/certificates/{{ $certificate->id }}" method="POST" onsubmit="return confirm('Hapus sertifikat ini?')" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200/80 py-2 rounded-xl text-xs font-semibold transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white border border-slate-200/80 rounded-2xl p-10 text-center text-slate-500 text-sm">
            Belum ada sertifikat. Klik "Tambah Sertifikat".
        </div>
        @endforelse
    </div>
@endsection
