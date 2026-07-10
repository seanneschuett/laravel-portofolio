@extends('app')

@section('title', 'home')

@section('content')

<!-- Hero Section -->
<section class="min-h-screen flex items-center justify-center px-6 relative overflow-hidden">

    <!-- Blur Background -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-cyan-500/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-72 h-72 bg-purple-500/20 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center relative z-10">

        <!-- Left Content -->
        <div>

            <p class="text-cyan-400 font-medium mb-4 tracking-widest uppercase">
                Web Developer & UI Designer
            </p>

            <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6">
                Hi, I'm
                <span class="bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent">
                    Sara Nazilla
                </span>
            </h1>

            <p class="text-gray-400 text-lg leading-relaxed mb-8 max-w-xl">
                I create modern, responsive, and visually appealing websites
                with clean code and smooth user experience.
            </p>

            <!-- Button -->
            <div class="flex flex-wrap gap-4">

                <a href="#projects"
                   class="bg-cyan-500 hover:bg-cyan-400 text-white px-7 py-3 rounded-2xl font-medium transition duration-300 shadow-lg shadow-cyan-500/20">
                    View Projects
                </a>

                <a href="/contact"
                   class="border border-white/10 hover:border-cyan-400 hover:text-cyan-400 px-7 py-3 rounded-2xl font-medium transition duration-300">
                    Contact Me
                </a>

            </div>

            <!-- Social -->
            <div class="flex items-center gap-5 mt-10 text-gray-400">

                <a href="https://www.instagram.com/sarnzllyoon._/"
                target="_blank"
                 class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-cyan-500 hover:border-cyan-500 transition duration-300">

                <img src="https://img.icons8.com/?size=100&id=Xy10Jcu1L2Su&format=png&color=000000"
                alt="Instagram"
                class="w-6 h-6">

                </a>

                <a href="https://wa.me/6289681392003"
                target="_blank"
                 class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-cyan-500 hover:border-cyan-500 transition duration-300">

                <img src="https://img.icons8.com/?size=100&id=16713&format=png&color=000000"
                alt="WhatsApp"
                class="w-6 h-6">

                </a>
               
                <a href="https://web.telegram.org/"
                target="_blank"
                 class="w-12 h-12 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center hover:bg-cyan-500 hover:border-cyan-500 transition duration-300">

                <img src="https://img.icons8.com/?size=100&id=63306&format=png&color=000000"
                alt="Telegram"
                class="w-6 h-6">

                </a>

            </div>

        </div>

        <!-- Right Content -->
        <div class="flex justify-center">

            <div class="relative">

            <div class="relative flex justify-center">

<!-- Glow Background -->
<div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-purple-500 rounded-full blur-3xl opacity-30"></div>

<!-- Profile Image -->
<img src="{{ asset('images/paspoto.jpeg') }}"
     alt="Profile"
     class="relative w-[320px] h-[320px] md:w-[350px] md:h-[350px] object-cover rounded-full border-4 border-white/10 shadow-2xl hover:scale-105 transition duration-500">

</div>
            </div>

        </div>

    </div>

</section>

