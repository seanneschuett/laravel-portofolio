@extends('app')

@section('title', 'Home')

@section('content')

@php
    $displayName = $profile->full_name ?? 'Sara Nazilla';
    $displayMajor = $profile->major ?? 'Web Developer & UI/UX Designer';
    $displayClass = trim(($profile->class ?? '').' · '.($profile->school ?? ''), ' ·');
    $displayBio = $profile->bio ?? 'Saya menciptakan aplikasi web modern, responsif, dan menarik secara visual dengan struktur kode yang bersih serta pengalaman pengguna yang nyaman.';
    $heroPhoto = $profile->photo ?? asset('images/paspoto.jpeg');
    $cvLink = '/cv';
    if ($profile && $profile->cv_file) {
        $cvLink = \Illuminate\Support\Str::startsWith($profile->cv_file, ['http://', 'https://'])
            ? $profile->cv_file
            : asset($profile->cv_file);
    }
@endphp

<!-- Hero Section -->
<section class="min-h-[85vh] flex items-center justify-center px-4 sm:px-6 relative overflow-hidden py-12">

    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 lg:gap-16 items-center relative z-10">

        <!-- Left Content -->
        <div class="space-y-6 text-center md:text-left">

            <!-- Pill Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-50 border border-emerald-200/80 text-emerald-700 text-xs font-semibold uppercase tracking-wider shadow-sm">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                {{ $displayMajor }}
            </div>

            <!-- Headline -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-[1.15]">
                Halo, Saya <br class="hidden sm:inline" />
                <span class="gradient-emerald-text">
                    {{ $displayName }}
                </span>
            </h1>

            <!-- Subtitle -->
            <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl mx-auto md:mx-0">
                {{ $displayBio }}
            </p>

            @if($displayClass !== '')
                <p class="text-sm font-semibold text-emerald-700">{{ $displayClass }}</p>
            @endif

            <!-- Buttons CTA -->
            <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 pt-2">
                <a href="#projects"
                   class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-7 py-3.5 rounded-xl font-semibold transition duration-300 shadow-lg shadow-emerald-600/25 hover:shadow-xl hover:shadow-emerald-600/35 hover:-translate-y-0.5 flex items-center gap-2">
                    <span>Lihat Portfolio</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                </a>

                <a href="{{ $cvLink }}"
                   class="bg-white hover:bg-emerald-50/50 border border-slate-200 hover:border-emerald-300 text-slate-700 hover:text-emerald-700 px-7 py-3.5 rounded-xl font-semibold transition duration-300 shadow-sm hover:-translate-y-0.5">
                    Lihat CV
                </a>

                <a href="/contact"
                   class="bg-white hover:bg-emerald-50/50 border border-slate-200 hover:border-emerald-300 text-slate-700 hover:text-emerald-700 px-7 py-3.5 rounded-xl font-semibold transition duration-300 shadow-sm hover:-translate-y-0.5">
                    Hubungi Saya
                </a>
            </div>

            <!-- Social Media Icons -->
            <div class="flex items-center justify-center md:justify-start gap-3 pt-6 border-t border-slate-200/60">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider mr-2">Mari Terhubung</span>
                
                <a href="{{ $profile?->linkFor('github') ?? 'https://github.com/saraa9999' }}"
                   target="_blank"
                   title="GitHub"
                   aria-label="GitHub"
                   class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:text-white hover:bg-emerald-600 hover:border-emerald-600 transition duration-300 shadow-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.55 0-.27-.01-1.17-.02-2.12-3.2.7-3.87-1.36-3.87-1.36-.52-1.33-1.28-1.68-1.28-1.68-1.05-.72.08-.7.08-.7 1.16.08 1.77 1.19 1.77 1.19 1.03 1.76 2.7 1.25 3.36.96.1-.75.4-1.25.73-1.54-2.55-.29-5.23-1.28-5.23-5.68 0-1.25.45-2.28 1.19-3.08-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18.92-.26 1.9-.39 2.88-.39.98 0 1.96.13 2.88.39 2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.74.8 1.19 1.83 1.19 3.08 0 4.41-2.69 5.38-5.25 5.67.41.35.78 1.05.78 2.12 0 1.53-.01 2.76-.01 3.14 0 .3.21.66.8.55A11.51 11.51 0 0023.5 12C23.5 5.65 18.35.5 12 .5z"/></svg>
                </a>

                <a href="{{ $profile?->linkFor('linkedin') ?? 'https://www.linkedin.com/' }}"
                   target="_blank"
                   title="LinkedIn"
                   aria-label="LinkedIn"
                   class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:text-white hover:bg-emerald-600 hover:border-emerald-600 transition duration-300 shadow-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8h4V23h-4V8zm7.5 0h3.83v2.05h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V23h-4v-7.9c0-1.88-.03-4.3-2.62-4.3-2.62 0-3.02 2.05-3.02 4.17V23h-4V8z"/></svg>
                </a>

                <a href="mailto:{{ $profile->email ?? 'saranajila140@gmail.com' }}"
                   title="Gmail"
                   aria-label="Gmail"
                   class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:text-white hover:bg-emerald-600 hover:border-emerald-600 transition duration-300 shadow-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M2.25 6.75A2.25 2.25 0 014.5 4.5h15a2.25 2.25 0 012.25 2.25v10.5A2.25 2.25 0 0119.5 19.5h-15a2.25 2.25 0 01-2.25-2.25V6.75zm1.5 0v.243l8.25 5.5 8.25-5.5V6.75a.75.75 0 00-.75-.75h-15a.75.75 0 00-.75.75zm16.5 2.07l-7.72 5.147a1.5 1.5 0 01-1.66 0L3.75 8.82v8.43c0 .414.336.75.75.75h15a.75.75 0 00.75-.75V8.82z"/></svg>
                </a>

                <a href="{{ $profile?->linkFor('instagram') ?? 'https://www.instagram.com/sarnzllyoon._/' }}"
                   target="_blank"
                   title="Instagram"
                   aria-label="Instagram"
                   class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:text-white hover:bg-emerald-600 hover:border-emerald-600 transition duration-300 shadow-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
            </div>

        </div>

        <!-- Right Content: Photo Container -->
        <div class="flex justify-center items-center">
            <div class="relative">

                <!-- Soft glow that follows the square photo card. -->
                <div class="absolute inset-3 bg-gradient-to-tr from-emerald-400 to-teal-300 rounded-[2rem] blur-3xl opacity-30 animate-pulse"></div>

                <div class="absolute -top-3 -right-3 w-20 h-20 border-t-2 border-r-2 border-emerald-300 rounded-tr-[2rem]"></div>
                <div class="absolute -bottom-3 -left-3 w-20 h-20 border-b-2 border-l-2 border-teal-300 rounded-bl-[2rem]"></div>

                <!-- Profile Image -->
                <div class="relative z-10 p-2 bg-white shadow-2xl ring-4 ring-emerald-500/20 rounded-[1.75rem]">
                    <img src="{{ $heroPhoto }}"
                          alt="{{ $displayName }}"
                          class="w-[280px] h-[340px] sm:w-[340px] sm:h-[400px] lg:w-[380px] lg:h-[300px] object-cover object-top rounded-[1.35rem] transition duration-500 hover:scale-[1.02]">
                </div>

            </div>
        </div>

    </div>

