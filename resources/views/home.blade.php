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
    $heroStats = [
        ['value' => $projects->count(), 'label' => 'Project'],
        ['value' => $skills->count(), 'label' => 'Skill'],
        ['value' => $certificates->count(), 'label' => 'Sertifikat'],
    ];
@endphp

<!-- Hero Section -->
<section class="relative overflow-hidden px-4 pt-10 pb-20 sm:px-6 lg:pt-14 lg:pb-24">

    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="ambient-blob absolute -right-24 -top-28 h-[32rem] w-[32rem] rounded-full bg-emerald-200/40 blur-3xl"></div>
        <div class="ambient-blob ambient-blob-slow absolute -bottom-32 -left-24 h-80 w-80 rounded-full bg-teal-200/30 blur-3xl"></div>
        <div class="absolute inset-x-0 top-0 h-[34rem] opacity-30" style="background-image: radial-gradient(circle at 1px 1px, #10b981 1px, transparent 0); background-size: 28px 28px; -webkit-mask-image: linear-gradient(to bottom, black 5%, transparent 80%); mask-image: linear-gradient(to bottom, black 5%, transparent 80%);"></div>
    </div>

    <div class="relative z-10 mx-auto grid max-w-7xl items-center gap-14 lg:grid-cols-12 lg:gap-10">

        <div class="text-center lg:col-span-7 lg:text-left">

            <div class="inline-flex items-center gap-2 rounded-full border border-emerald-200/80 bg-emerald-50 px-4 py-2 text-xs font-semibold uppercase tracking-wider text-emerald-700 shadow-sm">
                <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                {{ $displayMajor }}
            </div>

            <h1 class="mt-6 text-[2.75rem] font-extrabold leading-[1.06] tracking-tight text-slate-900 sm:text-6xl lg:text-[4.5rem]">
                Halo, saya
                <span class="mt-1 block gradient-emerald-text animated-gradient-text">{{ $displayName }}</span>
            </h1>

            <p class="mx-auto mt-6 max-w-xl text-base leading-relaxed text-slate-600 sm:text-lg lg:mx-0">
                {{ $displayBio }}
            </p>

            @if($displayClass !== '')
                <div class="mt-5 inline-flex items-center gap-2 rounded-xl border border-slate-200/80 bg-white px-3.5 py-2 text-sm font-semibold text-slate-700 shadow-sm">
                    <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                    </svg>
                    <span>{{ $displayClass }}</span>
                </div>
            @endif

            <div class="mt-8 flex flex-wrap items-center justify-center gap-3 sm:gap-4 lg:justify-start">
                <a href="#projects"
                   class="flex items-center gap-2 rounded-full bg-gradient-to-r from-emerald-600 to-teal-600 px-7 py-3.5 font-semibold text-white shadow-lg shadow-emerald-600/25 transition duration-300 hover:-translate-y-0.5 hover:from-emerald-500 hover:to-teal-500 hover:shadow-xl hover:shadow-emerald-600/35">
                    <span>Lihat Portofolio</span>
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
                </a>

                <a href="{{ $cvLink }}"
                   class="rounded-full border border-slate-200 bg-white px-7 py-3.5 font-semibold text-slate-700 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-emerald-300 hover:bg-emerald-50/50 hover:text-emerald-700">
                    Lihat CV
                </a>

                <a href="/contact"
                   class="group inline-flex items-center gap-2 px-2 py-3 text-sm font-semibold text-slate-600 transition hover:text-emerald-700">
                    Hubungi Saya
                    <svg class="h-4 w-4 transition duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

            <div class="mt-9 flex flex-col items-center gap-5 border-t border-slate-200/60 pt-6 sm:flex-row sm:items-center sm:justify-center lg:justify-start">
                <div class="flex items-center gap-3">
                    <span class="text-[10px] font-semibold uppercase tracking-[0.18em] text-slate-400">Terhubung</span>
                    <div class="flex items-center gap-2">
                        <a href="{{ $profile?->linkFor('github') ?? 'https://github.com/saraa9999' }}"
                           target="_blank"
                           rel="noopener"
                           title="GitHub"
                           aria-label="GitHub"
                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-emerald-600 hover:bg-emerald-600 hover:text-white">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.55 0-.27-.01-1.17-.02-2.12-3.2.7-3.87-1.36-3.87-1.36-.52-1.33-1.28-1.68-1.28-1.68-1.05-.72.08-.7.08-.7 1.16.08 1.77 1.19 1.77 1.19 1.03 1.76 2.7 1.25 3.36.96.1-.75.4-1.25.73-1.54-2.55-.29-5.23-1.28-5.23-5.68 0-1.25.45-2.28 1.19-3.08-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18.92-.26 1.9-.39 2.88-.39.98 0 1.96.13 2.88.39 2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.74.8 1.19 1.83 1.19 3.08 0 4.41-2.69 5.38-5.25 5.67.41.35.78 1.05.78 2.12 0 1.53-.01 2.76-.01 3.14 0 .3.21.66.8.55A11.51 11.51 0 0023.5 12C23.5 5.65 18.35.5 12 .5z"/></svg>
                        </a>

                        <a href="{{ $profile?->linkFor('linkedin') ?? 'https://www.linkedin.com/' }}"
                           target="_blank"
                           rel="noopener"
                           title="LinkedIn"
                           aria-label="LinkedIn"
                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-emerald-600 hover:bg-emerald-600 hover:text-white">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8h4V23h-4V8zm7.5 0h3.83v2.05h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V23h-4v-7.9c0-1.88-.03-4.3-2.62-4.3-2.62 0-3.02 2.05-3.02 4.17V23h-4V8z"/></svg>
                        </a>

                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ urlencode($profile->email ?? 'saranajila140@gmail.com') }}"
                           target="_blank"
                           rel="noopener"
                           title="Gmail"
                           aria-label="Gmail"
                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-emerald-600 hover:bg-emerald-600 hover:text-white">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M2.25 6.75A2.25 2.25 0 014.5 4.5h15a2.25 2.25 0 012.25 2.25v10.5A2.25 2.25 0 0119.5 19.5h-15a2.25 2.25 0 01-2.25-2.25V6.75zm1.5 0v.243l8.25 5.5 8.25-5.5V6.75a.75.75 0 00-.75-.75h-15a.75.75 0 00-.75.75zm16.5 2.07l-7.72 5.147a1.5 1.5 0 01-1.66 0L3.75 8.82v8.43c0 .414.336.75.75.75h15a.75.75 0 00.75-.75V8.82z"/></svg>
                        </a>

                        <a href="{{ $profile?->linkFor('instagram') ?? 'https://www.instagram.com/sarnzllyoon._/' }}"
                           target="_blank"
                           rel="noopener"
                           title="Instagram"
                           aria-label="Instagram"
                           class="flex h-9 w-9 items-center justify-center rounded-lg border border-slate-200 bg-white text-slate-600 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:border-emerald-600 hover:bg-emerald-600 hover:text-white">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>

                <div class="hidden h-9 w-px bg-slate-200 sm:block"></div>

                <div class="flex items-center justify-center gap-6">
                    @foreach($heroStats as $stat)
                        <div class="text-left">
                            <p class="text-xl font-extrabold text-slate-900">{{ $stat['value'] }}</p>
                            <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

        <div class="relative flex justify-center lg:col-span-5 lg:justify-end">
            <div class="hero-float relative w-[290px] sm:w-[350px] lg:w-[390px]">

                <div class="absolute -inset-8 rounded-full bg-emerald-400/20 blur-3xl"></div>
                <div class="absolute -right-4 top-10 h-24 w-24 rounded-full border border-emerald-300/60"></div>
                <div class="absolute -left-6 bottom-16 h-14 w-14 rotate-12 rounded-2xl bg-teal-200/30"></div>

                <div class="relative -rotate-1 rounded-[6rem_6rem_2.5rem_2.5rem] bg-gradient-to-br from-emerald-600 via-teal-500 to-emerald-400 p-[3px] shadow-2xl shadow-emerald-900/20 transition duration-500 hover:rotate-0">
                    <div class="rounded-[5.8rem_5.8rem_2.35rem_2.35rem] bg-white p-2.5">
                        <div class="overflow-hidden rounded-[5.5rem_5.5rem_2.1rem_2.1rem]">
                            <img src="{{ $heroPhoto }}"
                                 alt="{{ $displayName }}"
                                 class="aspect-[4/5] w-full object-cover object-top transition duration-700 hover:scale-105">
                        </div>
                    </div>
                </div>

                <div class="absolute -right-3 top-24 hidden items-center gap-2.5 rounded-2xl border border-slate-200/80 bg-white px-3.5 py-3 shadow-xl shadow-emerald-900/10 sm:flex">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-100/80 text-emerald-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                    </span>
                    <span>
                        <span class="block text-[9px] font-semibold uppercase tracking-[0.16em] text-slate-400">Fokus</span>
                        <span class="block text-xs font-bold text-slate-900">Web Development</span>
                    </span>
                </div>

                <div class="absolute -left-4 bottom-20 hidden items-center gap-2.5 rounded-2xl border border-slate-200/80 bg-white px-3.5 py-3 shadow-xl shadow-emerald-900/10 sm:flex">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-teal-100/80 text-teal-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/></svg>
                    </span>
                    <span>
                        <span class="block text-[9px] font-semibold uppercase tracking-[0.16em] text-slate-400">Pendidikan</span>
                        <span class="block max-w-[9rem] truncate text-xs font-bold text-slate-900">{{ $profile->school ?? 'SMKN 2 Banjarmasin' }}</span>
                    </span>
                </div>

            </div>
        </div>

    </div>

</section>

<!-- About Section -->
<section id="about" class="scroll-mt-28 py-20 px-4 sm:px-6 relative overflow-hidden bg-white/60 border-y border-slate-200/60">

    <div class="max-w-6xl mx-auto relative z-10">

        <!-- Section Title -->
        <div class="text-center mb-16" data-reveal>
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
            <div class="md:col-span-5 flex justify-center" data-reveal>
                <div class="relative w-full max-w-[330px]">
                    <div class="absolute -inset-5 rotate-3 rounded-[7rem_7rem_3rem_3rem] bg-emerald-200/40 blur-sm"></div>
                    <div class="absolute -right-6 -top-4 h-20 w-20 rounded-full border border-teal-300/60"></div>
                    <div class="relative z-10 rounded-[6.5rem_6.5rem_2.5rem_2.5rem] bg-gradient-to-br from-emerald-600 via-teal-500 to-emerald-400 p-[3px] shadow-xl">
                        <img src="{{ $profile->about_photo ?? asset('images/paspoto2.jpeg') }}"
                             alt="About {{ $displayName }}"
                             class="h-[410px] w-full rounded-[6.2rem_6.2rem_2.25rem_2.25rem] border-[6px] border-white object-cover object-top">
                    </div>
                    <div class="absolute -bottom-5 left-1/2 z-20 flex -translate-x-1/2 items-center gap-2 rounded-full border border-slate-200/80 bg-white px-4 py-2.5 shadow-lg shadow-emerald-900/10">
                        <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                        <span class="whitespace-nowrap text-xs font-bold text-slate-700">Laravel & Tailwind</span>
                    </div>
                </div>
            </div>

            <!-- Right: Details -->
            <div class="md:col-span-7 space-y-6" data-reveal style="--reveal-delay: 100ms">
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
@php
    $totalSkills = $skills->count();
    $hardSkills = $skills->where('category', 'hard')->count();
    $softSkills = $skills->where('category', 'soft')->count();
    $avgSkill = (int) round($skills->avg('percentage') ?? 0);
@endphp
<section id="skills" class="scroll-mt-28 py-24 px-4 sm:px-6 relative overflow-hidden">

    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute -right-20 top-16 h-72 w-72 rounded-full bg-emerald-200/40 blur-3xl"></div>
        <div class="absolute -left-24 bottom-10 h-72 w-72 rounded-full bg-teal-200/30 blur-3xl"></div>
    </div>

    <div class="max-w-6xl mx-auto relative z-10">

        <div class="text-center mb-10" data-reveal>
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block mb-3">
                Keahlian
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                Hard Skill & <span class="gradient-emerald-text">Soft Skill</span>
            </h2>
            <p class="mt-4 mx-auto max-w-xl text-sm text-slate-600 sm:text-base">
                Pilih kategori untuk menjelajahi keahlian yang paling relevan dengan kebutuhan Anda.
            </p>
        </div>

        <div class="mx-auto mb-9 flex w-fit max-w-full flex-wrap items-center justify-center gap-1.5 rounded-2xl border border-slate-200/80 bg-white p-1.5 shadow-sm" role="group" aria-label="Filter keahlian">
            <button type="button" data-skill-filter="all" aria-pressed="true"
                    class="skill-filter is-active flex items-center gap-2 rounded-xl px-4 py-2 text-xs font-semibold text-slate-600 transition hover:text-emerald-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500/60">
                Semua
                <span class="rounded-full bg-slate-100 px-1.5 py-0.5 text-[10px] font-bold text-slate-500">{{ $totalSkills }}</span>
            </button>
            <button type="button" data-skill-filter="hard" aria-pressed="false"
                    class="skill-filter flex items-center gap-2 rounded-xl px-4 py-2 text-xs font-semibold text-slate-600 transition hover:text-emerald-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500/60">
                Hard Skill
                <span class="rounded-full bg-slate-100 px-1.5 py-0.5 text-[10px] font-bold text-slate-500">{{ $hardSkills }}</span>
            </button>
            <button type="button" data-skill-filter="soft" aria-pressed="false"
                    class="skill-filter flex items-center gap-2 rounded-xl px-4 py-2 text-xs font-semibold text-slate-600 transition hover:text-emerald-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500/60">
                Soft Skill
                <span class="rounded-full bg-slate-100 px-1.5 py-0.5 text-[10px] font-bold text-slate-500">{{ $softSkills }}</span>
            </button>
        </div>

        <div class="flex flex-wrap justify-center gap-5">
            @foreach($skills as $skill)
                @php
                    $pct = max(0, min(100, (int) $skill->percentage));
                    $isSoft = $skill->category === 'soft';
                    $categoryLabel = $isSoft ? 'Soft Skill' : 'Hard Skill';
                    $level = $pct >= 90 ? 'Sangat Baik' : ($pct >= 75 ? 'Baik' : ($pct >= 60 ? 'Cukup' : 'Dasar'));
                    $badgeClass = $isSoft ? 'bg-teal-100/80 text-teal-700' : 'bg-emerald-100/80 text-emerald-700';
                    $ringClass = $isSoft ? 'text-teal-500' : 'text-emerald-500';
                    $barClass = $isSoft ? 'from-teal-600 to-emerald-500' : 'from-emerald-600 to-teal-500';
                    $glowClass = $isSoft ? 'bg-teal-100/80' : 'bg-emerald-100/80';
                @endphp
                <article data-skill-card data-category="{{ $skill->category }}" class="skill-card group w-full sm:w-[calc(50%-0.625rem)] lg:w-[calc(33.333%-0.834rem)]" data-reveal style="--reveal-delay: {{ min($loop->index, 5) * 70 }}ms">
                    <div class="relative flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200/80 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1.5 hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-600/10">
                        <div class="pointer-events-none absolute -right-10 -top-10 h-28 w-28 rounded-full {{ $glowClass }} blur-2xl transition duration-500 group-hover:scale-125"></div>

                        <div class="relative flex items-center justify-between gap-3">
                            <span class="inline-flex items-center rounded-full {{ $badgeClass }} px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.14em]">
                                {{ $categoryLabel }}
                            </span>
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl {{ $badgeClass }} transition duration-300 group-hover:rotate-6 group-hover:scale-110">
                                @if($isSoft)
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
                                @else
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                                @endif
                            </span>
                        </div>

                        <div class="relative mt-6 flex items-center justify-between gap-4">
                            <div class="min-w-0">
                                <h3 class="text-xl font-extrabold leading-tight text-slate-900 break-words">{{ $skill->name }}</h3>
                                <p class="mt-1 text-xs text-slate-500">Tingkat penguasaan</p>
                                <span class="mt-4 inline-flex items-center gap-1.5 rounded-full border border-slate-200/80 bg-slate-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-slate-600">
                                    <span class="h-1.5 w-1.5 rounded-full {{ $isSoft ? 'bg-teal-500' : 'bg-emerald-500' }}"></span>
                                    {{ $level }}
                                </span>
                            </div>

                            <div class="relative h-24 w-24 shrink-0">
                                <svg class="h-full w-full -rotate-90" viewBox="0 0 120 120" aria-hidden="true">
                                    <circle cx="60" cy="60" r="52" fill="none" stroke="currentColor" stroke-width="8" class="text-slate-100"></circle>
                                    <circle cx="60" cy="60" r="52" fill="none" stroke="currentColor" stroke-width="8" stroke-linecap="round"
                                            class="skill-ring {{ $ringClass }}"
                                            style="stroke-dasharray: 326.73; stroke-dashoffset: var(--ring-target); --ring-target: {{ round(326.73 * (1 - $pct / 100), 2) }};"></circle>
                                </svg>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="text-lg font-extrabold text-slate-900"><span data-skill-count="{{ $pct }}">{{ $pct }}</span>%</span>
                                </div>
                            </div>
                        </div>

                        <div class="relative mt-6 h-1.5 overflow-hidden rounded-full bg-slate-100">
                            <div class="skill-mini-bar h-full rounded-full bg-gradient-to-r {{ $barClass }}" style="--bar-target: {{ $pct }}%; width: var(--bar-target);"></div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-8 grid gap-3 sm:grid-cols-3" data-reveal style="--reveal-delay: 120ms">
            <div class="flex items-center gap-4 rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100/80 text-emerald-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/></svg>
                </span>
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">Rata-rata</p>
                    <p class="text-lg font-extrabold text-slate-900">{{ $avgSkill }}%</p>
                </div>
            </div>
            <div class="flex items-center gap-4 rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-emerald-100/80 text-emerald-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/></svg>
                </span>
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">Hard Skill</p>
                    <p class="text-lg font-extrabold text-slate-900">{{ $hardSkills }} Keahlian</p>
                </div>
            </div>
            <div class="flex items-center gap-4 rounded-2xl border border-slate-200/80 bg-white p-4 shadow-sm">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-teal-100/80 text-teal-700">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/></svg>
                </span>
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">Soft Skill</p>
                    <p class="text-lg font-extrabold text-slate-900">{{ $softSkills }} Keahlian</p>
                </div>
            </div>
        </div>

    </div>

</section>
@endif

<!-- Projects Carousel Section -->
<section id="projects" class="scroll-mt-28 py-24 px-4 sm:px-6 relative">

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Title -->
        <div class="text-center mb-16" data-reveal>
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

                <div class="project-card flex-shrink-0 w-80 md:w-96 group bg-white border border-slate-200/80 rounded-3xl overflow-hidden hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-600/10 transition-all duration-300 flex flex-col justify-between" data-reveal style="--reveal-delay: {{ min($loop->index, 5) * 60 }}ms">

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

<!-- Experience Section -->
@if($experiences->isNotEmpty())
<section id="pengalaman" class="scroll-mt-28 py-24 px-4 sm:px-6 relative overflow-hidden bg-white/60 border-y border-slate-200/60">

    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute -right-24 top-10 h-72 w-72 rounded-full bg-emerald-200/40 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 h-64 w-64 rounded-full bg-teal-200/30 blur-3xl"></div>
    </div>

    <div class="max-w-5xl mx-auto relative z-10">

        <div class="text-center mb-12" data-reveal>
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block mb-3">
                Pengalaman
            </span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                Jejak <span class="gradient-emerald-text">Pengalaman</span>
            </h2>
            <p class="mt-4 mx-auto max-w-xl text-sm text-slate-600 sm:text-base">
                Klik setiap kartu untuk membuka cerita, tempat, dan pembelajaran di balik pengalaman tersebut.
            </p>
        </div>

        <div class="space-y-4">
            @foreach($experiences as $experience)
                @php
                    $expType = $experience->type
                        ? ($experience->type === 'plk' ? 'PLK' : ucfirst($experience->type))
                        : 'Pengalaman';
                    $panelId = 'experience-panel-'.$experience->id;
                    $isFirst = $loop->first;
                @endphp
                <article class="experience-item {{ $isFirst ? 'is-open' : '' }}" data-experience-item data-reveal style="--reveal-delay: {{ min($loop->index, 5) * 70 }}ms">
                    <div class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm transition duration-300 hover:border-emerald-300 hover:shadow-lg hover:shadow-emerald-600/5">
                        <button type="button"
                                class="experience-toggle flex w-full items-start gap-4 p-5 text-left focus:outline-none focus-visible:ring-2 focus-visible:ring-inset focus-visible:ring-emerald-500/50 sm:p-6"
                                aria-expanded="{{ $isFirst ? 'true' : 'false' }}"
                                aria-controls="{{ $panelId }}">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-500 text-sm font-extrabold text-white shadow-lg shadow-emerald-600/20">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <span class="min-w-0 flex-1">
                                <span class="flex flex-wrap items-center gap-2">
                                    <span class="inline-flex items-center rounded-lg border border-emerald-200 bg-emerald-50 px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-wider text-emerald-700">
                                        {{ $expType }}
                                    </span>
                                    @if($experience->period)
                                        <span class="inline-flex items-center gap-1 text-xs font-medium text-slate-500">
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                                            {{ $experience->period }}
                                        </span>
                                    @endif
                                </span>
                                <span class="mt-2 block text-lg font-bold leading-snug text-slate-900">{{ $experience->title }}</span>
                                @if($experience->place)
                                    <span class="mt-1 block text-xs font-semibold text-emerald-700">{{ $experience->place }}</span>
                                @endif
                            </span>
                            <span class="experience-chevron mt-1 flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-slate-200 bg-slate-50 text-slate-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/></svg>
                            </span>
                        </button>

                        <div id="{{ $panelId }}" class="experience-panel" aria-hidden="{{ $isFirst ? 'false' : 'true' }}">
                            <div>
                                <div class="border-t border-slate-100 px-5 pb-6 pt-4 sm:px-6 sm:pl-[5.25rem]">
                                    <p class="text-sm leading-relaxed text-slate-600">
                                        {{ $experience->description ?: 'Belum ada deskripsi tambahan untuk pengalaman ini.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

    </div>

</section>
@endif

<!-- Certificates Section -->
@if($certificates->isNotEmpty())
<section id="pencapaian" class="scroll-mt-28 py-24 px-4 sm:px-6 relative overflow-hidden">

    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute -right-24 top-24 h-72 w-72 rounded-full bg-teal-200/30 blur-3xl"></div>
        <div class="absolute -left-24 bottom-10 h-64 w-64 rounded-full bg-emerald-200/40 blur-3xl"></div>
    </div>

    <div class="max-w-6xl mx-auto relative z-10">

        <div class="mb-10 flex flex-col items-center gap-6 sm:flex-row sm:items-end sm:justify-between" data-reveal>
            <div class="text-center sm:text-left">
                <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block mb-3">
                    Pencapaian
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900">
                    Sertifikat & <span class="gradient-emerald-text">Prestasi</span>
                </h2>
                <p class="mt-4 max-w-xl text-sm text-slate-600 sm:text-base">
                    Klik kartu untuk melihat sertifikat dan detail pencapaian dalam ukuran penuh.
                </p>
            </div>
            <a href="/certificates" class="inline-flex shrink-0 items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-300 hover:bg-emerald-50/50 hover:text-emerald-700">
                Lihat semua
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>

        <div class="flex flex-wrap justify-center gap-5">
            @foreach($certificates->take(4) as $certificate)
                @php
                    $certType = $certificate->type ? ucfirst($certificate->type) : 'Sertifikat';
                    $certMeta = trim(($certificate->issuer ?? '').($certificate->year ? ' · '.$certificate->year : ''), ' ·');
                @endphp
                <button type="button"
                        class="certificate-card group w-full text-left focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500/60 sm:w-[calc(50%-0.625rem)] lg:w-[calc(33.333%-0.834rem)]"
                        aria-label="Lihat sertifikat {{ $certificate->title }}"
                        data-reveal
                        style="--reveal-delay: {{ min($loop->index, 5) * 70 }}ms"
                        data-certificate-card
                        data-certificate-image="{{ $certificate->image }}"
                        data-certificate-title="{{ $certificate->title }}"
                        data-certificate-issuer="{{ $certificate->issuer }}"
                        data-certificate-year="{{ $certificate->year }}"
                        data-certificate-type="{{ $certType }}">
                    <span class="block overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm transition duration-300 hover:-translate-y-1.5 hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-600/10">
                        <span class="relative block aspect-[16/10] overflow-hidden bg-slate-100">
                            @if($certificate->image)
                                <img src="{{ $certificate->image }}" alt="{{ $certificate->title }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
                            @else
                                <span class="flex h-full w-full items-center justify-center bg-gradient-to-br from-emerald-50 to-teal-100 text-emerald-300">
                                    <svg class="h-16 w-16" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0"/></svg>
                                </span>
                            @endif
                            <span class="absolute inset-0 block bg-gradient-to-t from-slate-950/70 via-slate-950/5 to-transparent"></span>
                            <span class="absolute left-4 top-4 inline-flex items-center rounded-full border border-white/20 bg-white/90 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-emerald-800">
                                {{ $certType }}
                            </span>
                            <span class="absolute bottom-4 left-4 inline-flex items-center gap-2 rounded-full bg-slate-950/40 px-3 py-1.5 text-[11px] font-semibold text-white backdrop-blur-sm">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Lihat sertifikat
                            </span>
                        </span>
                        <span class="block p-5">
                            <span class="line-clamp-2 block text-lg font-bold leading-snug text-slate-900">{{ $certificate->title }}</span>
                            @if($certMeta !== '')
                                <span class="mt-1 block text-xs text-slate-500">{{ $certMeta }}</span>
                            @endif
                        </span>
                    </span>
                </button>
            @endforeach
        </div>

    </div>

</section>

<div id="certificateModal" class="certificate-modal fixed inset-0 z-[60] flex items-center justify-center p-4 sm:p-6" role="dialog" aria-modal="true" aria-labelledby="certificateModalTitle" aria-hidden="true">
    <div class="absolute inset-0 bg-slate-950/70 backdrop-blur-sm" data-certificate-close></div>
    <div class="certificate-modal-panel relative z-10 w-full max-w-3xl overflow-hidden rounded-3xl border border-white/10 bg-white shadow-2xl">
        <button type="button" id="certificateModalClose" class="absolute right-4 top-4 z-20 flex h-9 w-9 items-center justify-center rounded-full bg-slate-950/60 text-white backdrop-blur transition hover:bg-slate-950 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/70" aria-label="Tutup" data-certificate-close>
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div class="grid sm:grid-cols-2">
            <div class="relative flex min-h-[260px] items-center justify-center bg-slate-950 sm:min-h-[380px]">
                <img id="certificateModalImage" alt="" class="h-full w-full object-contain">
                <div id="certificateModalPlaceholder" class="absolute inset-0 flex items-center justify-center text-emerald-300/50">
                    <svg class="h-20 w-20" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.2" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0"/></svg>
                </div>
            </div>
            <div class="flex flex-col justify-center p-6 sm:p-8">
                <span id="certificateModalType" class="inline-flex w-fit items-center rounded-full bg-emerald-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-emerald-700"></span>
                <h3 id="certificateModalTitle" class="mt-4 text-2xl font-extrabold leading-tight text-slate-900"></h3>
                <p id="certificateModalIssuer" class="mt-2 text-sm text-slate-600"></p>
                <p id="certificateModalYear" class="mt-1 text-sm font-semibold text-emerald-700"></p>
                <a href="/certificates" class="mt-6 inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 transition hover:text-emerald-700">
                    Lihat semua sertifikat
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Testimonials Section -->
<section id="testimoni" class="scroll-mt-24 py-24 px-4 sm:px-6 relative overflow-hidden bg-white/60 border-y border-slate-200/60">

    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute -right-28 top-10 h-80 w-80 rounded-full bg-emerald-200/35 blur-3xl"></div>
        <div class="absolute -left-24 bottom-0 h-72 w-72 rounded-full bg-teal-200/30 blur-3xl"></div>
    </div>

    @php
        $testimonialTotal = $testimonials->count();
        $testimonialAverage = $testimonialTotal > 0 ? round((float) $testimonials->avg('rating'), 1) : 0;
        $ratingDistribution = collect([5, 4, 3, 2, 1])->map(function ($star) use ($testimonials, $testimonialTotal) {
            $count = $testimonials->where('rating', $star)->count();

            return [
                'star' => $star,
                'count' => $count,
                'percent' => $testimonialTotal > 0 ? (int) round(($count / $testimonialTotal) * 100) : 0,
            ];
        });
        $originLabels = [
            'guru' => 'Guru',
            'teman' => 'Teman',
            'pengguna' => 'Pengguna',
            'plk' => 'Tempat PLK',
        ];
        $ratingLabels = [
            1 => 'Kurang',
            2 => 'Cukup',
            3 => 'Baik',
            4 => 'Sangat Baik',
            5 => 'Luar Biasa',
        ];
        $selectedOrigin = old('origin', 'pengguna');
        $selectedRating = max(1, min(5, (int) old('rating', 5)));
        $previewName = trim((string) old('name', ''));
        $previewRole = trim((string) old('role', ''));
        $previewMessage = trim((string) old('message', ''));
    @endphp

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Title -->
        <div class="text-center mb-14" data-reveal>
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

        <div class="grid items-start gap-6 lg:grid-cols-12 lg:gap-8">

            <!-- Testimonials List -->
            <div class="lg:col-span-7 xl:col-span-8">
                @if($testimonials->isEmpty())
                    <div class="rounded-[2rem] border border-slate-200/80 bg-white p-10 text-center shadow-sm" data-reveal>
                        <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M7.5 8.25h9m-9 3.75h6M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </span>
                        <p class="mt-4 text-sm font-semibold text-slate-700">Belum ada testimoni yang dipublikasikan.</p>
                        <p class="mt-1 text-xs text-slate-500">Jadilah yang pertama berbagi pengalaman melalui formulir di samping.</p>
                    </div>
                @else
                    <div class="mb-5 flex flex-col gap-5 rounded-[1.75rem] border border-slate-200/80 bg-white/90 p-5 shadow-sm sm:flex-row sm:items-center sm:justify-between" data-reveal>
                        <div class="flex items-center gap-4">
                            <div class="flex h-16 w-16 shrink-0 flex-col items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-500 text-white shadow-lg shadow-emerald-600/20">
                                <span class="text-2xl font-extrabold leading-none">{{ number_format($testimonialAverage, 1, ',', '.') }}</span>
                                <span class="mt-0.5 text-[9px] font-semibold uppercase tracking-wider text-emerald-50/80">dari 5</span>
                            </div>
                            <div>
                                <div class="flex items-center gap-0.5" aria-label="Rating rata-rata {{ $testimonialAverage }} dari 5">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="h-4 w-4 {{ $i <= round($testimonialAverage) ? 'text-amber-400' : 'text-slate-200' }}" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <p class="mt-1 text-sm font-bold text-slate-900">Rating rata-rata</p>
                                <p class="text-xs text-slate-500">Dari {{ $testimonialTotal }} testimoni yang telah disetujui</p>
                            </div>
                        </div>
                        <div class="w-full space-y-1.5 sm:max-w-[220px]">
                            @foreach($ratingDistribution as $row)
                                <div class="flex items-center gap-2">
                                    <span class="w-6 text-[10px] font-bold text-slate-500">{{ $row['star'] }}★</span>
                                    <div class="h-1.5 flex-1 overflow-hidden rounded-full bg-slate-100">
                                        <div class="h-full rounded-full bg-gradient-to-r from-emerald-500 to-teal-400" style="width: {{ $row['percent'] }}%"></div>
                                    </div>
                                    <span class="w-4 text-right text-[10px] font-semibold text-slate-400">{{ $row['count'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-1">
                        @foreach($testimonials as $testimonial)
                            @php
                                $cardRating = max(1, min(5, (int) ($testimonial->rating ?? 5)));
                                $cardOrigin = $originLabels[$testimonial->origin] ?? ucfirst((string) $testimonial->origin);
                                $cardInitial = strtoupper(substr($testimonial->name ?: '?', 0, 1));
                                $cardRatingLabel = $ratingLabels[$cardRating] ?? 'Baik';
                            @endphp
                            <article class="testimonial-card group relative flex h-full min-h-[230px] flex-col overflow-hidden rounded-[1.75rem] border border-slate-200/80 bg-white p-6 shadow-sm" data-testimonial-card data-reveal style="--reveal-delay: {{ min($loop->index, 5) * 70 }}ms">
                                <span class="testimonial-spotlight pointer-events-none absolute inset-0" aria-hidden="true"></span>
                                <span class="pointer-events-none absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-emerald-500 via-teal-400 to-emerald-200" aria-hidden="true"></span>
                                <svg class="testimonial-quote pointer-events-none absolute -right-2 -top-3 h-24 w-24 transition duration-500 group-hover:rotate-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M9.5 7H5.75A2.75 2.75 0 003 9.75v3.5A2.75 2.75 0 005.75 16H8v1.5A2.5 2.5 0 015.5 20H5v2h.5A4.5 4.5 0 0010 17.5V9.5A2.5 2.5 0 009.5 7zm10 0h-3.75A2.75 2.75 0 0013 9.75v3.5A2.75 2.75 0 0015.75 16H18v1.5a2.5 2.5 0 01-2.5 2.5H15v2h.5a4.5 4.5 0 004.5-4.5V9.5A2.5 2.5 0 0019.5 7z"/>
                                </svg>

                                <div class="relative z-10 flex h-full flex-col">
                                    <div class="flex items-start gap-3">
                                        @if($testimonial->photo)
                                            <div class="shrink-0 rounded-full bg-gradient-to-br from-emerald-500 to-teal-400 p-[2px]">
                                                <img src="{{ $testimonial->photo }}" alt="{{ $testimonial->name }}" class="h-11 w-11 rounded-full object-cover ring-2 ring-white">
                                            </div>
                                        @else
                                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-emerald-600 to-teal-500 text-sm font-extrabold text-white shadow-md shadow-emerald-600/20">{{ $cardInitial }}</div>
                                        @endif
                                        <div class="min-w-0 flex-1">
                                            <h3 class="truncate text-sm font-bold text-slate-900">{{ $testimonial->name }}</h3>
                                            <p class="mt-0.5 truncate text-xs text-slate-500">{{ $testimonial->role ?: 'Pengunjung' }}{{ $testimonial->origin ? ' · '.$cardOrigin : '' }}</p>
                                        </div>
                                        <span class="inline-flex shrink-0 items-center gap-1 rounded-full border border-emerald-200/70 bg-emerald-50 px-2 py-1 text-[10px] font-bold text-emerald-700">
                                            <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            {{ number_format($cardRating, 1, ',', '.') }}
                                        </span>
                                    </div>

                                    <div class="mt-4 flex items-center gap-2">
                                        <div class="flex items-center gap-0.5" aria-label="Rating {{ $cardRating }} dari 5">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="h-3.5 w-3.5 {{ $i <= $cardRating ? 'text-amber-400' : 'text-slate-200' }}" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">{{ $cardRatingLabel }}</span>
                                    </div>

                                    <p class="mt-4 flex-1 text-sm leading-relaxed text-slate-600">“{{ $testimonial->message }}”</p>

                                    <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-3">
                                        <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                                            <svg class="h-3.5 w-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                            Terverifikasi
                                        </span>
                                        <span class="text-[10px] font-medium text-slate-400">{{ ($testimonial->created_at ?? now())->format('M Y') }}</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="relative mt-5 overflow-hidden rounded-[1.75rem] bg-gradient-to-br from-emerald-600 via-teal-600 to-emerald-700 p-6 text-white shadow-lg shadow-emerald-700/20" data-reveal>
                        <span class="pointer-events-none absolute -right-10 -top-10 h-40 w-40 rounded-full bg-white/10 blur-xl" aria-hidden="true"></span>
                        <span class="pointer-events-none absolute -bottom-12 -left-8 h-40 w-40 rounded-full bg-emerald-300/20 blur-xl" aria-hidden="true"></span>
                        <div class="relative z-10">
                            <span class="inline-flex rounded-full border border-white/20 bg-white/10 px-3 py-1 text-[9px] font-bold uppercase tracking-[0.18em] text-emerald-50">Mengapa penting</span>
                            <h3 class="mt-3 text-xl font-extrabold tracking-tight">Cerita kecil, dampak besar.</h3>
                            <p class="mt-2 max-w-lg text-sm leading-relaxed text-emerald-50/85">
                                Testimoni Anda membantu calon klien melihat cara kerja, komunikasi, dan hasil akhir dari proyek yang saya kerjakan.
                            </p>
                            <div class="mt-5 grid gap-2.5 sm:grid-cols-2">
                                <div class="flex items-center gap-2 rounded-xl border border-white/15 bg-white/10 px-3 py-2.5">
                                    <svg class="h-4 w-4 shrink-0 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span class="text-xs font-semibold">Ditinjau admin</span>
                                </div>
                                <div class="flex items-center gap-2 rounded-xl border border-white/15 bg-white/10 px-3 py-2.5">
                                    <svg class="h-4 w-4 shrink-0 text-emerald-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span class="text-xs font-semibold">Tampil di beranda</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Submission Form -->
            <div class="lg:col-span-5 xl:col-span-4" data-reveal style="--reveal-delay: 100ms">
                <div class="testimonial-form-card relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white shadow-xl shadow-emerald-900/5">
                    <div class="h-1.5 bg-gradient-to-r from-emerald-500 via-teal-400 to-emerald-300"></div>
                    <div class="p-6 sm:p-7">
                        <div class="flex items-start gap-3">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-emerald-600 to-teal-500 text-white shadow-lg shadow-emerald-600/20">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7.5 8.25h9m-9 3.75h6M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </span>
                            <div>
                                <h3 class="text-xl font-extrabold text-slate-900">Bagikan Pengalaman</h3>
                                <p class="mt-1 text-sm leading-relaxed text-slate-500">Ceritakan kesan Anda. Testimoni tampil setelah disetujui admin.</p>
                            </div>
                        </div>

                        @if(session('testimonial_success'))
                            <div class="mt-5 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm font-medium text-emerald-800">
                                <svg class="mt-0.5 h-4 w-4 shrink-0 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <p>{{ session('testimonial_success') }}</p>
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="mt-5 flex items-start gap-3 rounded-2xl border border-rose-200 bg-rose-50 p-4 text-sm font-medium text-rose-700">
                                <svg class="mt-0.5 h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3.75m0 3.75h.008v.008H12v-.008zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <p>{{ $errors->first() }}</p>
                            </div>
                        @endif

                        <form id="testimonialForm" action="/testimonials" method="POST" class="mt-6 space-y-5">
                            @csrf

                            <div>
                                <label for="testimonialName" class="mb-2 block text-sm font-semibold text-slate-700">Nama</label>
                                <div class="relative">
                                    <svg class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a7.5 7.5 0 0115 0"/></svg>
                                    <input type="text" id="testimonialName" name="name" value="{{ old('name') }}" maxlength="255" required
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-11 pr-4 text-sm text-slate-800 transition focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/15">
                                </div>
                            </div>

                            <div>
                                <label for="testimonialRole" class="mb-2 block text-sm font-semibold text-slate-700">Peran <span class="font-normal text-slate-400">(opsional)</span></label>
                                <div class="relative">
                                    <svg class="pointer-events-none absolute left-4 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20.25 14.15v4.1a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25v-4.1m16.5 0a2.25 2.25 0 00-1.35-2.07l-5.25-2.1a2.25 2.25 0 00-1.8 0l-5.25 2.1a2.25 2.25 0 00-1.35 2.07m16.5 0a2.25 2.25 0 01-1.35 2.07l-5.25 2.1a2.25 2.25 0 01-1.8 0l-5.25-2.1a2.25 2.25 0 01-1.35-2.07M15 6.75a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <input type="text" id="testimonialRole" name="role" value="{{ old('role') }}" maxlength="255" placeholder="Guru Pembimbing"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-11 pr-4 text-sm text-slate-800 transition focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/15">
                                </div>
                            </div>

                            <fieldset class="min-w-0">
                                <legend class="mb-2 block text-sm font-semibold text-slate-700">Asal</legend>
                                <div class="grid grid-cols-2 gap-2">
                                    @foreach($originLabels as $originValue => $originLabel)
                                        <label class="origin-option {{ $selectedOrigin === $originValue ? 'is-active' : '' }}">
                                            <input type="radio" name="origin" value="{{ $originValue }}" class="sr-only" {{ $selectedOrigin === $originValue ? 'checked' : '' }}>
                                            <span class="origin-option-inner flex items-center justify-center gap-2 rounded-xl px-2 py-2.5 text-xs font-semibold">
                                                <span class="h-1.5 w-1.5 rounded-full bg-current"></span>
                                                {{ $originLabel }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </fieldset>

                            <fieldset class="min-w-0" data-rating-input>
                                <legend class="sr-only">Rating</legend>
                                <div class="flex items-center justify-between gap-3">
                                    <span class="text-sm font-semibold text-slate-700">Rating</span>
                                    <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-emerald-700" data-rating-label>{{ $ratingLabels[$selectedRating] }}</span>
                                </div>
                                <div class="mt-2 flex items-center gap-1.5">
                                    @for($star = 1; $star <= 5; $star++)
                                        <label class="rating-star {{ $star <= $selectedRating ? 'is-filled' : '' }}" data-rating-star="{{ $star }}">
                                            <input type="radio" name="rating" value="{{ $star }}" class="sr-only" {{ $selectedRating === $star ? 'checked' : '' }}>
                                            <svg class="h-7 w-7" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            <span class="sr-only">{{ $star }} bintang</span>
                                        </label>
                                    @endfor
                                </div>
                            </fieldset>

                            <div>
                                <div class="flex items-center justify-between gap-3">
                                    <label for="testimonialMessage" class="text-sm font-semibold text-slate-700">Pesan</label>
                                    <span class="text-[10px] font-semibold text-slate-400" data-message-counter><span data-message-count>{{ mb_strlen($previewMessage) }}</span>/1000</span>
                                </div>
                                <textarea id="testimonialMessage" name="message" rows="4" maxlength="1000" required placeholder="Tulis pengalaman Anda..."
                                    class="mt-2 w-full resize-none rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 transition focus:border-emerald-500 focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/15">{{ old('message') }}</textarea>
                            </div>

                            <div class="testimonial-preview relative overflow-hidden rounded-2xl border border-emerald-100 bg-emerald-50/70 p-4">
                                <div class="flex items-center justify-between gap-3">
                                    <p class="text-[9px] font-bold uppercase tracking-[0.18em] text-emerald-700">Pratinjau</p>
                                    <span class="inline-flex items-center gap-1 text-[9px] font-semibold uppercase tracking-wider text-emerald-600/70">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Live
                                    </span>
                                </div>
                                <div class="mt-3 flex items-center gap-2.5">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-emerald-600 to-teal-500 text-xs font-extrabold text-white" data-preview-initial>{{ $previewName !== '' ? strtoupper(substr($previewName, 0, 1)) : '?' }}</span>
                                    <div class="min-w-0">
                                        <p class="truncate text-xs font-bold text-slate-900" data-preview-name>{{ $previewName !== '' ? $previewName : 'Nama Anda' }}</p>
                                        <p class="truncate text-[10px] text-slate-500"><span data-preview-role>{{ $previewRole !== '' ? $previewRole : 'Peran Anda' }}</span> · <span data-preview-origin>{{ $originLabels[$selectedOrigin] ?? 'Pengguna' }}</span></p>
                                    </div>
                                </div>
                                <div class="mt-2 flex items-center gap-1" aria-hidden="true">
                                    @for($star = 1; $star <= 5; $star++)
                                        <svg class="preview-star h-3 w-3 {{ $star <= $selectedRating ? 'is-filled' : '' }}" data-preview-star="{{ $star }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.538 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.783.57-1.838-.197-1.538-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <p class="mt-2 line-clamp-2 min-h-[2.25rem] text-xs leading-relaxed text-slate-600" data-preview-message>{{ $previewMessage !== '' ? $previewMessage : 'Testimoni Anda akan tampil seperti ini.' }}</p>
                            </div>

                            <button type="submit" class="group flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-emerald-600 to-teal-600 px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-emerald-600/20 transition duration-300 hover:-translate-y-0.5 hover:from-emerald-500 hover:to-teal-500 hover:shadow-xl focus:outline-none focus-visible:ring-2 focus-visible:ring-emerald-500/60 focus-visible:ring-offset-2">
                                <span data-submit-label>Kirim Testimoni</span>
                                <svg class="h-4 w-4 transition duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </button>
                            <p class="text-center text-[10px] leading-relaxed text-slate-400">Testimoni akan ditinjau sebelum ditampilkan di halaman utama.</p>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

<!-- Latest Blog Section -->
@if($posts->isNotEmpty())
<section id="blog" class="py-24 px-4 sm:px-6 relative">

    <div class="max-w-7xl mx-auto relative z-10">

        <div class="text-center mb-16" data-reveal>
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
            <a href="/blog/{{ $post->slug }}" class="group bg-white border border-slate-200/80 rounded-3xl overflow-hidden hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-600/10 transition duration-300 flex flex-col" data-reveal style="--reveal-delay: {{ min($loop->index, 5) * 70 }}ms">
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
    <div class="max-w-5xl mx-auto rounded-3xl bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-700 p-8 sm:p-12 text-white shadow-xl shadow-emerald-600/20 relative overflow-hidden text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-8" data-reveal>
        
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

    .skill-filter.is-active {
        background-image: linear-gradient(135deg, #059669, #0d9488);
        border-color: transparent;
        color: #ffffff;
        box-shadow: 0 12px 24px -14px rgba(5, 150, 105, 0.9);
    }

    .skill-filter.is-active span {
        background-color: rgba(255, 255, 255, 0.18);
        color: #ffffff;
    }

    .skill-card.is-filtered {
        display: none;
    }

    @keyframes skill-ring-fill {
        from { stroke-dashoffset: 326.73; }
        to { stroke-dashoffset: var(--ring-target); }
    }

    @keyframes skill-bar-fill {
        from { width: 0; }
        to { width: var(--bar-target); }
    }

    .skills-visible .skill-ring {
        animation: skill-ring-fill 1.3s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .skills-visible .skill-mini-bar {
        animation: skill-bar-fill 1.1s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    .experience-panel {
        display: grid;
        grid-template-rows: 0fr;
        transition: grid-template-rows 0.35s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .experience-panel > div {
        overflow: hidden;
    }

    .experience-item.is-open .experience-panel {
        grid-template-rows: 1fr;
    }

    .experience-chevron {
        transition: transform 0.3s ease;
    }

    .experience-item.is-open .experience-chevron {
        transform: rotate(180deg);
    }

    .certificate-modal {
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: opacity 0.25s ease, visibility 0.25s ease;
    }

    .certificate-modal.is-open {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }

    .certificate-modal-panel {
        transform: translateY(14px) scale(0.98);
        transition: transform 0.3s cubic-bezier(0.22, 1, 0.36, 1);
    }

    .certificate-modal.is-open .certificate-modal-panel {
        transform: translateY(0) scale(1);
    }

    .animated-gradient-text {
        background-size: 200% auto;
        animation: gradient-pan 8s ease-in-out infinite;
    }

    html.dark .animated-gradient-text {
        background-size: 200% auto;
    }

    @keyframes gradient-pan {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .hero-float {
        animation: hero-float 7s ease-in-out infinite;
    }

    @keyframes hero-float {
        0%, 100% { transform: translate3d(0, 0, 0); }
        50% { transform: translate3d(0, -9px, 0); }
    }

    .ambient-blob {
        animation: ambient-drift 16s ease-in-out infinite alternate;
    }

    .ambient-blob-slow {
        animation-duration: 22s;
        animation-delay: -6s;
    }

    @keyframes ambient-drift {
        from { transform: translate3d(0, 0, 0) scale(1); }
        to { transform: translate3d(20px, -16px, 0) scale(1.06); }
    }

    .reveal-pending {
        opacity: 0;
        transform: translate3d(0, 18px, 0);
    }

    .reveal-pending.reveal-in {
        opacity: 1;
        transform: translate3d(0, 0, 0);
        transition:
            opacity 0.6s ease,
            transform 0.6s cubic-bezier(0.22, 1, 0.36, 1);
        transition-delay: var(--reveal-delay, 0ms);
    }

    .testimonial-card {
        --spot-x: 50%;
        --spot-y: 0%;
        transition:
            transform 0.35s cubic-bezier(0.22, 1, 0.36, 1),
            border-color 0.35s ease,
            box-shadow 0.35s ease;
    }

    .testimonial-card:hover {
        transform: translateY(-4px);
        border-color: rgba(110, 231, 183, 0.85);
        box-shadow: 0 26px 50px -30px rgba(5, 150, 105, 0.45);
    }

    .testimonial-quote {
        color: rgba(16, 185, 129, 0.1);
    }

    .testimonial-card:hover .testimonial-quote {
        color: rgba(16, 185, 129, 0.18);
    }

    html.dark .testimonial-quote {
        color: rgba(110, 231, 183, 0.12);
    }

    html.dark .testimonial-card:hover .testimonial-quote {
        color: rgba(110, 231, 183, 0.2);
    }

    .testimonial-spotlight {
        background: radial-gradient(320px circle at var(--spot-x) var(--spot-y), rgba(16, 185, 129, 0.14), transparent 68%);
        opacity: 0;
        transition: opacity 0.35s ease;
    }

    .testimonial-card:hover .testimonial-spotlight {
        opacity: 1;
    }

    html.dark .testimonial-card:hover {
        border-color: rgba(52, 211, 153, 0.45);
        box-shadow: 0 26px 50px -30px rgba(16, 185, 129, 0.35);
    }

    html.dark .testimonial-spotlight {
        background: radial-gradient(320px circle at var(--spot-x) var(--spot-y), rgba(52, 211, 153, 0.16), transparent 68%);
    }

    .testimonial-form-card {
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .testimonial-form-card:focus-within {
        border-color: rgba(110, 231, 183, 0.9);
        box-shadow: 0 30px 60px -35px rgba(5, 150, 105, 0.4);
    }

    html.dark .testimonial-form-card:focus-within {
        border-color: rgba(52, 211, 153, 0.5);
        box-shadow: 0 30px 60px -35px rgba(16, 185, 129, 0.3);
    }

    .origin-option {
        cursor: pointer;
    }

    .origin-option-inner {
        border: 1px solid rgba(226, 232, 240, 0.9);
        background: rgba(248, 250, 252, 0.8);
        color: #475569;
        transition:
            border-color 0.25s ease,
            background-color 0.25s ease,
            color 0.25s ease,
            box-shadow 0.25s ease;
    }

    .origin-option:hover .origin-option-inner {
        border-color: rgba(52, 211, 153, 0.55);
        background: rgba(236, 253, 245, 0.8);
        color: #047857;
    }

    .origin-option.is-active .origin-option-inner {
        border-color: transparent;
        background: linear-gradient(135deg, #059669, #0d9488);
        color: #ffffff;
        box-shadow: 0 12px 22px -15px rgba(5, 150, 105, 0.9);
    }

    .origin-option input:focus-visible + .origin-option-inner {
        outline: 2px solid rgba(16, 185, 129, 0.55);
        outline-offset: 2px;
    }

    html.dark .origin-option-inner {
        border-color: #334155;
        background: rgba(15, 23, 42, 0.65);
        color: #cbd5e1;
    }

    html.dark .origin-option:hover .origin-option-inner {
        border-color: rgba(16, 185, 129, 0.45);
        background: rgba(6, 78, 59, 0.45);
        color: #a7f3d0;
    }

    html.dark .origin-option.is-active .origin-option-inner {
        border-color: transparent;
        background: linear-gradient(135deg, #059669, #0d9488);
        color: #ffffff;
    }

    .rating-star {
        display: inline-flex;
        cursor: pointer;
        border-radius: 0.5rem;
    }

    .rating-star svg {
        color: #cbd5e1;
        transition:
            color 0.18s ease,
            transform 0.18s ease,
            filter 0.18s ease;
    }

    .rating-star:hover svg,
    .rating-star.is-filled svg {
        color: #f59e0b;
    }

    .rating-star.is-filled svg {
        filter: drop-shadow(0 3px 6px rgba(245, 158, 11, 0.25));
    }

    .rating-star:hover svg {
        transform: translateY(-2px) scale(1.08);
    }

    .rating-star input:focus-visible + svg {
        outline: 2px solid rgba(245, 158, 11, 0.7);
        outline-offset: 2px;
        border-radius: 0.35rem;
    }

    html.dark .rating-star svg {
        color: #475569;
    }

    html.dark .rating-star:hover svg,
    html.dark .rating-star.is-filled svg {
        color: #fbbf24;
    }

    .preview-star {
        color: #cbd5e1;
        transition: color 0.2s ease;
    }

    .preview-star.is-filled {
        color: #f59e0b;
    }

    html.dark .preview-star {
        color: #475569;
    }

    html.dark .preview-star.is-filled {
        color: #fbbf24;
    }

    html.dark .testimonial-preview {
        border-color: rgba(16, 185, 129, 0.22);
        background: linear-gradient(135deg, rgba(6, 78, 59, 0.45), rgba(19, 78, 74, 0.28));
    }

    [data-message-counter].is-near-limit {
        color: #d97706;
    }

    [data-message-counter].is-limit {
        color: #e11d48;
    }

    @media (prefers-reduced-motion: reduce) {
        .skills-visible .skill-ring,
        .skills-visible .skill-mini-bar,
        .animated-gradient-text,
        .hero-float,
        .ambient-blob {
            animation: none !important;
        }

        .experience-panel,
        .experience-chevron,
        .certificate-modal,
        .certificate-modal-panel,
        .reveal-pending,
        .testimonial-card,
        .testimonial-quote,
        .testimonial-spotlight,
        .testimonial-form-card,
        .origin-option-inner,
        .rating-star svg,
        .preview-star {
            transition: none !important;
        }

        .animate-pulse {
            animation: none !important;
        }

        .reveal-pending {
            opacity: 1 !important;
            transform: none !important;
        }

        .testimonial-card:hover,
        .rating-star:hover svg {
            transform: none !important;
        }
    }
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

    const skillsSection = document.getElementById('skills');

    if (skillsSection) {
        const reduceSkillMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        const skillCounters = skillsSection.querySelectorAll('[data-skill-count]');
        const skillFilters = skillsSection.querySelectorAll('[data-skill-filter]');
        const skillCards = skillsSection.querySelectorAll('[data-skill-card]');

        const animateSkillCount = (counter) => {
            const target = Number(counter.dataset.skillCount) || 0;

            if (reduceSkillMotion) {
                counter.textContent = target;
                return;
            }

            const duration = 1200;
            const startedAt = performance.now();

            const tick = (now) => {
                const progress = Math.min((now - startedAt) / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                counter.textContent = Math.round(target * eased);

                if (progress < 1) {
                    requestAnimationFrame(tick);
                }
            };

            requestAnimationFrame(tick);
        };

        const revealSkills = () => {
            skillsSection.classList.add('skills-visible');
            skillCounters.forEach(animateSkillCount);
        };

        if ('IntersectionObserver' in window && !reduceSkillMotion) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        revealSkills();
                        observer.disconnect();
                    }
                });
            }, { threshold: 0.2 });

            observer.observe(skillsSection);
        } else {
            revealSkills();
        }

        const applySkillFilter = (filter) => {
            skillFilters.forEach((button) => {
                const active = button.dataset.skillFilter === filter;
                button.classList.toggle('is-active', active);
                button.setAttribute('aria-pressed', active ? 'true' : 'false');
            });

            skillCards.forEach((card) => {
                const visible = filter === 'all' || card.dataset.category === filter;
                card.classList.toggle('is-filtered', !visible);

                if (visible && !reduceSkillMotion && card.animate) {
                    card.animate([
                        { opacity: 0, transform: 'translateY(10px) scale(0.98)' },
                        { opacity: 1, transform: 'translateY(0) scale(1)' }
                    ], { duration: 280, easing: 'cubic-bezier(0.22, 1, 0.36, 1)' });
                }
            });
        };

        skillFilters.forEach((button) => {
            button.addEventListener('click', () => applySkillFilter(button.dataset.skillFilter));
        });
    }

    const experienceItems = document.querySelectorAll('[data-experience-item]');

    experienceItems.forEach((item) => {
        const toggle = item.querySelector('.experience-toggle');
        const panel = item.querySelector('.experience-panel');

        toggle?.addEventListener('click', () => {
            const willOpen = !item.classList.contains('is-open');

            experienceItems.forEach((other) => {
                other.classList.remove('is-open');
                other.querySelector('.experience-toggle')?.setAttribute('aria-expanded', 'false');
                other.querySelector('.experience-panel')?.setAttribute('aria-hidden', 'true');
            });

            if (willOpen) {
                item.classList.add('is-open');
                toggle.setAttribute('aria-expanded', 'true');
                panel?.setAttribute('aria-hidden', 'false');
            }
        });
    });

    const certificateModal = document.getElementById('certificateModal');

    if (certificateModal) {
        if (certificateModal.parentElement !== document.body) {
            document.body.appendChild(certificateModal);
        }

        const modalImage = document.getElementById('certificateModalImage');
        const modalPlaceholder = document.getElementById('certificateModalPlaceholder');
        const modalType = document.getElementById('certificateModalType');
        const modalTitle = document.getElementById('certificateModalTitle');
        const modalIssuer = document.getElementById('certificateModalIssuer');
        const modalYear = document.getElementById('certificateModalYear');
        const modalClose = document.getElementById('certificateModalClose');
        let lastFocusedElement = null;

        const openCertificateModal = (card) => {
            const image = card.dataset.certificateImage;
            const title = card.dataset.certificateTitle || 'Sertifikat';
            const issuer = card.dataset.certificateIssuer;
            const year = card.dataset.certificateYear;
            const type = card.dataset.certificateType || 'Sertifikat';

            if (image) {
                modalImage.src = image;
                modalImage.alt = title;
                modalImage.style.display = 'block';
                modalPlaceholder.style.display = 'none';
            } else {
                modalImage.removeAttribute('src');
                modalImage.alt = '';
                modalImage.style.display = 'none';
                modalPlaceholder.style.display = 'flex';
            }

            modalType.textContent = type;
            modalTitle.textContent = title;
            modalIssuer.textContent = issuer || '';
            modalIssuer.style.display = issuer ? 'block' : 'none';
            modalYear.textContent = year || '';
            modalYear.style.display = year ? 'block' : 'none';

            lastFocusedElement = document.activeElement;
            certificateModal.classList.add('is-open');
            certificateModal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
            modalClose?.focus();
        };

        const closeCertificateModal = () => {
            certificateModal.classList.remove('is-open');
            certificateModal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
            lastFocusedElement?.focus();
        };

        document.querySelectorAll('[data-certificate-card]').forEach((card) => {
            card.addEventListener('click', () => openCertificateModal(card));
        });

        certificateModal.querySelectorAll('[data-certificate-close]').forEach((trigger) => {
            trigger.addEventListener('click', closeCertificateModal);
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && certificateModal.classList.contains('is-open')) {
                closeCertificateModal();
            }
        });
    }

    const revealTargets = document.querySelectorAll('[data-reveal]');
    const reduceRevealMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (revealTargets.length && !reduceRevealMotion && 'IntersectionObserver' in window) {
        const revealTarget = (target) => {
            if (!target.classList.contains('reveal-pending') || target.classList.contains('reveal-in')) return;

            target.classList.add('reveal-in');
            revealObserver.unobserve(target);

            window.setTimeout(() => {
                target.classList.remove('reveal-pending', 'reveal-in');
            }, 1200);
        };

        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) revealTarget(entry.target);
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        revealTargets.forEach((target) => {
            target.classList.add('reveal-pending');
            revealObserver.observe(target);
        });

        const revealVisibleNow = () => {
            revealTargets.forEach((target) => {
                const rect = target.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) revealTarget(target);
            });
        };

        window.requestAnimationFrame(() => window.requestAnimationFrame(revealVisibleNow));
        window.addEventListener('load', revealVisibleNow, { once: true });
        window.addEventListener('hashchange', () => window.setTimeout(revealVisibleNow, 350));
    }

    const testimonialCards = document.querySelectorAll('[data-testimonial-card]');

    if (testimonialCards.length && !reduceRevealMotion && window.matchMedia('(hover: hover)').matches) {
        testimonialCards.forEach((card) => {
            card.addEventListener('pointermove', (event) => {
                const rect = card.getBoundingClientRect();
                card.style.setProperty('--spot-x', `${event.clientX - rect.left}px`);
                card.style.setProperty('--spot-y', `${event.clientY - rect.top}px`);
            });

            card.addEventListener('pointerleave', () => {
                card.style.removeProperty('--spot-x');
                card.style.removeProperty('--spot-y');
            });
        });
    }

    const testimonialForm = document.getElementById('testimonialForm');

    if (testimonialForm) {
        const nameInput = document.getElementById('testimonialName');
        const roleInput = document.getElementById('testimonialRole');
        const messageInput = document.getElementById('testimonialMessage');
        const ratingInput = testimonialForm.querySelector('[data-rating-input]');
        const ratingStars = [...testimonialForm.querySelectorAll('[data-rating-star]')];
        const ratingLabel = testimonialForm.querySelector('[data-rating-label]');
        const originInputs = [...testimonialForm.querySelectorAll('input[name="origin"]')];
        const messageCounter = testimonialForm.querySelector('[data-message-counter]');
        const messageCount = testimonialForm.querySelector('[data-message-count]');
        const previewName = testimonialForm.querySelector('[data-preview-name]');
        const previewInitial = testimonialForm.querySelector('[data-preview-initial]');
        const previewRole = testimonialForm.querySelector('[data-preview-role]');
        const previewOrigin = testimonialForm.querySelector('[data-preview-origin]');
        const previewStars = [...testimonialForm.querySelectorAll('[data-preview-star]')];
        const previewMessage = testimonialForm.querySelector('[data-preview-message]');
        const submitButton = testimonialForm.querySelector('button[type="submit"]');
        const submitLabel = submitButton?.querySelector('[data-submit-label]');
        const originLabels = { guru: 'Guru', teman: 'Teman', pengguna: 'Pengguna', plk: 'Tempat PLK' };
        const ratingLabels = { 1: 'Kurang', 2: 'Cukup', 3: 'Baik', 4: 'Sangat Baik', 5: 'Luar Biasa' };

        const selectedOrigin = () => testimonialForm.querySelector('input[name="origin"]:checked')?.value || 'pengguna';
        const selectedRating = () => Number(testimonialForm.querySelector('input[name="rating"]:checked')?.value || 5);

        const paintRating = (value) => {
            ratingStars.forEach((star) => {
                star.classList.toggle('is-filled', Number(star.dataset.ratingStar) <= value);
            });
        };

        const setRatingLabel = (value) => {
            if (ratingLabel) ratingLabel.textContent = ratingLabels[value] || 'Baik';
        };

        const updateOriginState = () => {
            originInputs.forEach((input) => {
                input.closest('.origin-option')?.classList.toggle('is-active', input.checked);
            });
        };

        const updateMessageCounter = () => {
            if (!messageInput || !messageCount) return;

            const length = messageInput.value.length;
            messageCount.textContent = length;
            messageCounter?.classList.toggle('is-near-limit', length >= 900);
            messageCounter?.classList.toggle('is-limit', length >= 1000);
        };

        const updatePreview = () => {
            const name = nameInput?.value.trim() || '';
            const role = roleInput?.value.trim() || '';
            const message = messageInput?.value.trim() || '';
            const rating = selectedRating();

            if (previewName) previewName.textContent = name || 'Nama Anda';
            if (previewInitial) previewInitial.textContent = name ? name.charAt(0).toUpperCase() : '?';
            if (previewRole) previewRole.textContent = role || 'Peran Anda';
            if (previewOrigin) previewOrigin.textContent = originLabels[selectedOrigin()] || 'Pengguna';
            if (previewMessage) previewMessage.textContent = message || 'Testimoni Anda akan tampil seperti ini.';

            previewStars.forEach((star) => {
                star.classList.toggle('is-filled', Number(star.dataset.previewStar) <= rating);
            });
        };

        const syncRating = () => {
            const value = selectedRating();
            paintRating(value);
            setRatingLabel(value);
            updatePreview();
        };

        ratingStars.forEach((star) => {
            const value = Number(star.dataset.ratingStar);

            star.addEventListener('pointerenter', () => {
                paintRating(value);
                setRatingLabel(value);
            });
        });

        ratingInput?.addEventListener('pointerleave', syncRating);

        testimonialForm.querySelectorAll('input[name="rating"]').forEach((input) => {
            input.addEventListener('change', syncRating);
            input.addEventListener('focus', () => {
                const value = Number(input.value);
                paintRating(value);
                setRatingLabel(value);
            });
            input.addEventListener('blur', syncRating);
        });

        originInputs.forEach((input) => input.addEventListener('change', () => {
            updateOriginState();
            updatePreview();
        }));

        [nameInput, roleInput].forEach((input) => {
            input?.addEventListener('input', updatePreview);
        });

        messageInput?.addEventListener('input', () => {
            updateMessageCounter();
            updatePreview();
        });

        testimonialForm.addEventListener('submit', () => {
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.classList.add('cursor-wait', 'opacity-80');
            }

            if (submitLabel) submitLabel.textContent = 'Mengirim...';
        });

        updateOriginState();
        updateMessageCounter();
        syncRating();
    }
</script>

@endsection