<section id="about" class="py-28 px-6 relative overflow-hidden">

    <!-- Blur Background -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-cyan-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl"></div>

    <div class="max-w-6xl mx-auto relative z-10">

        <!-- Title -->
        <div class="text-center mb-16">

            <p class="text-cyan-400 uppercase tracking-[4px] text-sm font-medium mb-4">
                About Me
            </p>

            <h2 class="text-4xl md:text-5xl font-bold">
                Know More
                <span class="bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent">
                    About Me
                </span>
            </h2>

        </div>

        <!-- Content -->
        <div class="flex flex-col md:flex-row items-center gap-16">

            <!-- Image -->
            <div class="relative flex justify-center">

                <!-- Glow -->
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-purple-500 rounded-[30px] blur-3xl opacity-20"></div>

                <img src="{{ asset('images/paspoto2.jpeg') }}"
                     alt="About Me"
                     class="relative w-[280px] h-[300px] md:w-[340px] md:h-[430px] object-cover rounded-[30px] border border-white/10 shadow-2xl">

            </div>

            <!-- Text -->
            <div class="flex-1">

                <h3 class="text-3xl font-bold mb-6">
                    Hi, I'm Sara 👋
                </h3>

                <p class="text-gray-400 leading-relaxed mb-6">
                    I am a passionate web developer who loves creating
                    modern, responsive, and visually appealing websites.
                    I enjoy turning ideas into interactive digital experiences.
                </p>

                <p class="text-gray-400 leading-relaxed mb-10">
                    My main focus is frontend development, HTML & CSS,
                    UI/UX design, and building clean user interfaces
                    with smooth experiences.
                </p>

                <!-- Skills -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-5 rounded-2xl">

                        <h4 class="text-cyan-400 font-semibold mb-2">
                            Frontend
                        </h4>

                        <p class="text-gray-400 text-sm">
                            HTML, CSS, JavaScript, Tailwind CSS
                        </p>

                    </div>

                    <div class="bg-white/5 backdrop-blur-xl border border-white/10 p-5 rounded-2xl">

                        <h4 class="text-purple-400 font-semibold mb-2">
                            Backend
                        </h4>

                        <p class="text-gray-400 text-sm">
                            PHP, Laravel, MySQL
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<section id="projects" class="py-28 px-6 relative overflow-hidden">

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
                Sara's
                <span class="bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent">
                    Projects
                </span>
            </h2>

            <p class="text-gray-400 max-w-2xl mx-auto">
                Some of the projects I have worked on with modern design,
                responsive layouts, and clean development structure.
            </p>

        <!-- Project Carousel -->
        <div class="relative">
            
            <!-- Navigation Arrows -->
            <button id="prevBtn" onclick="scrollProjects('left')" 
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-10 bg-white/10 hover:bg-cyan-500 text-white p-3 rounded-full transition duration-300 hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <button id="nextBtn" onclick="scrollProjects('right')" 
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 z-10 bg-white/10 hover:bg-cyan-500 text-white p-3 rounded-full transition duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <!-- Projects Container -->
            <div id="projectsContainer" class="flex gap-6 overflow-x-auto scroll-smooth hide-scrollbar px-4">
                
                @foreach($projects as $project)

                <div class="project-card flex-shrink-0 w-80 md:w-96 group bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl overflow-hidden hover:border-cyan-400/40 transition duration-500">

                    <!-- Image -->
                    <div class="overflow-hidden">
                        <img src="{{ $project->image }}"
                             alt="{{ $project->title }}"
                             class="w-full h-60 object-cover group-hover:scale-110 transition duration-700">
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <span class="text-cyan-400 text-sm font-medium">Project</span>

                        <h3 class="text-2xl font-bold mt-3 mb-4">{{ $project->title }}</h3>

                        <p class="text-gray-400 leading-relaxed mb-4">{{ $project->description }}</p>

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
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($tags as $tag)
                            <span class="{{ $tagColors[$tag] ?? 'bg-gray-500/20 text-gray-400' }} text-xs px-2 py-1 rounded-full">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                        @endif

                        <a href="{{ $project->link }}" target="_blank"
                           class="inline-flex items-center gap-2 text-cyan-400 hover:text-cyan-300 transition font-medium">
                            View Project <span>→</span>
                        </a>
                    </div>

                </div>

                @endforeach

        <style>
            .hide-scrollbar::-webkit-scrollbar { display: none; }
            .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        </style>

        <script>
            const container = document.getElementById('projectsContainer');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const cards = document.querySelectorAll('.project-card');
            const cardCount = cards.length;

            function updateButtons() {
                const scrollLeft = container.scrollLeft;
                const maxScroll = container.scrollWidth - container.clientWidth;
                
                prevBtn.classList.toggle('hidden', scrollLeft <= 0);
                nextBtn.classList.toggle('hidden', scrollLeft >= maxScroll - 10);
            }

            function scrollProjects(direction) {
                const cardWidth = cards[0].clientWidth + 24;
                const scrollAmount = direction === 'left' ? -cardWidth : cardWidth;
                container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }

            container.addEventListener('scroll', updateButtons);
            updateButtons();
        </script>

        </div>

    </div>

</section>

@endsection