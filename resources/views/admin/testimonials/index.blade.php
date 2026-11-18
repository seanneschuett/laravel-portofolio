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
            <div class="flex items-center gap-0.5">
                @for($i = 1; $i <= 5; $i++)
                    <svg class="w-4 h-4 {{ $i <= (int) $testimonial->rating ? 'text-amber-500' : 'text-amber-200' }}" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                @endfor
            </div>
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
