@extends('app')

@section('title', $project->title)

@section('content')

<section class="py-12 px-4 sm:px-6 relative">
    <div class="max-w-6xl mx-auto relative z-10">

        <a href="/projects" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700 mb-8">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
            Kembali ke Daftar Project
        </a>

        <!-- Hero -->
        <div class="grid lg:grid-cols-2 gap-10 items-start">
            <div class="bg-white border border-slate-200/80 rounded-3xl p-3 shadow-sm">
                <div class="rounded-2xl overflow-hidden bg-slate-100 aspect-[4/3]">
                    <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                </div>
            </div>

            <div>
                <div class="flex flex-wrap items-center gap-2 mb-4">
                    <span class="px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold">
                        {{ $project->category ?: 'Project' }}
                    </span>
                    @if($project->is_featured)
                        <span class="px-3 py-1 rounded-full bg-amber-50 border border-amber-200 text-amber-700 text-xs font-semibold">Featured</span>
                    @endif
                </div>

                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight mb-4">{{ $project->title }}</h1>

                <p class="text-slate-600 leading-relaxed mb-6">{{ $project->description }}</p>

                @php
                    $tagColors = [
                        'HTML' => 'bg-orange-50 text-orange-700 border-orange-200',
                        'CSS' => 'bg-sky-50 text-sky-700 border-sky-200',
                        'JavaScript' => 'bg-amber-50 text-amber-700 border-amber-200',
                        'PHP' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                        'MySQL' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
                        'Laravel' => 'bg-rose-50 text-rose-700 border-rose-200',
                        'UI/UX Desaign' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                    ];
                    $tags = is_array($project->tags) ? $project->tags : (is_string($project->tags) ? json_decode($project->tags, true) : []);
                @endphp

                @if(!empty($tags))
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach($tags as $tag)
                    <span class="{{ $tagColors[$tag] ?? 'bg-emerald-50 text-emerald-700 border-emerald-200' }} text-xs font-medium px-3 py-1 rounded-lg border">{{ $tag }}</span>
                    @endforeach
                </div>
                @endif

                <div class="flex flex-wrap gap-3">
                    @if($project->link)
                        <a href="{{ $project->link }}" target="_blank" class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition shadow-md shadow-emerald-600/20">
                            Lihat Project
                        </a>
                    @endif
                    @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="bg-white border border-slate-200 hover:border-emerald-300 text-slate-700 hover:text-emerald-700 px-5 py-2.5 rounded-xl font-semibold text-sm transition shadow-sm">
                            GitHub
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Details -->
        @if($project->problem || $project->goal || $project->role)
        <div class="grid md:grid-cols-3 gap-5 mt-10">
            @if($project->problem)
            <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm">
                <h2 class="font-bold text-slate-900 mb-2">Masalah</h2>
                <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">{{ $project->problem }}</p>
            </div>
            @endif
            @if($project->goal)
            <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm">
                <h2 class="font-bold text-slate-900 mb-2">Tujuan</h2>
                <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">{{ $project->goal }}</p>
            </div>
            @endif
            @if($project->role)
            <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm">
                <h2 class="font-bold text-slate-900 mb-2">Peran</h2>
                <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">{{ $project->role }}</p>
            </div>
            @endif
        </div>
        @endif

        <!-- Features -->
        @if(!empty($project->features))
        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-sm mt-6">
            <h2 class="text-xl font-bold text-slate-900 mb-4">Fitur Utama</h2>
            <ul class="grid sm:grid-cols-2 gap-3">
                @foreach($project->features as $feature)
                <li class="flex items-start gap-2 text-sm text-slate-600">
                    <svg class="w-4 h-4 text-emerald-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.5 12.75l6 6 9-13.5"/></svg>
                    <span>{{ $feature }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Documentation -->
        @if($project->documentation)
        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-sm mt-6">
            <h2 class="text-xl font-bold text-slate-900 mb-3">Dokumentasi Proses</h2>
            @if(\Illuminate\Support\Str::startsWith($project->documentation, ['http://', 'https://']))
                <a href="{{ $project->documentation }}" target="_blank" class="text-emerald-600 hover:text-emerald-700 font-semibold text-sm break-all">
                    {{ $project->documentation }}
                </a>
            @else
                <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">{{ $project->documentation }}</p>
            @endif
        </div>
        @endif

        <!-- Feedback -->
        <div id="feedback" class="mt-12 scroll-mt-24">
            <div class="text-center mb-8">
                <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block mb-3">
                    Feedback
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Feedback Pengguna</h2>
            </div>

            <div class="grid lg:grid-cols-3 gap-6 items-start">
                <div class="lg:col-span-2 space-y-4">
                    @forelse($feedbacks as $feedback)
                    <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm">
                        <div class="flex items-center justify-between gap-3 mb-2">
                            <h3 class="font-bold text-slate-900 text-sm">{{ $feedback->name }}</h3>
                            <span class="flex items-center gap-0.5">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= (int) $feedback->rating ? 'text-amber-500' : 'text-amber-200' }}" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </span>
                        </div>
                        <p class="text-slate-600 text-sm leading-relaxed">{{ $feedback->message }}</p>
                    </div>
                    @empty
                    <div class="bg-white border border-slate-200/80 rounded-2xl p-8 text-center text-slate-500 text-sm">
                        Belum ada feedback untuk project ini.
                    </div>
                    @endforelse
                </div>

                <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-sm lg:sticky lg:top-28">
                    <h3 class="text-lg font-bold text-slate-900 mb-1">Beri Feedback</h3>
                    <p class="text-slate-500 text-sm mb-4">Feedback tampil setelah disetujui admin.</p>

                    @if(session('feedback_success'))
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl text-sm font-medium mb-4">
                            {{ session('feedback_success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-xl text-sm font-medium mb-4">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="/projects/{{ $project->id }}/feedback" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Nama</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Rating</label>
                            <select name="rating" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                                @for($star = 5; $star >= 1; $star--)
                                    <option value="{{ $star }}" {{ (int) old('rating', 5) === $star ? 'selected' : '' }}>{{ $star }} / 5</option>
                                @endfor
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Pesan</label>
                            <textarea name="message" rows="4" required placeholder="Tulis feedback Anda..."
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm resize-none">{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-5 py-3 rounded-xl font-bold text-sm transition shadow-md shadow-emerald-600/20">
                            Kirim Feedback
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
