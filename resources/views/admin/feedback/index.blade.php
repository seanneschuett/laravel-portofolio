@extends('admin.layout')

@section('title', 'Admin - Feedback')
@section('mobile_title', 'Feedback')
@section('container_class', 'max-w-6xl')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Feedback Proyek</h1>
        <p class="text-slate-500 text-sm mt-1">Moderasi feedback pengguna untuk setiap proyek</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        @forelse($feedbacks as $feedback)
        <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm space-y-3">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <h3 class="font-bold text-slate-900 text-sm">{{ $feedback->name }}</h3>
                    <p class="text-slate-500 text-xs">{{ $feedback->project?->title ?? 'Proyek dihapus' }}</p>
                </div>
                <span class="text-xs font-semibold px-2.5 py-0.5 rounded-lg border {{ $feedback->is_approved ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-amber-50 text-amber-700 border-amber-200' }}">
                    {{ $feedback->is_approved ? 'Tampil' : 'Menunggu' }}
                </span>
            </div>
            <div class="text-amber-500 text-sm">{{ str_repeat('★', (int) $feedback->rating) }}{{ str_repeat('☆', 5 - (int) $feedback->rating) }}</div>
            <p class="text-slate-600 text-sm leading-relaxed">{{ $feedback->message }}</p>
            <div class="flex items-center gap-2 pt-2 border-t border-slate-100">
                <form action="/admin/feedback/{{ $feedback->id }}/approve" method="POST" class="flex items-center gap-2 flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200 py-2 rounded-xl text-xs font-semibold transition">
                        {{ $feedback->is_approved ? 'Sembunyikan' : 'Setujui' }}
                    </button>
                </form>
                <form action="/admin/feedback/{{ $feedback->id }}" method="POST" onsubmit="return confirm('Hapus feedback ini?')" class="flex-1">
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
            Belum ada feedback.
        </div>
        @endforelse
    </div>
@endsection
