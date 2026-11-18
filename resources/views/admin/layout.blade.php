<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') | SaraDev</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        .sidebar { transition: transform 0.3s ease; }
        @media (max-width: 1023px) {
            .sidebar { transform: translateX(-100%); position: fixed; z-index: 50; }
            .sidebar.active { transform: translateX(0); }
        }
        .overlay { opacity: 0; visibility: hidden; transition: all 0.3s ease; }
        .overlay.active { opacity: 1; visibility: visible; }
    </style>
    @stack('head')
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex">

    <!-- Mobile Header -->
    <header class="lg:hidden fixed top-0 left-0 right-0 z-40 bg-white/95 backdrop-blur border-b border-slate-200 px-4 py-3 flex items-center justify-between shadow-sm">
        <button onclick="toggleSidebar()" class="p-2 hover:bg-slate-100 rounded-xl text-slate-700 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        <span class="font-bold text-slate-900">@yield('mobile_title', 'Admin Panel')</span>
        <div class="w-10"></div>
    </header>

    <!-- Overlay -->
    <div id="overlay" class="overlay fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-40 lg:hidden" onclick="toggleSidebar()"></div>

    @include('admin.partials.sidebar')

    <!-- Main Content -->
    <main class="flex-1 min-h-screen pt-16 lg:pt-0 overflow-y-auto">
        @php($containerClass = trim($__env->yieldContent('container_class')) ?: 'max-w-7xl')
        <div class="p-6 lg:p-10 {{ $containerClass }} mx-auto">

            @if(session('success'))
                <div id="admin-success-message" class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl mb-6 text-sm font-medium flex items-center gap-2">
                    <span>✓</span> {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('overlay').classList.toggle('active');
        }

        setTimeout(() => {
            const msg = document.getElementById('admin-success-message');
            if (msg) msg.style.display = 'none';
        }, 4000);
    </script>
    @stack('scripts')
</body>
</html>