</section>

<!-- About Section -->
<section id="about" class="py-20 px-4 sm:px-6 relative overflow-hidden bg-white/60 border-y border-slate-200/60">

    <div class="max-w-6xl mx-auto relative z-10">

        <!-- Section Title -->
        <div class="text-center mb-16">
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block mb-3">
                Tentang Saya
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                Mengenal Lebih Dekat <span class="gradient-emerald-text">{{ $profile->nickname ?? 'Sara' }}</span>
            </h2>
        </div>

        <!-- Grid Content -->
        <div class="grid md:grid-cols-12 gap-10 items-center">

            <!-- Left: Profile Photo -->
            <div class="md:col-span-5 flex justify-center">
                <div class="relative">
                    <div class="absolute inset-0 bg-emerald-200/50 rounded-3xl blur-2xl -rotate-3"></div>
                    <img src="{{ $profile->about_photo ?? asset('images/paspoto2.jpeg') }}"
                         alt="About {{ $displayName }}"
                         class="relative z-10 w-full max-w-[320px] h-[400px] object-cover rounded-3xl border-4 border-white shadow-xl">
                </div>
            </div>

            <!-- Right: Details -->
            <div class="md:col-span-7 space-y-6">
                <h3 class="text-2xl font-bold text-slate-900">
                    Pengembang Web & Desainer Antarmuka
                    <svg class="inline-block w-6 h-6 ml-1 -mt-1 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/>
                    </svg>
                </h3>

                <p class="text-slate-600 leading-relaxed">
                    {{ $profile->about ?? 'Saya berdedikasi menciptakan pengalaman web yang tidak hanya menarik secara visual tetapi juga efisien dan mudah digunakan. Setiap baris kode dirancang untuk memberikan hasil akhir yang terbaik.' }}
                </p>

                <p class="text-slate-600 leading-relaxed">
                    Fokus utama saya mencakup pengembangan frontend, integrasi framework modern seperti Laravel, serta desain UI/UX yang responsif di seluruh perangkat.
                </p>

                <!-- Skill Cards -->
                <div class="grid sm:grid-cols-2 gap-4 pt-4">

                    <div class="p-5 rounded-2xl bg-white border border-slate-200/80 shadow-sm hover:border-emerald-300 transition duration-300">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100/80 text-emerald-700 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.53 16.122a3 3 0 00-5.78 1.128 2.25 2.25 0 01-2.4 2.245 4.5 4.5 0 008.4-2.245c0-.399-.078-.78-.22-1.128zm0 0a15.998 15.998 0 003.388-1.62m-5.043-.025a15.994 15.994 0 011.622-3.395m3.42 3.42a15.995 15.995 0 004.764-4.648l3.876-5.814a1.151 1.151 0 00-1.597-1.597L14.146 6.32a15.996 15.996 0 00-4.649 4.763m3.42 3.42a6.776 6.776 0 00-3.42-3.42"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-1">Frontend & UI/UX</h4>
                        <p class="text-xs text-slate-500 leading-relaxed">HTML, CSS, JavaScript, Tailwind CSS, Responsive Design</p>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border border-slate-200/80 shadow-sm hover:border-emerald-300 transition duration-300">
                        <div class="w-10 h-10 rounded-xl bg-teal-100/80 text-teal-700 flex items-center justify-center mb-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 5.625c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-slate-900 mb-1">Backend & Database</h4>
                        <p class="text-xs text-slate-500 leading-relaxed">PHP, Laravel Framework, MySQL Database Management</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Skills Section -->
