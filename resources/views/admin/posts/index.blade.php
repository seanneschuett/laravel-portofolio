@extends('admin.layout')

@section('title', 'Admin - Blog')
@section('mobile_title', 'Blog')
@section('container_class', 'max-w-6xl')

@section('content')
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Blog & Artikel</h1>
            <p class="text-slate-500 text-sm mt-1">Kelola artikel, catatan coding, dan tulisan pengembang</p>
        </div>
        <a href="/admin/posts/create"
           class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-5 py-2.5 rounded-xl font-bold text-sm transition flex items-center gap-2 shadow-md shadow-emerald-600/20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tulis Artikel</span>
        </a>
    </div>

    <div class="space-y-3">
        @forelse($posts as $post)
        <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm flex flex-col sm:flex-row sm:items-center gap-4">
            <div class="w-full sm:w-28 h-20 rounded-xl bg-slate-100 overflow-hidden shrink-0">
                @if($post->cover)
                    <img src="{{ $post->cover }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                @endif
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-1">
                    <h2 class="font-bold text-slate-900 truncate">{{ $post->title }}</h2>
                    <span class="text-[11px] font-semibold px-2 py-0.5 rounded-lg border {{ $post->is_published ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-amber-50 text-amber-700 border-amber-200' }}">
                        {{ $post->is_published ? 'Publik' : 'Draft' }}
                    </span>
                </div>
                <p class="text-slate-500 text-xs">/blog/{{ $post->slug }} · {{ $post->created_at->format('d M Y') }}</p>
            </div>
            <div class="flex items-center gap-2 shrink-0">
                <a href="/admin/posts/{{ $post->id }}/edit"
                   class="bg-amber-50 hover:bg-amber-100 text-amber-700 border border-amber-200/80 px-4 py-2 rounded-xl text-xs font-semibold transition">
                    Edit
                </a>
                <form action="/admin/posts/{{ $post->id }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200/80 px-4 py-2 rounded-xl text-xs font-semibold transition">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="bg-white border border-slate-200/80 rounded-2xl p-10 text-center text-slate-500 text-sm">
            Belum ada artikel. Klik "Tulis Artikel".
        </div>
        @endforelse
    </div>
@endsection
