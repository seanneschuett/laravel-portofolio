<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Project</title>
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
        <span class="font-semibold text-lg">Tambah Project</span>
        <div class="w-10"></div>
    </header>

    <!-- Overlay -->
    <div id="overlay" class="overlay fixed inset-0 bg-black/60 z-40 lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar fixed lg:static top-0 left-0 h-screen w-64 bg-slate-900 border-r border-white/10 z-50 flex flex-col shrink-0">
        <div class="p-6 border-b border-white/10">
            <h1 class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-purple-400 bg-clip-text text-transparent">
                Admin
            </h1>
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="/admin/projects" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-white/5 hover:text-white rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="font-medium">Projects</span>
            </a>
            <a href="/" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-white/5 hover:text-white rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                <span class="font-medium">Lihat Website</span>
            </a>
        </nav>
        <div class="p-4 border-t border-white/10">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:text-red-400 w-full rounded-xl hover:bg-red-500/10 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    <span class="font-medium">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 min-h-screen pt-16 lg:pt-0">
        <div class="p-4 md:p-6 lg:p-8 h-full">
            
            <!-- Header -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6 lg:mb-8">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold">Tambah Project</h1>
                    <p class="text-slate-400 mt-1 text-sm md:text-base">Tambahkan project baru ke portfolio</p>
                </div>
                <a href="/admin/projects"
                   class="bg-slate-800 hover:bg-slate-700 px-4 py-2 rounded-xl font-medium transition flex items-center gap-2 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali
                </a>
            </div>

            <!-- Form -->
            <div class="bg-slate-900/50 border border-white/5 rounded-2xl p-4 md:p-6 lg:p-8 max-w-2xl">
                <form action="/admin/projects/store" method="POST" class="space-y-5 md:space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Judul Project</label>
                        <input type="text" name="title" placeholder="Masukkan judul project" required
                            class="w-full bg-slate-950 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-cyan-500 focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Deskripsi</label>
                        <textarea name="description" rows="4" placeholder="Masukkan deskripsi project" required
                            class="w-full bg-slate-950 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-cyan-500 focus:outline-none transition"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Gambar Project</label>
                        <div id="dropZone" class="border-2 border-dashed border-white/20 rounded-xl p-6 md:p-8 text-center cursor-pointer hover:border-cyan-400 transition">
                            <input type="file" id="imageInput" name="image_file" accept="image/*" class="hidden">
                            <div id="uploadPrompt">
                                <svg class="w-10 h-10 text-slate-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p class="text-slate-500 text-sm mb-1">Drag & drop atau klik untuk upload</p>
                                <span class="text-cyan-400 text-sm">Browse file</span>
                            </div>
                            <div id="imagePreview" class="hidden">
                                <img id="previewImg" src="" alt="Preview" class="max-h-40 mx-auto rounded-xl mb-3">
                                <p id="fileName" class="text-slate-400 text-sm"></p>
                                <p class="text-cyan-400 text-sm mt-2">Klik untuk ganti</p>
                            </div>
                        </div>
                        <input type="hidden" name="image" id="imageUrl">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Link Project</label>
                        <input type="text" name="link" placeholder="https://..." required
                            class="w-full bg-slate-950 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-cyan-500 focus:outline-none transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-3">Tags</label>
                        <div class="flex flex-wrap gap-2">
                            @php $availableTags = ['HTML', 'CSS', 'JavaScript', 'PHP', 'MySQL', 'Laravel', 'UI/UX Desaign']; @endphp
                            @foreach($availableTags as $tag)
                            <label class="inline-flex items-center bg-slate-950 border border-white/10 rounded-lg px-4 py-2 cursor-pointer hover:border-cyan-400/50 transition">
                                <input type="checkbox" name="tags[]" value="{{ $tag }}" class="sr-only peer">
                                <span class="text-slate-400 peer-checked:text-cyan-400 text-sm">{{ $tag }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-cyan-500 to-purple-500 hover:opacity-90 py-3.5 rounded-xl font-semibold transition">
                        Simpan Project
                    </button>
                </form>
            </div>

        </div>
    </main>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('overlay').classList.toggle('active');
        }

        const dropZone = document.getElementById('dropZone');
        const imageInput = document.getElementById('imageInput');
        const uploadPrompt = document.getElementById('uploadPrompt');
        const imagePreview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const fileName = document.getElementById('fileName');
        const imageUrl = document.getElementById('imageUrl');

        dropZone.addEventListener('click', () => imageInput.click());
        dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-cyan-400', 'bg-cyan-500/10'); });
        dropZone.addEventListener('dragleave', () => { dropZone.classList.remove('border-cyan-400', 'bg-cyan-500/10'); });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-cyan-400', 'bg-cyan-500/10');
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) handleFile(file);
        });
        imageInput.addEventListener('change', (e) => { if (e.target.files[0]) handleFile(e.target.files[0]); });

        function handleFile(file) {
            const formData = new FormData();
            formData.append('image', file);
            fetch('/admin/projects/upload', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.path) {
                    imageUrl.value = data.path;
                    previewImg.src = data.url;
                    fileName.textContent = file.name;
                    uploadPrompt.classList.add('hidden');
                    imagePreview.classList.remove('hidden');
                }
            });
        }
    </script>
</body>
</html>