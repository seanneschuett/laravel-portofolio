<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Messages | SaraDev</title>
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
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex">

    <!-- Mobile Header -->
    <header class="lg:hidden fixed top-0 left-0 right-0 z-40 bg-white/95 backdrop-blur border-b border-slate-200 px-4 py-3 flex items-center justify-between shadow-sm">
        <button onclick="toggleSidebar()" class="p-2 hover:bg-slate-100 rounded-xl text-slate-700 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        <span class="font-bold text-slate-900">Pesan Masuk</span>
        <div class="w-10"></div>
    </header>

    <!-- Overlay -->
    <div id="overlay" class="overlay fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-40 lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar fixed lg:static top-0 left-0 h-screen w-64 bg-white border-r border-slate-200/80 z-50 flex flex-col shrink-0 shadow-sm">
        
        <!-- Brand Logo Header -->
        <div class="p-6 border-b border-slate-100 flex items-center gap-3">
            <span class="w-9 h-9 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white font-extrabold text-lg shadow-md shadow-emerald-600/30">S</span>
            <div>
                <h1 class="text-xl font-bold tracking-tight text-slate-900">
                    <span class="text-emerald-600">Sara</span>Dev
                </h1>
                <span class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Admin Panel</span>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 space-y-1.5">
            <a href="/admin/projects" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-xl transition font-medium text-sm">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span>Kelola Projects</span>
            </a>
            
            <a href="/admin/messages" class="flex items-center gap-3 px-4 py-3 bg-emerald-50 text-emerald-700 font-semibold rounded-xl border-l-4 border-emerald-600 text-sm">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Pesan Masuk</span>
            </a>
            
            <a href="/" target="_blank" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition font-medium text-sm">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Lihat Website Live</span>
            </a>
        </nav>

        <!-- Logout Footer -->
        <div class="p-4 border-t border-slate-100">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-rose-600 hover:bg-rose-50 w-full rounded-xl transition font-medium text-sm">
                    <svg class="w-5 h-5 text-slate-400 hover:text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Keluar</span>
                </button>
            </form>
        </div>

    </aside>

    <!-- Main Content -->
    <main class="flex-1 min-h-screen pt-16 lg:pt-0 overflow-y-auto">
        <div class="p-6 lg:p-10 max-w-7xl mx-auto">

            <!-- Title -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Inbox Messages</h1>
                    <p class="text-slate-500 text-sm mt-1">Daftar pesan yang masuk dari pengunjung melalui form kontak</p>
                </div>
            </div>
            
            @if(session('success'))
                <div id="success-message" class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-xl mb-6 text-sm font-medium flex items-center gap-2">
                    <span>✓</span> {{ session('success') }}
                </div>
            @endif

            <!-- Messages Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                @forelse($messages as $message)
                <div class="bg-white border border-slate-200/80 p-6 rounded-2xl shadow-sm hover:border-emerald-300 transition group flex flex-col justify-between space-y-4">
                    
                    <div class="flex flex-col sm:flex-row justify-between items-start gap-4">
                        <div class="min-w-0 flex-1">
                            <h3 class="text-lg font-bold text-slate-900 truncate">{{ $message->name }}</h3>
                            <p class="text-emerald-600 text-sm font-semibold truncate">{{ $message->email }}</p>
                        </div>

                        <div class="flex items-center gap-3 shrink-0">
                            <span class="text-xs font-medium bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full border border-emerald-100">
                                {{ $message->created_at->diffForHumans() }}
                            </span>

                            <a href="/admin/messages/{{ $message->id }}/delete"
                               onclick="return confirm('Hapus pesan ini?')"
                               class="text-slate-400 hover:text-rose-600 hover:bg-rose-50 p-1.5 rounded-lg transition"
                               title="Hapus Pesan">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </a>
                        </div>
                    </div>

                    <div class="text-slate-700 text-sm leading-relaxed bg-slate-50 p-4 rounded-xl border border-slate-100 break-words">
                        {{ $message->message }}
                    </div>

                </div>
                @empty
                <div class="col-span-full py-20 text-center bg-white border border-slate-200/80 rounded-2xl shadow-sm">
                    <div class="w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto mb-4 text-2xl">
                        📬
                    </div>
                    <h3 class="text-slate-800 font-bold text-base">Belum Ada Pesan</h3>
                    <p class="text-slate-500 text-sm mt-1">Pesan dari pengunjung kontak akan muncul di halaman ini.</p>
                </div>
                @endforelse
            </div>

        </div>
    </main>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('overlay').classList.toggle('active');
        }

        setTimeout(() => {
            const msg = document.getElementById('success-message');
            if (msg) msg.style.display = 'none';
        }, 4000);
    </script>
</body>
</html>
