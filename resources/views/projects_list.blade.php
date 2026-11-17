@extends('app')

@section('title', 'Projects')

@section('content')

<!-- Projects Section -->
<section class="py-12 px-4 sm:px-6 relative">

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Title -->
        <div class="text-center mb-16 space-y-4">
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
                            Laravel Project
                        </span>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 group-hover:text-emerald-600 transition mb-3">
                            {{ $project->title }}
                        </h3>

                        <p class="text-slate-600 text-sm leading-relaxed mb-6">
                            {{ $project->description }}
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
                <div class="px-6 pb-6 pt-0">
                    <a href="{{ $project->link }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700 transition">
                        <span>Lihat Project Live</span>
                        <span>→</span>
                    </a>
                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection