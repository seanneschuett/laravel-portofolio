<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Tambah Project | SaraDev</title>
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
        <span class="font-bold text-slate-900">Tambah Project</span>
        <div class="w-10"></div>
    </header>

    <!-- Overlay -->
    <div id="overlay" class="overlay fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-40 lg:hidden" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar fixed lg:static top-0 left-0 h-screen w-64 bg-white border-r border-slate-200/80 z-50 flex flex-col shrink-0 shadow-sm">
        
        <div class="p-6 border-b border-slate-100 flex items-center gap-3">
            <span class="w-9 h-9 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white font-extrabold text-lg shadow-md shadow-emerald-600/30">S</span>
            <div>
                <h1 class="text-xl font-bold tracking-tight text-slate-900">
                    <span class="text-emerald-600">Sara</span>Dev
                </h1>
                <span class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Admin Panel</span>
            </div>
        </div>

        <nav class="flex-1 p-4 space-y-1.5">
            <a href="/admin/projects" class="flex items-center gap-3 px-4 py-3 bg-emerald-50 text-emerald-700 font-semibold rounded-xl border-l-4 border-emerald-600 text-sm">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                <span>Kelola Projects</span>
            </a>

            <a href="/admin/messages" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-xl transition font-medium text-sm">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Pesan Masuk</span>
            </a>

            <a href="/" target="_blank" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition font-medium text-sm">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Lihat Website Live</span>
            </a>
        </nav>

        <div class="p-4 border-t border-slate-100">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-rose-600 hover:bg-rose-50 w-full rounded-xl transition font-medium text-sm">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 min-h-screen pt-16 lg:pt-0 overflow-y-auto">
        <div class="p-6 lg:p-10 max-w-4xl mx-auto">
            
            <!-- Header -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Tambah Project Baru</h1>
                    <p class="text-slate-500 text-sm mt-1">Tambahkan karya terbaru ke dalam daftar portfolio Anda</p>
                </div>
                <a href="/admin/projects"
                   class="bg-white border border-slate-200 hover:bg-slate-50 px-4 py-2.5 rounded-xl font-semibold transition flex items-center gap-2 text-sm text-slate-700 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    <span>Kembali</span>
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-sm">
                <form action="/admin/projects/store" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Project</label>
                        <input type="text" name="title" placeholder="Masukkan judul project" required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                        <textarea name="description" rows="4" placeholder="Tuliskan deskripsi ringkas tentang project ini..." required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm resize-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Gambar Cover Project</label>
                        <div id="dropZone" class="border-2 border-dashed border-slate-200 rounded-2xl p-6 md:p-8 text-center cursor-pointer hover:border-emerald-500 hover:bg-emerald-50/30 transition">
                            <input type="file" id="imageInput" name="image_file" accept="image/*" class="hidden">
                            
                            <div id="uploadPrompt" class="space-y-2">
                                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto text-xl">
                                    📷
                                </div>
                                <p class="text-slate-600 text-sm font-medium">Drag & drop atau klik untuk upload gambar</p>
                                <span class="inline-block text-xs font-bold text-emerald-600">Pilih File</span>
                            </div>

                            <div id="imagePreview" class="hidden">
                                <img id="previewImg" src="" alt="Preview" class="max-h-48 mx-auto rounded-xl mb-3 object-cover shadow-md">
                                <p id="fileName" class="text-slate-500 text-xs font-medium"></p>
                                <span class="inline-block text-xs font-bold text-emerald-600 mt-2">Klik untuk mengganti gambar</span>
                            </div>
                        </div>
                        <input type="hidden" name="image" id="imageUrl">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Link Live Project</label>
                        <input type="text" name="link" placeholder="https://..." required
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-3">Tags / Teknologi Digunakan</label>
                        <div class="flex flex-wrap gap-2.5">
                            @php $availableTags = ['HTML', 'CSS', 'JavaScript', 'PHP', 'MySQL', 'Laravel', 'UI/UX Desaign']; @endphp
                            @foreach($availableTags as $tag)
                            <label class="inline-flex items-center bg-slate-50 border border-slate-200 rounded-xl px-3.5 py-2 cursor-pointer hover:border-emerald-400 transition">
                                <input type="checkbox" name="tags[]" value="{{ $tag }}" class="sr-only peer">
                                <span class="text-slate-600 peer-checked:text-emerald-700 peer-checked:font-bold text-xs">{{ $tag }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex gap-3">
                        <button type="submit" class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white py-3.5 rounded-xl font-bold text-sm transition shadow-lg shadow-emerald-600/20">
                            Simpan Project
                        </button>
                    </div>
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
        dropZone.addEventListener('dragover', (e) => { e.preventDefault(); dropZone.classList.add('border-emerald-500', 'bg-emerald-50/50'); });
        dropZone.addEventListener('dragleave', () => { dropZone.classList.remove('border-emerald-500', 'bg-emerald-50/50'); });
        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('border-emerald-500', 'bg-emerald-50/50');
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