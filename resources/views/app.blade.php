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

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
        }

        .gradient-emerald-text {
            background: linear-gradient(135deg, #059669 0%, #10b981 50%, #0d9488 100%);
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
    <nav class="fixed top-0 left-0 w-full z-50 pt-4 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between soft-glass rounded-2xl px-6 py-3.5 shadow-sm shadow-emerald-900/5 transition-all duration-300">

                <!-- Logo -->
                <a href="/" class="flex items-center gap-2 group">
                    <span class="w-8 h-8 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white font-bold text-lg shadow-md shadow-emerald-600/30 group-hover:scale-105 transition">S</span>
                    <span class="text-xl font-bold tracking-tight text-slate-900">
                        <span class="text-emerald-600">Sara</span>Dev
                    </span>
                </a>

                <!-- Desktop Menu -->
                <ul class="hidden md:flex items-center gap-6 lg:gap-8 text-sm font-medium text-slate-600">
                    <li>
                        <a href="/" class="hover:text-emerald-600 transition duration-200 py-1 border-b-2 border-transparent hover:border-emerald-500">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/about" class="hover:text-emerald-600 transition duration-200 py-1 border-b-2 border-transparent hover:border-emerald-500">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="/projects" class="hover:text-emerald-600 transition duration-200 py-1 border-b-2 border-transparent hover:border-emerald-500">
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="/certificates" class="hover:text-emerald-600 transition duration-200 py-1 border-b-2 border-transparent hover:border-emerald-500">
                            Certificates
                        </a>
                    </li>
                    <li>
                        <a href="/blog" class="hover:text-emerald-600 transition duration-200 py-1 border-b-2 border-transparent hover:border-emerald-500">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="/contact" class="hover:text-emerald-600 transition duration-200 py-1 border-b-2 border-transparent hover:border-emerald-500">
                            Contact
                        </a>
                    </li>
                </ul>

                <!-- Button CTA -->
                <div class="hidden md:flex items-center gap-3">
                    <a href="/contact"
                       class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition duration-300 shadow-md shadow-emerald-600/20 hover:shadow-lg hover:shadow-emerald-600/30 hover:-translate-y-0.5">
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
            <div id="mobile-menu" class="hidden md:hidden mt-3 soft-glass rounded-2xl p-6 shadow-xl border border-slate-200">
                <ul class="flex flex-col gap-4 text-slate-700 font-medium">
                    <li>
                        <a href="/" class="block py-2 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-600 transition">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/about" class="block py-2 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-600 transition">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="/projects" class="block py-2 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-600 transition">
                            Projects
                        </a>
                    </li>
                    <li>
                        <a href="/certificates" class="block py-2 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-600 transition">
                            Certificates
                        </a>
                    </li>
                    <li>
                        <a href="/blog" class="block py-2 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-600 transition">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="/contact" class="block py-2 px-3 rounded-lg hover:bg-emerald-50 hover:text-emerald-600 transition">
                            Contact
                        </a>
                    </li>
                    <li class="pt-2">
                        <a href="/contact" class="block text-center bg-emerald-600 text-white font-semibold py-2.5 rounded-xl shadow-md">
                            Hire Me
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Script Mobile Menu -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn?.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <!-- Main Content -->
    <main class="pt-28 pb-12 relative z-10 min-h-[calc(100vh-200px)]">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="relative bg-white border-t border-slate-200/80 mt-20 pt-16 pb-12 overflow-hidden z-10">
        <!-- Ambient footer glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-24 bg-gradient-to-r from-emerald-100/40 via-teal-100/40 to-emerald-100/40 blur-2xl rounded-full"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 pb-12 border-b border-slate-100">

                <!-- Logo & Intro -->
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-8 h-8 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white font-bold text-lg shadow-md shadow-emerald-600/30">S</span>
                        <h2 class="text-2xl font-bold text-slate-900 tracking-tight">
                            <span class="text-emerald-600">Sara</span>Dev
                        </h2>
                    </div>

                    <p class="text-slate-500 leading-relaxed text-sm max-w-sm">
                        Membangun website modern, responsif, dan elegan dengan perhatian penuh pada estetika visual & pengalaman pengguna terbaik.
                    </p>
                </div>

                <!-- Navigation -->
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900 mb-5">
                        Navigasi
                    </h3>

                    <ul class="space-y-3 text-sm text-slate-600">
                        <li>
                            <a href="/" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <span class="text-emerald-500 text-xs">›</span> Home
                            </a>
                        </li>
                        <li>
                            <a href="/about" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <span class="text-emerald-500 text-xs">›</span> About
                            </a>
                        </li>
                        <li>
                            <a href="/projects" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <span class="text-emerald-500 text-xs">›</span> Projects
                            </a>
                        </li>
                        <li>
                            <a href="/certificates" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <span class="text-emerald-500 text-xs">›</span> Certificates
                            </a>
                        </li>
                        <li>
                            <a href="/blog" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <span class="text-emerald-500 text-xs">›</span> Blog
                            </a>
                        </li>
                        <li>
                            <a href="/cv" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <span class="text-emerald-500 text-xs">›</span> CV Digital
                            </a>
                        </li>
                        <li>
                            <a href="/contact" class="hover:text-emerald-600 transition flex items-center gap-2">
                                <span class="text-emerald-500 text-xs">›</span> Contact
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h3 class="text-sm font-bold uppercase tracking-wider text-slate-900 mb-5">
                        Media Sosial
                    </h3>

                    <div class="flex items-center gap-3">
                        <a href="https://www.instagram.com/sarnzllyoon._/"
                           target="_blank"
                           class="w-11 h-11 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-700 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition-all duration-300 shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>

                        <a href="https://wa.me/6289681392003"
                           target="_blank"
                           class="w-11 h-11 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-700 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition-all duration-300 shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>

                        <a href="https://web.telegram.org/"
                           target="_blank"
                           class="w-11 h-11 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-700 hover:bg-emerald-600 hover:text-white hover:border-emerald-600 transition-all duration-300 shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.121l-6.871 4.326-2.962-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.536-.196 1.006.128.832.941z"/></svg>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>© 2026 <span class="font-semibold text-slate-700">SaraDev</span>. Hak cipta dilindungi.</p>
                <p class="flex items-center gap-1.5">
                    Dibuat dengan <span class="text-emerald-600">♥</span> menggunakan Laravel & Tailwind CSS
                </p>
            </div>
        </div>
    </footer>

</body>
</html>