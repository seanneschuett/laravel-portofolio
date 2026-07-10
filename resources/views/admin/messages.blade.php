<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Messages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        .sidebar { transition: transform 0.3s ease; }
        @media (max-width: 1023px) {
            .sidebar { transform: translateX(-100%); position: fixed; z-index: 50; }
            .sidebar.active { transform: translateX(0); }
        }
        .overlay { opacity: 0; visibility: hidden; transition: all 0.3s ease; }
        .overlay.active { opacity: 1; visibility: visible; }
    </style>
</head>
<body class="bg-slate-950 text-white min-h-screen flex">

    <!-- Mobile Header -->
    <header class="lg:hidden fixed top-0 left-0 right-0 z-40 bg-slate-900/95 backdrop-blur border-b border-white/10 px-4 py-3 flex items-center justify-between">
        <button onclick="toggleSidebar()" class="p-2 hover:bg-white/10 rounded-lg transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        <span class="font-semibold text-lg">Messages</span>
        <div class="w-10"></div>
    </header>

    <!-- Overlay -->
    <div id="overlay" class="overlay fixed inset-0 bg-black/60 z-40 lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar fixed lg:static top-0 left-0 h-screen w-64 bg-slate-900 border-r border-white/10 z-50 flex flex-col shrink-0">
        <div class="p-6 border-b border-white/10">
            <h1 class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">Admin</h1>
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="/admin/projects" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-white/5 hover:text-white rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span class="font-medium">Projects</span>
            </a>
            <a href="/admin/messages" class="flex items-center gap-3 px-4 py-3 bg-cyan-500/20 text-cyan-400 rounded-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span class="font-medium">Messages</span>
            </a>
            <a href="/" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-white/5 hover:text-white rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span class="font-medium">Lihat Website</span>
            </a>
        </nav>
        <div class="p-4 border-t border-white/10">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-red-400 w-full rounded-xl hover:bg-red-500/10 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span class="font-medium">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 min-h-screen pt-16 lg:pt-0 overflow-y-auto">
        <div class="p-4 md:p-6 lg:p-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold">Inbox Messages</h1>
                    <p class="text-slate-400 mt-1 text-sm md:text-base">Pesan yang masuk dari form kontak</p>
                </div>
            </div>
            
            @if(session('success'))
                <div id="success-message" class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-xl mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 md:gap-6">
                @forelse($messages as $message)
                <div class="bg-slate-900 border border-white/5 p-4 md:p-6 rounded-2xl hover:border-white/10 transition group">
                    <div class="flex flex-col sm:flex-row justify-between items-start gap-4 mb-4">
                        <div class="min-w-0 flex-1">
                            <h3 class="text-lg font-semibold truncate">{{ $message->name }}</h3>
                            <p class="text-cyan-400 text-sm truncate">{{ $message->email }}</p>
                        </div>
                        <div class="flex items-center gap-3 shrink-0">
                            <span class="text-slate-500 text-[10px] md:text-xs bg-slate-950 px-3 py-1 rounded-full">{{ $message->created_at->diffForHumans() }}</span>
                            <a href="/admin/messages/{{ $message->id }}/delete" onclick="return confirm('Hapus pesan ini?')" class="text-slate-500 hover:text-red-400 transition p-1">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </a>
                        </div>
                    </div>
                    <div class="text-slate-300 leading-relaxed bg-slate-950 p-4 rounded-xl border border-white/5 break-words">
                        {{ $message->message }}
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 text-center text-slate-500">
                    <p>No messages received yet.</p>
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