@if($skills->isNotEmpty())
<section id="skills" class="py-24 px-4 sm:px-6 relative">

    <div class="max-w-6xl mx-auto relative z-10">

        <div class="text-center mb-16">
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block mb-3">
                Keahlian
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                Hard Skill & <span class="gradient-emerald-text">Soft Skill</span>
            </h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            @foreach(['hard' => 'Hard Skill', 'soft' => 'Soft Skill'] as $category => $label)
                @php $items = $skills->where('category', $category); @endphp
                @if($items->isNotEmpty())
                <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-sm">
                    <h3 class="text-xl font-bold text-slate-900 mb-6">{{ $label }}</h3>
                    <div class="space-y-5">
                        @foreach($items as $skill)
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm font-semibold text-slate-700">{{ $skill->name }}</span>
                                <span class="text-xs font-bold text-emerald-700">{{ $skill->percentage }}%</span>
                            </div>
                            <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-emerald-600 to-teal-500 rounded-full" style="width: {{ max(0, min(100, $skill->percentage)) }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach
        </div>

    </div>

</section>
@endif

<!-- Projects Carousel Section -->
<section id="projects" class="py-24 px-4 sm:px-6 relative">

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Title -->
        <div class="text-center mb-16">
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block mb-3">
                Karya & Project
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4">
                Project Terbaru <span class="gradient-emerald-text">Sara</span>
            </h2>
            <p class="text-slate-600 max-w-xl mx-auto text-sm sm:text-base">
                Kumpulan project yang telah saya kerjakan dengan fokus pada desain elegan dan performa tinggi.
            </p>
        </div>

        <!-- Project Carousel Container -->
        <div class="relative">

            <!-- Navigation Buttons -->
            <button id="prevBtn" onclick="scrollProjects('left')"
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 z-20 bg-white border border-slate-200 hover:bg-emerald-600 hover:text-white text-slate-700 p-3.5 rounded-full shadow-lg transition duration-300 hidden focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>

            <button id="nextBtn" onclick="scrollProjects('right')"
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 z-20 bg-white border border-slate-200 hover:bg-emerald-600 hover:text-white text-slate-700 p-3.5 rounded-full shadow-lg transition duration-300 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <!-- Projects Grid Carousel -->
            <div id="projectsContainer" class="flex gap-6 overflow-x-auto scroll-smooth hide-scrollbar py-4 px-2">

                @foreach($projects as $project)

                <div class="project-card flex-shrink-0 w-80 md:w-96 group bg-white border border-slate-200/80 rounded-3xl overflow-hidden hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-600/10 transition-all duration-300 flex flex-col justify-between">

                    <div>
                        <!-- Image Container -->
                        <div class="overflow-hidden relative h-56 bg-slate-100">
                            <img src="{{ asset($project->image) }}"
                            alt="{{ $project->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-semibold text-emerald-700 shadow-sm border border-emerald-100">
                                Portfolio
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-600 transition mb-2">
                                {{ $project->title }}
                            </h3>

                            <p class="text-slate-600 text-sm leading-relaxed mb-4 line-clamp-3">
                                {{ $project->description }}
                            </p>

                            <!-- Tags -->
                            @php
                            $tagStyles = [
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
                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach($tags as $tag)
                                <span class="{{ $tagStyles[$tag] ?? 'bg-emerald-50 text-emerald-700 border-emerald-200' }} text-xs font-medium px-2.5 py-1 rounded-lg border">
                                    {{ $tag }}
                                </span>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Footer Link -->
                    <div class="px-6 pb-6 pt-0">
                        <a href="/projects/{{ $project->id }}"
                           class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700 group-hover:translate-x-1 transition duration-200">
                            <span>Lihat Detail Project</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>

</section>

<!-- Experience & Certificates Section -->
@if($experiences->isNotEmpty() || $certificates->isNotEmpty())
<section id="journey" class="py-24 px-4 sm:px-6 relative bg-white/60 border-y border-slate-200/60">

    <div class="max-w-7xl mx-auto relative z-10">

        <div class="text-center mb-16">
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block mb-3">
                Perjalanan
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4">
                Pengalaman & <span class="gradient-emerald-text">Pencapaian</span>
            </h2>
        </div>

        <div class="grid md:grid-cols-2 gap-8">

            @if($experiences->isNotEmpty())
            <div>
                <h3 class="text-xl font-bold text-slate-900 mb-5">Pengalaman</h3>
                <div class="space-y-4">
                    @foreach($experiences as $experience)
                    <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm">
                        <div class="flex items-center justify-between gap-3 mb-2">
                            <span class="text-[11px] font-semibold px-2.5 py-0.5 rounded-lg border bg-emerald-50 text-emerald-700 border-emerald-200">
                                {{ $experience->type === 'plk' ? 'PLK' : ucfirst($experience->type) }}
                            </span>
                            @if($experience->period)
                                <span class="text-xs text-slate-500">{{ $experience->period }}</span>
                            @endif
                        </div>
                        <h4 class="font-bold text-slate-900">{{ $experience->title }}</h4>
                        @if($experience->place)
                            <p class="text-emerald-700 text-xs font-semibold mt-1">{{ $experience->place }}</p>
                        @endif
                        @if($experience->description)
                            <p class="text-slate-600 text-sm leading-relaxed mt-2">{{ $experience->description }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if($certificates->isNotEmpty())
            <div>
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-xl font-bold text-slate-900">Sertifikat & Prestasi</h3>
                    <a href="/certificates" class="inline-flex items-center gap-1 text-sm font-semibold text-emerald-600 hover:text-emerald-700">
                        Lihat semua
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
                <div class="space-y-4">
                    @foreach($certificates->take(4) as $certificate)
                    <div class="bg-white border border-slate-200/80 rounded-2xl p-4 shadow-sm flex items-center gap-4">
                        <div class="w-16 h-16 rounded-xl bg-slate-100 overflow-hidden shrink-0">
                            @if($certificate->image)
                                <img src="{{ $certificate->image }}" alt="{{ $certificate->title }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] font-semibold text-emerald-700 uppercase tracking-wider">{{ ucfirst($certificate->type) }}</p>
                            <h4 class="font-bold text-slate-900 text-sm truncate">{{ $certificate->title }}</h4>
                            <p class="text-slate-500 text-xs">{{ $certificate->issuer }}{{ $certificate->year ? ' · '.$certificate->year : '' }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>

    </div>

</section>
@endif

<!-- Testimonials Section -->
<section id="testimoni" class="py-24 px-4 sm:px-6 relative bg-white/60 border-y border-slate-200/60 scroll-mt-24">

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Title -->
        <div class="text-center mb-16">
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block mb-3">
                Testimoni
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4">
                Kata Mereka Tentang <span class="gradient-emerald-text">Sara</span>
            </h2>
            <p class="text-slate-600 max-w-xl mx-auto text-sm sm:text-base">
                Testimoni dari guru, teman, pengguna, dan tempat PLK yang telah bekerja sama.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8 items-start">

            <!-- Testimonials List -->
            <div class="lg:col-span-2">
                @if($testimonials->isEmpty())
                    <div class="bg-white border border-slate-200/80 rounded-3xl p-10 text-center text-slate-500 text-sm">
                        Belum ada testimoni yang dipublikasikan.
                    </div>
                @else
                    <div class="grid sm:grid-cols-2 gap-5">
                        @foreach($testimonials as $testimonial)
                        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-sm hover:border-emerald-300 transition duration-300 flex flex-col">
                            <div class="flex items-center gap-3 mb-3">
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
                            <div class="flex items-center gap-0.5 mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= (int) $testimonial->rating ? 'text-amber-500' : 'text-amber-200' }}" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                @endfor
                            </div>
                            <p class="text-slate-600 text-sm leading-relaxed flex-1">{{ $testimonial->message }}</p>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Submission Form -->
            <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-sm lg:sticky lg:top-28">
                <h3 class="text-xl font-bold text-slate-900 mb-1">Tulis Testimoni</h3>
                <p class="text-slate-500 text-sm mb-5">Testimoni akan tampil setelah disetujui admin.</p>

                @if(session('testimonial_success'))
                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl text-sm font-medium mb-4">
                        {{ session('testimonial_success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-xl text-sm font-medium mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="/testimonials" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Nama</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Peran (opsional)</label>
                        <input type="text" name="role" value="{{ old('role') }}" placeholder="Guru Pembimbing"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Asal</label>
                            <select name="origin" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                                <option value="guru" {{ old('origin') === 'guru' ? 'selected' : '' }}>Guru</option>
                                <option value="teman" {{ old('origin') === 'teman' ? 'selected' : '' }}>Teman</option>
                                <option value="pengguna" {{ old('origin', 'pengguna') === 'pengguna' ? 'selected' : '' }}>Pengguna</option>
                                <option value="plk" {{ old('origin') === 'plk' ? 'selected' : '' }}>Tempat PLK</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Rating</label>
                            <select name="rating" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-3 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                                @for($star = 5; $star >= 1; $star--)
                                    <option value="{{ $star }}" {{ (int) old('rating', 5) === $star ? 'selected' : '' }}>{{ $star }} / 5</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Pesan</label>
                        <textarea name="message" rows="4" required placeholder="Tulis pengalaman Anda..."
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm resize-none">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-5 py-3 rounded-xl font-bold text-sm transition shadow-md shadow-emerald-600/20">
                        Kirim Testimoni
                    </button>
                </form>
            </div>

        </div>

    </div>

</section>

<!-- Latest Blog Section -->
@if($posts->isNotEmpty())
<section id="blog" class="py-24 px-4 sm:px-6 relative">

    <div class="max-w-7xl mx-auto relative z-10">

        <div class="text-center mb-16">
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block mb-3">
                Blog
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-4">
                Catatan <span class="gradient-emerald-text">Coding</span>
            </h2>
            <p class="text-slate-600 max-w-xl mx-auto text-sm sm:text-base">
                Tulisan terbaru seputar pengembangan web, Laravel, dan desain antarmuka.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach($posts as $post)
            <a href="/blog/{{ $post->slug }}" class="group bg-white border border-slate-200/80 rounded-3xl overflow-hidden hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-600/10 transition duration-300 flex flex-col">
                <div class="h-44 bg-slate-100 overflow-hidden">
                    @if($post->cover)
                        <img src="{{ $post->cover }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @endif
                </div>
                <div class="p-6 flex-1 flex flex-col">
                    <p class="text-xs text-slate-500 mb-2">{{ ($post->published_at ?? $post->created_at)->format('d M Y') }}</p>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-emerald-600 transition mb-2 line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-slate-600 text-sm leading-relaxed flex-1 line-clamp-3">
                        {{ \Illuminate\Support\Str::limit($post->excerpt ?? strip_tags($post->content), 120) }}
                    </p>
                    <span class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 mt-4">
                        Baca artikel
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </span>
                </div>
            </a>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="/blog" class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-emerald-300 hover:text-emerald-700 text-slate-700 px-6 py-3 rounded-xl font-semibold transition shadow-sm">
                Lihat Semua Artikel
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>

    </div>

</section>
@endif

<!-- Call to Action Banner -->
<section class="py-16 px-4 sm:px-6">
    <div class="max-w-5xl mx-auto rounded-3xl bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-700 p-8 sm:p-12 text-white shadow-xl shadow-emerald-600/20 relative overflow-hidden text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-8">
        
        <!-- Ambient Shapes -->
        <div class="absolute -top-10 -right-10 w-48 h-48 bg-white/10 rounded-full blur-xl"></div>
        <div class="absolute -bottom-10 -left-10 w-48 h-48 bg-emerald-400/20 rounded-full blur-xl"></div>

        <div class="relative z-10 space-y-2 max-w-xl">
            <h3 class="text-2xl sm:text-3xl font-extrabold tracking-tight">Punya Proyek yang Ingin Dikerjakan?</h3>
            <p class="text-emerald-100 text-sm sm:text-base">Mari berkolaborasi untuk mewujudkan ide website impian Anda dengan tampilan terbaik.</p>
        </div>

        <a href="/contact" class="relative z-10 bg-white text-emerald-800 hover:bg-emerald-50 px-8 py-3.5 rounded-xl font-bold transition shadow-md hover:shadow-lg hover:scale-105 shrink-0">
            Hubungi Sekarang
        </a>
    </div>
</section>

<style>
    .hide-scrollbar::-webkit-scrollbar { display: none; }
    .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

<script>
    const container = document.getElementById('projectsContainer');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const cards = document.querySelectorAll('.project-card');

    function updateButtons() {
        if (!container) return;
        const scrollLeft = container.scrollLeft;
        const maxScroll = container.scrollWidth - container.clientWidth;
        
        if (prevBtn) prevBtn.classList.toggle('hidden', scrollLeft <= 10);
        if (nextBtn) nextBtn.classList.toggle('hidden', scrollLeft >= maxScroll - 10);
    }

    function scrollProjects(direction) {
        if (!container || cards.length === 0) return;
        const cardWidth = cards[0].clientWidth + 24;
        const scrollAmount = direction === 'left' ? -cardWidth : cardWidth;
        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    }

    container?.addEventListener('scroll', updateButtons);
    window.addEventListener('resize', updateButtons);
    document.addEventListener('DOMContentLoaded', updateButtons);
</script>

@endsection
