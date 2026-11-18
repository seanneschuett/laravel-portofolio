@extends('app')

@section('title', $post->title)

@section('content')

<section class="py-12 px-4 sm:px-6 relative">
    <div class="max-w-3xl mx-auto relative z-10">

        <a href="/blog" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700 mb-8">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
            Kembali ke Blog
        </a>

        <article class="bg-white border border-slate-200/80 rounded-3xl overflow-hidden shadow-sm">
            @if($post->cover)
                <div class="h-64 sm:h-80 bg-slate-100 overflow-hidden">
                    <img src="{{ $post->cover }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                </div>
            @endif

            <div class="p-6 sm:p-10">
                <p class="text-xs font-semibold uppercase tracking-wider text-emerald-700 mb-3">
                    {{ ($post->published_at ?? $post->created_at)->format('d M Y') }}
                </p>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mb-6">{{ $post->title }}</h1>

                @if($post->excerpt)
                    <p class="text-lg text-slate-600 leading-relaxed mb-6">{{ $post->excerpt }}</p>
                @endif

                <div class="text-slate-700 leading-relaxed whitespace-pre-line">{{ $post->content }}</div>
            </div>
        </article>

        @if($latestPosts->isNotEmpty())
        <div class="mt-12">
            <h2 class="text-xl font-bold text-slate-900 mb-5">Artikel Lainnya</h2>
            <div class="space-y-3">
                @foreach($latestPosts as $latest)
                <a href="/blog/{{ $latest->slug }}" class="flex items-center justify-between gap-4 bg-white border border-slate-200/80 hover:border-emerald-300 rounded-2xl p-5 transition shadow-sm">
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">{{ $latest->title }}</h3>
                        <p class="text-slate-500 text-xs mt-1">{{ ($latest->published_at ?? $latest->created_at)->format('d M Y') }}</p>
                    </div>
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>

@endsection
