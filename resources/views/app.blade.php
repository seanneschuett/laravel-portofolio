<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Portfolio</title>
    <link rel="icon" type="image/jpg" href="{{ asset('logo-porto.png') }}">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background: #0f172a;
            color: white;
        }

        .gradient-text{
            background: linear-gradient(to right, #38bdf8, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .glass{
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255,255,255,0.1);
        }
    </style>
</head>
<body>

    <!-- Background Blur -->
    <div class="fixed top-0 left-0 w-72 h-72 bg-cyan-500 rounded-full blur-3xl opacity-20"></div>
    <div class="fixed bottom-0 right-0 w-72 h-72 bg-purple-500 rounded-full blur-3xl opacity-20"></div>

<!-- Navbar -->
<nav class="fixed top-0 left-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-6 py-4">
        
        <div class="flex items-center justify-between bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl px-6 py-4 shadow-lg">

            <!-- Logo -->
            <a href="/" class="text-2xl font-bold">
                <span class="text-cyan-400">Sara</span>
                <span class="text-white">Dev</span>
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex items-center gap-8 text-sm font-medium text-gray-300">

                <li>
                    <a href="/" class="hover:text-cyan-400 transition duration-300">
                        Home
                    </a>
                </li>

                <li>
                    <a href="#about" class="hover:text-cyan-400 transition duration-300">
                        About
                    </a>
                </li>

                <li>
                    <a href="#projects" class="hover:text-cyan-400 transition duration-300">
                        Projects
                    </a>
                </li>

                <li>
                    <a href="/contact" class="hover:text-cyan-400 transition duration-300">
                        Contact
                    </a>
                </li>

            </ul>

            <!-- Button -->
            <a href="/contact"
               class="hidden md:block bg-cyan-500 hover:bg-cyan-400 text-white text-sm font-medium px-5 py-2 rounded-xl transition duration-300 shadow-lg shadow-cyan-500/20">
                Hire Me
            </a>

            <!-- Mobile Button -->
            <button id="menu-btn" class="md:hidden text-white text-2xl">
                ☰
            </button>

        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu"
             class="hidden md:hidden mt-3 bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-6">

            <ul class="flex flex-col gap-5 text-gray-300 font-medium">

                <li>
                    <a href="/" class="hover:text-cyan-400 transition">
                        Home
                    </a>
                </li>

                <li>
                    <a href="/about" class="hover:text-cyan-400 transition">
                        About
                    </a>
                </li>

                <li>
                    <a href="/projects" class="hover:text-cyan-400 transition">
                        Projects
                    </a>
                </li>

                <li>
                    <a href="/contact" class="hover:text-cyan-400 transition">
                        Contact
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

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

    <!-- Main Content -->
    <main class="pt-24 min-h-screen">
        @yield('content')
    </main>

    <!-- Footer -->
<footer class="relative border-t border-white/10 mt-20 overflow-hidden">

<!-- Blur Background -->
<div class="absolute top-0 left-0 w-72 h-72 bg-cyan-500/10 rounded-full blur-3xl"></div>
<div class="absolute bottom-0 right-0 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl"></div>

<div class="max-w-7xl mx-auto px-6 py-16 relative z-10">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

        <!-- Logo -->
        <div>

            <h2 class="text-3xl font-bold mb-4">
                <span class="text-cyan-400">Sara</span>Dev
            </h2>

            <p class="text-gray-400 leading-relaxed">
                Building modern and responsive websites with
                elegant design and clean user experience.
            </p>

        </div>

        <!-- Navigation -->
        <div>

            <h3 class="text-xl font-semibold mb-5">
                Navigation
            </h3>

            <ul class="space-y-3 text-gray-400">

                <li>
                    <a href="/" class="hover:text-cyan-400 transition">
                        Home
                    </a>
                </li>

                <li>
                    <a href="#about" class="hover:text-cyan-400 transition">
                        About
                    </a>
                </li>

                <li>
                    <a href="#projects" class="hover:text-cyan-400 transition">
                        Projects
                    </a>
                </li>

                <li>
                    <a href="/contact" class="hover:text-cyan-400 transition">
                        Contact
                    </a>
                </li>

            </ul>

        </div>

        <!-- Social -->
        <div>

            <h3 class="text-xl font-semibold mb-5">
                Social Media
            </h3>

            <div class="flex items-center gap-4">

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

    </div>

    <!-- Bottom -->
    <div class="border-t border-white/10 mt-12 pt-6 flex flex-col md:flex-row items-center justify-between gap-4">

        <p class="text-gray-500 text-sm">
            © 2026 SaraDev. All rights reserved.
        </p>

        <p class="text-gray-500 text-sm">
            Designed with ❤️ using Laravel & Tailwind CSS
        </p>

    </div>

</div>

</footer>

</body>
</html>