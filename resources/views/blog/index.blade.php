@extends('app')

@section('title', 'Blog')

@section('content')

<section class="py-12 px-4 sm:px-6 relative">
    <div class="max-w-6xl mx-auto relative z-10">

        <div class="text-center mb-16 space-y-4">
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block">
                Blog
            </span>
            <h2 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                Artikel & <span class="gradient-emerald-text">Catatan Coding</span>
            </h2>
            <p class="text-slate-600 max-w-2xl mx-auto text-base">
                Tulisan seputar pengembangan web, Laravel, dan desain antarmuka.
            </p>
        </div>

        @if($posts->isEmpty())
            <div class="bg-white border border-slate-200/80 rounded-3xl p-12 text-center text-slate-500 text-sm">
                Belum ada artikel yang dipublikasikan.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                <a href="/blog/{{ $post->slug }}" class="group bg-white border border-slate-200/80 rounded-3xl overflow-hidden hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-600/10 transition duration-300 flex flex-col">
                    <div class="h-48 bg-slate-100 overflow-hidden">
                        @if($post->cover)
                            <img src="{{ $post->cover }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @endif
                    </div>
                    <div class="p-6 flex-1 flex flex-col">
                        <p class="text-xs text-slate-500 mb-2">{{ ($post->published_at ?? $post->created_at)->format('d M Y') }}</p>
                        <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition mb-2 line-clamp-2">{{ $post->title }}</h3>
                        <p class="text-slate-600 text-sm leading-relaxed flex-1 line-clamp-3">
                            {{ \Illuminate\Support\Str::limit($post->excerpt ?? strip_tags($post->content), 140) }}
                        </p>
                        <span class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 mt-4">
                            Baca artikel
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </span>
                    </div>
                </a>
                @endforeach
            </div>
        @endif

    </div>
</section>

@endsection
