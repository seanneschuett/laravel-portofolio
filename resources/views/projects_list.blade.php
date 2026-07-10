@extends('app')

@section('title', 'Projects')

@section('content')

<!-- Projects Section -->
<section class="py-28 px-6 relative overflow-hidden">

    <!-- Background Blur -->
    <div class="absolute top-0 left-0 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Title -->
        <div class="text-center mb-16">

            <p class="text-cyan-400 uppercase tracking-[4px] text-sm font-medium mb-4">
                My Work
            </p>

            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Featured
                <span class="bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent">
                    Projects
                </span>
            </h2>

            <p class="text-gray-400 max-w-2xl mx-auto">
                Some of the projects I have worked on with modern design,
                responsive layouts, and clean development structure.
            </p>

        </div>

        <!-- Project Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($projects as $project)

            <div class="group bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl overflow-hidden hover:border-cyan-400/40 transition duration-500">

                <!-- Image -->
                <div class="overflow-hidden">

                    <img src="{{ $project->image }}"
                         alt="{{ $project->title }}"
                         class="w-full h-60 object-cover group-hover:scale-110 transition duration-700">

                </div>

                <!-- Content -->
                <div class="p-6">

                    <!-- Category -->
                    <span class="text-cyan-400 text-sm font-medium">
                        Laravel Project
                    </span>

                    <!-- Title -->
                    <h3 class="text-2xl font-bold mt-3 mb-4">
                        {{ $project->title }}
                    </h3>

                    <!-- Desc -->
                    <p class="text-gray-400 leading-relaxed mb-6">
                        {{ $project->description }}
                    </p>

                    <!-- Tech -->
                    <div class="flex flex-wrap gap-3 mb-6">

                        @php
                        $tagColors = [
                            'HTML' => 'bg-orange-500/20 text-orange-400',
                            'CSS' => 'bg-blue-500/20 text-blue-400',
                            'JavaScript' => 'bg-yellow-500/20 text-yellow-400',
                            'PHP' => 'bg-purple-500/20 text-purple-400',
                            'MySQL' => 'bg-cyan-500/20 text-cyan-400',
                            'Laravel' => 'bg-red-500/20 text-red-400',
                            'UI/UX Desaign' => 'bg-emerald-500/20 text-emerald-400'
                        ];
                        $tags = is_array($project->tags) ? $project->tags : (is_string($project->tags) ? json_decode($project->tags, true) : []);
                        @endphp

                        @if(!empty($tags))
                        @foreach($tags as $tag)
                        <span class="{{ $tagColors[$tag] ?? 'bg-gray-500/20 text-gray-400' }} text-sm px-3 py-1 rounded-full">
                            {{ $tag }}
                        </span>
                        @endforeach
                        @endif

                    </div>

                    <!-- Button -->
                    <a href="{{ $project->link }}"
                       target="_blank"
                       class="inline-flex items-center gap-2 text-cyan-400 hover:text-cyan-300 transition font-medium">

                        View Project
                        <span>→</span>

                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection