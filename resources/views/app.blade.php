<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | SaraDev Portfolio</title>
    <link rel="icon" type="image/jpg" href="{{ asset('logo-porto.png') }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'Poppins', 'sans-serif'],
                    },
                    colors: {
                        emerald: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                        }
                    }
                }
            }
        }
    </script>

    <script>
        (function () {
            try {
                if (localStorage.getItem('theme') === 'dark') {
                    document.documentElement.classList.add('dark');
                }
            } catch (e) {}
        })();
    </script>

    <style>
        html {
            font-size: 15px;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
        }

        html.dark {
            color-scheme: dark;
        }

        html.dark body {
            background-color: #020617;
            color: #e2e8f0;
        }

        html.dark .soft-glass {
            background: rgba(15, 23, 42, 0.88);
            border-color: rgba(51, 65, 85, 0.75);
        }

        html.dark .bg-white {
            background-color: #0f172a;
        }

        html.dark .bg-white\/60 {
            background-color: rgba(15, 23, 42, 0.62);
        }

        html.dark .bg-white\/90 {
            background-color: rgba(15, 23, 42, 0.9);
        }

        html.dark .bg-slate-50 {
            background-color: #0f172a;
        }

        html.dark .bg-slate-100 {
            background-color: #1e293b;
        }

        html.dark .hover\:bg-slate-200:hover {
            background-color: #334155;
        }

        html.dark .focus\:bg-white:focus {
            background-color: #0f172a;
        }

        html.dark .border-white {
            border-color: #1e293b;
        }

        html.dark .border-slate-100 {
            border-color: #1e293b;
        }

        html.dark .border-slate-200 {
            border-color: #334155;
        }

        html.dark .border-slate-200\/60 {
            border-color: rgba(51, 65, 85, 0.6);
        }

        html.dark .border-slate-200\/80 {
            border-color: rgba(51, 65, 85, 0.8);
        }

        html.dark .text-slate-900 {
            color: #f8fafc;
        }

        html.dark .text-slate-800 {
            color: #e2e8f0;
        }

        html.dark .text-slate-700 {
            color: #cbd5e1;
        }

        html.dark .text-slate-600 {
            color: #94a3b8;
        }

        html.dark .text-slate-500 {
            color: #94a3b8;
        }

        html.dark .text-slate-400 {
            color: #64748b;
        }

        html.dark .placeholder-slate-400::placeholder {
            color: #64748b;
        }

        html.dark .bg-emerald-50 {
            background-color: rgba(16, 185, 129, 0.12);
        }

        html.dark .bg-emerald-50\/30 {
            background-color: rgba(16, 185, 129, 0.08);
        }

        html.dark .bg-emerald-100,
        html.dark .bg-emerald-100\/80 {
            background-color: rgba(16, 185, 129, 0.18);
        }

        html.dark .bg-teal-100\/80 {
            background-color: rgba(20, 184, 166, 0.18);
        }

        html.dark .bg-emerald-200\/40 {
            background-color: rgba(16, 185, 129, 0.08);
        }

        html.dark .bg-teal-200\/30 {
            background-color: rgba(20, 184, 166, 0.06);
        }

        html.dark .bg-green-200\/30 {
            background-color: rgba(34, 197, 94, 0.06);
        }

        html.dark .bg-emerald-400\/20 {
            background-color: rgba(16, 185, 129, 0.12);
        }

        html.dark .border-emerald-100 {
            border-color: rgba(16, 185, 129, 0.25);
        }

        html.dark .border-emerald-200 {
            border-color: rgba(16, 185, 129, 0.35);
        }

        html.dark .border-emerald-200\/80 {
            border-color: rgba(16, 185, 129, 0.3);
        }

        html.dark .border-emerald-300 {
            border-color: rgba(52, 211, 153, 0.45);
        }

        html.dark .border-teal-300 {
            border-color: rgba(94, 234, 212, 0.4);
        }

        html.dark .text-emerald-600 {
            color: #34d399;
        }

        html.dark .text-emerald-700 {
            color: #6ee7b7;
        }

        html.dark .text-emerald-800 {
            color: #a7f3d0;
        }

        html.dark .text-teal-700 {
            color: #5eead4;
        }

        html.dark .hover\:text-emerald-600:hover {
            color: #34d399;
        }

        html.dark .hover\:text-emerald-700:hover {
            color: #6ee7b7;
        }

        html.dark .hover\:bg-emerald-50:hover {
            background-color: rgba(16, 185, 129, 0.12);
        }

        html.dark .hover\:bg-emerald-50\/50:hover {
            background-color: rgba(16, 185, 129, 0.08);
        }

        html.dark .hover\:border-emerald-200:hover {
            border-color: rgba(16, 185, 129, 0.35);
        }

        html.dark .hover\:border-emerald-300:hover {
            border-color: rgba(52, 211, 153, 0.45);
        }

        html.dark .group:hover .group-hover\:text-emerald-600 {
            color: #34d399;
        }

        .theme-icon-sun {
            display: none;
        }

        html.dark .theme-icon-sun {
            display: block;
        }

        html.dark .theme-icon-moon {
            display: none;
        }

        .theme-label-dark {
            display: none;
        }

        html.dark .theme-label-light {
            display: none;
        }

        html.dark .theme-label-dark {
            display: inline;
        }

        @media (prefers-reduced-motion: no-preference) {
            @view-transition {
                navigation: auto;
            }

            ::view-transition-old(root) {
                animation: page-fade-out 0.18s ease both;
            }

            ::view-transition-new(root) {
                animation: page-fade-in 0.28s ease both;
            }

            main {
                animation: page-fade-in 0.35s ease both;
            }
        }

        @keyframes page-fade-in {
            from {
                opacity: 0;
                transform: translateY(6px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes page-fade-out {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }

        .gradient-emerald-text {
            background: linear-gradient(135deg, #059669 0%, #10b981 50%, #0d9488 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        html.dark .gradient-emerald-text {
            background: linear-gradient(135deg, #34d399 0%, #10b981 55%, #2dd4bf 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .soft-glass {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(226, 232, 240, 0.8);
        }

        .green-glow {
            box-shadow: 0 10px 30px -10px rgba(16, 185, 129, 0.2);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased relative min-h-screen flex flex-col justify-between">

    <!-- Ambient Background Blur Orbs (Soft Green & Mint) -->
    <div class="fixed -top-24 -left-24 w-96 h-96 bg-emerald-200/40 rounded-full blur-3xl pointer-events-none z-0"></div>
    <div class="fixed top-1/3 -right-24 w-96 h-96 bg-teal-200/30 rounded-full blur-3xl pointer-events-none z-0"></div>
    <div class="fixed -bottom-24 left-1/3 w-96 h-96 bg-green-200/30 rounded-full blur-3xl pointer-events-none z-0"></div>

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full z-50 pt-3 px-3 sm:px-5">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between soft-glass rounded-xl px-4 py-2.5 shadow-sm shadow-emerald-900/5 transition-all duration-300">

                <!-- Logo -->
                <a href="/" class="flex items-center gap-2 group">
                    <span class="w-7 h-7 rounded-lg bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white font-bold text-base shadow-md shadow-emerald-600/30 group-hover:scale-105 transition">S</span>
                    <span class="text-lg font-bold tracking-tight text-slate-900">
                        <span class="text-emerald-600">Sara</span>Dev
                    </span>
                </a>

                <!-- Desktop Menu -->
                <ul class="hidden md:flex items-center gap-4 lg:gap-6 text-sm font-medium text-slate-600">
                    <li>
                        <a href="/" class="transition duration-200 py-1 border-b-2 {{ request()->is('/') ? 'text-emerald-600 border-emerald-500' : 'border-transparent hover:text-emerald-600 hover:border-emerald-500' }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/about" class="transition duration-200 py-1 border-b-2 {{ request()->is('about') ? 'text-emerald-600 border-emerald-500' : 'border-transparent hover:text-emerald-600 hover:border-emerald-500' }}">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="/projects" class="transition duration-200 py-1 border-b-2 {{ request()->is('projects', 'projects/*') ? 'text-emerald-600 border-emerald-500' : 'border-transparent hover:text-emerald-600 hover:border-emerald-500' }}">
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="/certificates" class="transition duration-200 py-1 border-b-2 {{ request()->is('certificates') ? 'text-emerald-600 border-emerald-500' : 'border-transparent hover:text-emerald-600 hover:border-emerald-500' }}">
                            Certificates
                        </a>
                    </li>
                    <li>
                        <a href="/blog" class="transition duration-200 py-1 border-b-2 {{ request()->is('blog', 'blog/*') ? 'text-emerald-600 border-emerald-500' : 'border-transparent hover:text-emerald-600 hover:border-emerald-500' }}">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="/contact" class="transition duration-200 py-1 border-b-2 {{ request()->is('contact') ? 'text-emerald-600 border-emerald-500' : 'border-transparent hover:text-emerald-600 hover:border-emerald-500' }}">
                            Contact
                        </a>
                    </li>
                </ul>

                <!-- Button CTA -->
                <div class="hidden md:flex items-center gap-3">
                    <button type="button" data-theme-toggle
                            class="w-9 h-9 rounded-lg bg-white border border-slate-200 text-slate-700 hover:text-emerald-600 hover:border-emerald-200 flex items-center justify-center transition"
                            aria-label="Ganti mode gelap atau terang">
                        <svg class="theme-icon-moon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                        </svg>
                        <svg class="theme-icon-sun w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2M5.64 5.64l1.42 1.42m9.88 9.88l1.42 1.42M3 12h2m14 0h2M5.64 18.36l1.42-1.42m9.88-9.88l1.42-1.42M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </button>
                    <a href="/contact"
                       class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white text-xs font-semibold px-4 py-2 rounded-lg transition duration-300 shadow-md shadow-emerald-600/20 hover:shadow-lg hover:shadow-emerald-600/30 hover:-translate-y-0.5">
                        Hire Me
                    </a>
                </div>

                <!-- Mobile Button -->
                <button id="menu-btn" class="md:hidden p-2 text-slate-700 hover:text-emerald-600 focus:outline-none" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-2 soft-glass rounded-xl p-4 shadow-xl border border-slate-200">
                <ul class="flex flex-col gap-2 text-slate-700 font-medium">
                    <li>
                        <a href="/" class="block py-1.5 px-3 rounded-lg transition {{ request()->is('/') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'hover:bg-emerald-50 hover:text-emerald-600' }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/about" class="block py-1.5 px-3 rounded-lg transition {{ request()->is('about') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'hover:bg-emerald-50 hover:text-emerald-600' }}">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="/projects" class="block py-1.5 px-3 rounded-lg transition {{ request()->is('projects', 'projects/*') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'hover:bg-emerald-50 hover:text-emerald-600' }}">
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="/certificates" class="block py-1.5 px-3 rounded-lg transition {{ request()->is('certificates') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'hover:bg-emerald-50 hover:text-emerald-600' }}">
                            Certificates
                        </a>
                    </li>
                    <li>
                        <a href="/blog" class="block py-1.5 px-3 rounded-lg transition {{ request()->is('blog', 'blog/*') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'hover:bg-emerald-50 hover:text-emerald-600' }}">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="/contact" class="block py-1.5 px-3 rounded-lg transition {{ request()->is('contact') ? 'bg-emerald-50 text-emerald-700 font-semibold' : 'hover:bg-emerald-50 hover:text-emerald-600' }}">
                            Contact
                        </a>
                    </li>
                    <li>
                        <button type="button" data-theme-toggle
                                class="w-full flex items-center justify-between gap-3 py-2 px-3 rounded-lg bg-slate-100 hover:bg-slate-200 transition text-slate-700 font-medium">
                            <span>
                                <span class="theme-label-light">Mode Gelap</span>
                                <span class="theme-label-dark">Mode Terang</span>
                            </span>
                            <span class="flex items-center gap-2">
                                <svg class="theme-icon-moon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                                </svg>
                                <svg class="theme-icon-sun w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v2m0 14v2M5.64 5.64l1.42 1.42m9.88 9.88l1.42 1.42M3 12h2m14 0h2M5.64 18.36l1.42-1.42m9.88-9.88l1.42-1.42M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </span>
                        </button>
                    </li>
                    <li class="pt-2">
                        <a href="/contact" class="block text-center bg-emerald-600 text-white font-semibold py-2 rounded-lg shadow-md">
                            Hire Me
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Script Mobile Menu, Theme, Back To Top -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn?.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        mobileMenu?.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => mobileMenu.classList.add('hidden'));
        });

        document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
            button.addEventListener('click', () => {
                const isDark = document.documentElement.classList.toggle('dark');

                try {
                    localStorage.setItem('theme', isDark ? 'dark' : 'light');
                } catch (e) {}
            });
        });

    </script>

    <!-- Main Content -->
    <main class="pt-24 pb-10 relative z-10 min-h-[calc(100vh-180px)]">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="relative bg-white border-t border-slate-200/80 mt-14 pt-12 pb-8 overflow-hidden z-10">
        <!-- Ambient footer glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-24 bg-gradient-to-r from-emerald-100/40 via-teal-100/40 to-emerald-100/40 blur-2xl rounded-full"></div>

        <div class="max-w-7xl mx-auto px-5 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pb-8 border-b border-slate-100">

                <!-- Logo & Intro -->
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-7 h-7 rounded-lg bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white font-bold text-base shadow-md shadow-emerald-600/30">S</span>
                        <h2 class="text-xl font-bold text-slate-900 tracking-tight">
                            <span class="text-emerald-600">Sara</span>Dev
                        </h2>
                    </div>

                    <p class="text-slate-500 leading-relaxed text-sm max-w-sm">
                        Membangun website modern, responsif, dan elegan dengan perhatian penuh pada estetika visual & pengalaman pengguna terbaik.
                    </p>
                </div>

                <!-- Navigation -->
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900 mb-4">
                        Navigasi
                    </h3>

                    <ul class="space-y-2 text-sm text-slate-600">
                        <li>
                            <a href="/" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg> Home
                            </a>
                        </li>
                        <li>
                            <a href="/about" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg> About
                            </a>
                        </li>
                        <li>
                            <a href="/projects" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg> Projects
                            </a>
                        </li>
                        <li>
                            <a href="/certificates" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg> Certificates
                            </a>
                        </li>
                        <li>
                            <a href="/blog" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg> Blog
                            </a>
                        </li>
                        <li>
                            <a href="/cv" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg> CV Digital
                            </a>
                        </li>
                        <li>
                            <a href="/contact" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <svg class="w-3.5 h-3.5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 4.5l7.5 7.5-7.5 7.5"/></svg> Contact
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900 mb-4">
                        Media Sosial
                    </h3>

                    <div class="flex items-center gap-3">
                        <a href="{{ $layoutProfile?->linkFor('github') ?? 'https://github.com/saraa9999' }}"
                           target="_blank"
                           title="GitHub"
                           aria-label="GitHub"
                           class="w-10 h-10 rounded-lg bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-700 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition-all duration-300 shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.55 0-.27-.01-1.17-.02-2.12-3.2.7-3.87-1.36-3.87-1.36-.52-1.33-1.28-1.68-1.28-1.68-1.05-.72.08-.7.08-.7 1.16.08 1.77 1.19 1.77 1.19 1.03 1.76 2.7 1.25 3.36.96.1-.75.4-1.25.73-1.54-2.55-.29-5.23-1.28-5.23-5.68 0-1.25.45-2.28 1.19-3.08-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18.92-.26 1.9-.39 2.88-.39.98 0 1.96.13 2.88.39 2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.74.8 1.19 1.83 1.19 3.08 0 4.41-2.69 5.38-5.25 5.67.41.35.78 1.05.78 2.12 0 1.53-.01 2.76-.01 3.14 0 .3.21.66.8.55A11.51 11.51 0 0023.5 12C23.5 5.65 18.35.5 12 .5z"/></svg>
                        </a>

                        <a href="{{ $layoutProfile?->linkFor('linkedin') ?? 'https://www.linkedin.com/' }}"
                           target="_blank"
                           title="LinkedIn"
                           aria-label="LinkedIn"
                           class="w-10 h-10 rounded-lg bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-700 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition-all duration-300 shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8h4V23h-4V8zm7.5 0h3.83v2.05h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V23h-4v-7.9c0-1.88-.03-4.3-2.62-4.3-2.62 0-3.02 2.05-3.02 4.17V23h-4V8z"/></svg>
                        </a>

                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ urlencode($layoutProfile->email ?? 'saranajila140@gmail.com') }}"
                           target="_blank"
                           rel="noopener"
                           title="Gmail"
                           aria-label="Gmail"
                           class="w-10 h-10 rounded-lg bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-700 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition-all duration-300 shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M2.25 6.75A2.25 2.25 0 014.5 4.5h15a2.25 2.25 0 012.25 2.25v10.5A2.25 2.25 0 0119.5 19.5h-15a2.25 2.25 0 01-2.25-2.25V6.75zm1.5 0v.243l8.25 5.5 8.25-5.5V6.75a.75.75 0 00-.75-.75h-15a.75.75 0 00-.75.75zm16.5 2.07l-7.72 5.147a1.5 1.5 0 01-1.66 0L3.75 8.82v8.43c0 .414.336.75.75.75h15a.75.75 0 00.75-.75V8.82z"/></svg>
                        </a>

                        <a href="{{ $layoutProfile?->linkFor('instagram') ?? 'https://www.instagram.com/sarnzllyoon._/' }}"
                           target="_blank"
                           title="Instagram"
                           aria-label="Instagram"
                           class="w-10 h-10 rounded-lg bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-700 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition-all duration-300 shadow-sm">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>© 2026 <span class="font-semibold text-slate-700">SaraDev</span>. Hak cipta dilindungi.</p>
                <p class="flex items-center gap-1.5">
                    Dibuat dengan
                    <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"/></svg>
                    menggunakan Laravel & Tailwind CSS
                </p>
            </div>
        </div>
    </footer>

    <!-- Back To Top -->
    <button id="backToTop" type="button" aria-label="Kembali ke atas"
            class="fixed bottom-6 right-6 z-40 w-12 h-12 rounded-full bg-gradient-to-tr from-emerald-600 to-teal-500 text-white shadow-lg shadow-emerald-600/30 flex items-center justify-center opacity-0 translate-y-2 pointer-events-none transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
        </svg>
    </button>

    <script>
        const backToTop = document.getElementById('backToTop');

        const updateBackToTop = () => {
            const isVisible = window.scrollY > 400;
            backToTop?.classList.toggle('opacity-0', !isVisible);
            backToTop?.classList.toggle('pointer-events-none', !isVisible);
            backToTop?.classList.toggle('translate-y-2', !isVisible);
        };

        window.addEventListener('scroll', updateBackToTop, { passive: true });
        updateBackToTop();

        backToTop?.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    </script>

</body>
</html>