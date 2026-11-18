@extends('app')

@section('title', 'Home')

@section('content')

<!-- Hero Section -->
<section class="min-h-[85vh] flex items-center justify-center px-4 sm:px-6 relative overflow-hidden py-12">

    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 lg:gap-16 items-center relative z-10">

        <!-- Left Content -->
        <div class="space-y-6 text-center md:text-left">

            <!-- Pill Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-50 border border-emerald-200/80 text-emerald-700 text-xs font-semibold uppercase tracking-wider shadow-sm">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Web Developer & UI/UX Designer
            </div>

            <!-- Headline -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 leading-[1.15]">
                Halo, Saya <br class="hidden sm:inline" />
                <span class="gradient-emerald-text">
                    Sara Nazilla
                </span>
            </h1>

            <!-- Subtitle -->
            <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl mx-auto md:mx-0">
                Saya menciptakan aplikasi web modern, responsif, dan menarik secara visual dengan struktur kode yang bersih serta pengalaman pengguna yang nyaman.
            </p>

            <!-- Buttons CTA -->
            <div class="flex flex-wrap items-center justify-center md:justify-start gap-4 pt-2">
                <a href="#projects"
                   class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-7 py-3.5 rounded-xl font-semibold transition duration-300 shadow-lg shadow-emerald-600/25 hover:shadow-xl hover:shadow-emerald-600/35 hover:-translate-y-0.5 flex items-center gap-2">
                    <span>Lihat Portfolio</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                </a>

                <a href="/contact"
                   class="bg-white hover:bg-emerald-50/50 border border-slate-200 hover:border-emerald-300 text-slate-700 hover:text-emerald-700 px-7 py-3.5 rounded-xl font-semibold transition duration-300 shadow-sm hover:-translate-y-0.5">
                    Hubungi Saya
                </a>
            </div>

            <!-- Social Media Icons -->
            <div class="flex items-center justify-center md:justify-start gap-3 pt-6 border-t border-slate-200/60">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider mr-2">Mari Terhubung</span>
                
                <a href="https://www.instagram.com/sarnzllyoon._/"
                   target="_blank"
                   title="Instagram"
                   class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:text-white hover:bg-emerald-600 hover:border-emerald-600 transition duration-300 shadow-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>

                <a href="https://wa.me/6289681392003"
                   target="_blank"
                   title="WhatsApp"
                   class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:text-white hover:bg-emerald-600 hover:border-emerald-600 transition duration-300 shadow-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                </a>

                <a href="https://web.telegram.org/"
                   target="_blank"
                   title="Telegram"
                   class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:text-white hover:bg-emerald-600 hover:border-emerald-600 transition duration-300 shadow-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.121l-6.871 4.326-2.962-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.536-.196 1.006.128.832.941z"/></svg>
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

                <!-- Decorative Badge Overlay -->
                {{-- <div class="absolute -bottom-4 -left-4 bg-white/90 backdrop-blur-md border border-emerald-100 p-4 rounded-2xl shadow-xl z-20 hidden sm:flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-lg">
                        💻
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-medium">Pengalaman</p>
                        <p class="text-sm font-bold text-slate-900">Modern Web Design</p>
                    </div>
                </div> --}}

                <!-- Profile Image -->
                <div class="relative z-10 p-2 bg-white shadow-2xl ring-4 ring-emerald-500/20 rounded-[1.75rem]">
                    <img src="{{ asset('images/paspoto.jpeg') }}"
                          alt="Sara Nazilla"
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
                Mengenal Lebih Dekat <span class="gradient-emerald-text">Sara</span>
            </h2>
        </div>

        <!-- Grid Content -->
        <div class="grid md:grid-cols-12 gap-10 items-center">

            <!-- Left: Profile Photo -->
            <div class="md:col-span-5 flex justify-center">
                <div class="relative">
                    <div class="absolute inset-0 bg-emerald-200/50 rounded-3xl blur-2xl -rotate-3"></div>
                    <img src="{{ asset('images/paspoto2.jpeg') }}"
                         alt="About Sara Nazilla"
                         class="relative z-10 w-full max-w-[320px] h-[400px] object-cover rounded-3xl border-4 border-white shadow-xl">
                </div>
            </div>

            <!-- Right: Details -->
            <div class="md:col-span-7 space-y-6">
                <h3 class="text-2xl font-bold text-slate-900">
                    Pengembang Web & Desainer Antarmuka 👋
                </h3>

                <p class="text-slate-600 leading-relaxed">
                    Saya berdedikasi menciptakan pengalaman web yang tidak hanya menarik secara visual tetapi juga efisien dan mudah digunakan. Setiap baris kode dirancang untuk memberikan hasil akhir yang terbaik.
                </p>

                <p class="text-slate-600 leading-relaxed">
                    Fokus utama saya mencakup pengembangan frontend, integrasi framework modern seperti Laravel, serta desain UI/UX yang responsif di seluruh perangkat.
                </p>

                <!-- Skill Cards -->
                <div class="grid sm:grid-cols-2 gap-4 pt-4">

                    <div class="p-5 rounded-2xl bg-white border border-slate-200/80 shadow-sm hover:border-emerald-300 transition duration-300">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100/80 text-emerald-700 flex items-center justify-center font-bold mb-3 text-lg">
                            🎨
                        </div>
                        <h4 class="font-bold text-slate-900 mb-1">Frontend & UI/UX</h4>
                        <p class="text-xs text-slate-500 leading-relaxed">HTML, CSS, JavaScript, Tailwind CSS, Responsive Design</p>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border border-slate-200/80 shadow-sm hover:border-emerald-300 transition duration-300">
                        <div class="w-10 h-10 rounded-xl bg-teal-100/80 text-teal-700 flex items-center justify-center font-bold mb-3 text-lg">
                            ⚡
                        </div>
                        <h4 class="font-bold text-slate-900 mb-1">Backend & Database</h4>
                        <p class="text-xs text-slate-500 leading-relaxed">PHP, Laravel Framework, MySQL Database Management</p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

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
                        <a href="{{ $project->link }}" target="_blank"
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
                            <div class="text-amber-500 text-sm mb-2">{{ str_repeat('★', (int) $testimonial->rating) }}{{ str_repeat('☆', 5 - (int) $testimonial->rating) }}</div>
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
                                    <option value="{{ $star }}" {{ (int) old('rating', 5) === $star ? 'selected' : '' }}>{{ $star }} ★</option>
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
