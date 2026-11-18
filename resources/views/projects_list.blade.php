@extends('app')

@section('title', 'Projects')

@section('content')

<!-- Projects Section -->
<section class="py-12 px-4 sm:px-6 relative">

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Title -->
        <div class="text-center mb-12 space-y-4">
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block">
                Semua Karya
            </span>

            <h2 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                Daftar <span class="gradient-emerald-text">Project</span>
            </h2>

            <p class="text-slate-600 max-w-2xl mx-auto text-base">
                Kumpulan project yang telah saya kembangkan dengan struktur rapi, responsif, dan tampilan modern.
            </p>
        </div>

        <!-- Search & Filter -->
        <form action="/projects" method="GET" class="bg-white border border-slate-200/80 rounded-3xl p-5 sm:p-6 shadow-sm mb-10">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <div class="md:col-span-6">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Cari Project</label>
                    <input type="text" name="q" value="{{ $search }}" placeholder="Cari judul, deskripsi, atau teknologi..."
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                </div>

                <div class="md:col-span-3">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Teknologi</label>
                    <select name="tech" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                        <option value="">Semua Teknologi</option>
                        @foreach($technologies as $technology)
                            <option value="{{ $technology }}" {{ $tech === $technology ? 'selected' : '' }}>{{ $technology }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="md:col-span-3">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Kategori</label>
                    <select name="category" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $item)
                            <option value="{{ $item }}" {{ $category === $item ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-3 mt-4">
                <button type="submit" class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-6 py-2.5 rounded-xl font-bold text-sm transition shadow-md shadow-emerald-600/20">
                    Terapkan Filter
                </button>
                @if($search !== '' || $tech !== '' || $category !== '')
                    <a href="/projects" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-5 py-2.5 rounded-xl font-semibold text-sm transition">
                        Reset
                    </a>
                @endif
                <span class="text-xs text-slate-500 ml-auto">{{ $projects->count() }} project ditemukan</span>
            </div>
        </form>

        @if($projects->isEmpty())
            <div class="bg-white border border-slate-200/80 rounded-3xl p-12 text-center text-slate-500 text-sm">
                Tidak ada project yang sesuai dengan pencarian atau filter Anda.
            </div>
        @else
        <!-- Project Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($projects as $project)

            <div class="group bg-white border border-slate-200/80 rounded-3xl overflow-hidden hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-600/10 transition duration-300 flex flex-col justify-between">

                <div>
                    <!-- Image -->
                    <div class="overflow-hidden relative h-60 bg-slate-100">
                        <img src="{{ $project->image }}"
                             alt="{{ $project->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-semibold text-emerald-700 border border-emerald-100 shadow-sm">
                            {{ $project->category ?: 'Laravel Project' }}
                        </span>
                        @if($project->is_featured)
                            <span class="absolute top-4 left-4 bg-amber-400 text-amber-900 px-3 py-1 rounded-full text-xs font-bold shadow-sm">
                                Featured
                            </span>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 group-hover:text-emerald-600 transition mb-3">
                            {{ $project->title }}
                        </h3>

                        <p class="text-slate-600 text-sm leading-relaxed mb-6">
                            {{ \Illuminate\Support\Str::limit($project->description, 160) }}
                        </p>

                        <!-- Tech Tags -->
                        @php
                        $tagColors = [
                            'HTML' => 'bg-orange-50 text-orange-700 border-orange-200',
                            'CSS' => 'bg-sky-50 text-sky-700 border-sky-200',
                            'JavaScript' => 'bg-amber-50 text-amber-700 border-amber-200',
                            'PHP' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                            'MySQL' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
                            'Laravel' => 'bg-rose-50 text-rose-700 border-rose-200',
                            'UI/UX Desaign' => 'bg-emerald-50 text-emerald-700 border-emerald-200'
                        ];
                        $tags = is_array($project->tags) ? $project->tags : (is_string($project->tags) ? json_decode($project->tags, true) : []);
                        @endphp

                        @if(!empty($tags))
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach($tags as $tag)
                            <span class="{{ $tagColors[$tag] ?? 'bg-emerald-50 text-emerald-700 border-emerald-200' }} text-xs font-medium px-3 py-1 rounded-lg border">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Button Link -->
                <div class="px-6 pb-6 pt-0 flex items-center justify-between gap-3">
                    <a href="/projects/{{ $project->id }}"
                       class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700 transition">
                        <span>Lihat Detail</span>
                        <span>→</span>
                    </a>
                    @if($project->link)
                        <a href="{{ $project->link }}" target="_blank" class="text-xs font-semibold text-slate-500 hover:text-emerald-600 transition">
                            Live Demo
                        </a>
                    @endif
                </div>

            </div>

            @endforeach

        </div>
        @endif

    </div>

</section>

@endsection
