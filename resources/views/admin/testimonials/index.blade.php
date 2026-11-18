@extends('admin.layout')

@section('title', 'Admin - Testimoni')
@section('mobile_title', 'Testimoni')
@section('container_class', 'max-w-6xl')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Testimoni</h1>
        <p class="text-slate-500 text-sm mt-1">Testimoni dikirim oleh pengunjung. Setujui untuk menampilkannya di website.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        @forelse($testimonials as $testimonial)
        <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm space-y-3">
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-center gap-3">
                    @if($testimonial->photo)
                        <img src="{{ $testimonial->photo }}" alt="{{ $testimonial->name }}" class="w-11 h-11 rounded-full object-cover">
                    @else
                        <div class="w-11 h-11 rounded-full bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold">{{ strtoupper(substr($testimonial->name, 0, 1)) }}</div>
                    @endif
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">{{ $testimonial->name }}</h3>
                        <p class="text-slate-500 text-xs">{{ $testimonial->role }}{{ $testimonial->origin ? ' · '.ucfirst($testimonial->origin) : '' }}</p>
                    </div>
                </div>
                <span class="text-xs font-semibold px-2.5 py-0.5 rounded-lg border {{ $testimonial->is_approved ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-amber-50 text-amber-700 border-amber-200' }}">
                    {{ $testimonial->is_approved ? 'Dipublikasikan' : 'Menunggu' }}
                </span>
            </div>
            <div class="text-amber-500 text-sm">{{ str_repeat('★', (int) $testimonial->rating) }}{{ str_repeat('☆', 5 - (int) $testimonial->rating) }}</div>
            <p class="text-slate-600 text-sm leading-relaxed">{{ $testimonial->message }}</p>
            <div class="flex items-center gap-2 pt-2 border-t border-slate-100">
                <form action="/admin/testimonials/{{ $testimonial->id }}/approve" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200 py-2 rounded-xl text-xs font-semibold transition">
                        {{ $testimonial->is_approved ? 'Tarik Publikasi' : 'Setujui' }}
                    </button>
                </form>
                <form action="/admin/testimonials/{{ $testimonial->id }}" method="POST" onsubmit="return confirm('Hapus testimoni ini?')" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 py-2 rounded-xl text-xs font-semibold transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-white border border-slate-200/80 rounded-2xl p-10 text-center text-slate-500 text-sm">
            Belum ada testimoni masuk.
        </div>
        @endforelse
    </div>
@endsection
