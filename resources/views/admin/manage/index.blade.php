<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Projects</title>
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
        <span class="font-semibold text-lg">Projects</span>
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
            <a href="/admin/projects" class="flex items-center gap-3 px-4 py-3 bg-cyan-500/20 text-cyan-400 rounded-xl">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="font-medium">Projects</span>
            </a>
            <a href="/admin/messages" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-white/5 hover:text-white rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span class="font-medium">Messages</span>
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
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 lg:mb-8">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold">My Projects</h1>
                    <p class="text-slate-400 mt-1 text-sm md:text-base">Kelola project portfolio kamu</p>
                </div>
                <a href="/admin/projects/create"
                   class="bg-gradient-to-r from-cyan-500 to-purple-500 hover:opacity-90 px-5 py-2.5 rounded-xl font-medium transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Tambah</span>
                </a>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                @foreach($projects as $project)
                <div class="bg-slate-900/50 border border-white/5 rounded-2xl overflow-hidden hover:border-white/20 transition group">
                    <div class="relative aspect-video overflow-hidden">
                        <img src="{{ $project->image }}"
                              class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
                    </div>
                    <div class="p-4 md:p-5">
                        <h2 class="text-lg font-semibold mb-2 line-clamp-1">{{ $project->title }}</h2>
                        <p class="text-slate-400 text-sm mb-4 line-clamp-2">{{ $project->description }}</p>
                        
                        @php
                        $tags = is_array($project->tags) ? $project->tags : (is_string($project->tags) ? json_decode($project->tags, true) : []);
                        $tagColors = [
                            'HTML' => 'bg-orange-500/20 text-orange-400',
                            'CSS' => 'bg-blue-500/20 text-blue-400',
                            'JavaScript' => 'bg-yellow-500/20 text-yellow-400',
                            'PHP' => 'bg-purple-500/20 text-purple-400',
                            'MySQL' => 'bg-cyan-500/20 text-cyan-400',
                            'Laravel' => 'bg-red-500/20 text-red-400',
                            'UI/UX Desaign' => 'bg-emerald-500/20 text-emerald-400'
                        ];
                        @endphp

                        @if(!empty($tags))
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($tags as $tag)
                            <span class="{{ $tagColors[$tag] ?? 'bg-slate-500/20 text-slate-400' }} text-xs px-2.5 py-1 rounded-full">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                        @endif

                        <div class="flex flex-wrap gap-2">
                            <button onclick="openEditModal({{ $project->id }}, '{{ $project->title }}', '{{ $project->description }}', '{{ $project->image }}', '{{ $project->link }}', '{{ json_encode($project->tags ?? []) }}')"
                                class="bg-yellow-500/20 hover:bg-yellow-500/30 text-yellow-400 px-3 py-2 rounded-lg text-sm font-medium transition">
                                Edit
                            </button>
                            <button onclick="openDeleteModal({{ $project->id }}, '{{ $project->title }}')"
                                class="bg-red-500/20 hover:bg-red-500/30 text-red-400 px-3 py-2 rounded-lg text-sm font-medium transition">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </main>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4">
        <div class="bg-slate-900 border border-white/10 rounded-2xl w-full max-w-xl max-h-[90vh] overflow-y-auto">
            <div class="sticky top-0 bg-slate-900 border-b border-white/10 p-4 md:p-6 flex justify-between items-center">
                <h2 class="text-xl font-bold">Edit Project</h2>
                <button onclick="closeEditModal()" class="text-slate-400 hover:text-white p-1">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form id="editForm" method="POST" class="p-4 md:p-6 space-y-5">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                
                <div>
                    <label class="block text-sm text-slate-400 mb-2">Title</label>
                    <input type="text" id="editTitle" name="title" required
                        class="w-full bg-slate-950 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-cyan-500 focus:outline-none transition">
                </div>

                <div>
                    <label class="block text-sm text-slate-400 mb-2">Description</label>
                    <textarea id="editDescription" name="description" rows="3" required
                        class="w-full bg-slate-950 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-cyan-500 focus:outline-none transition"></textarea>
                </div>

                <div>
                    <label class="block text-sm text-slate-400 mb-2">Gambar Project</label>
                    <div id="editDropZone" class="border-2 border-dashed border-white/20 rounded-xl p-4 text-center cursor-pointer hover:border-cyan-400 transition">
                        <input type="file" id="editImageInput" accept="image/*" class="hidden">
                        <div id="editUploadPrompt">
                            <img id="editCurrentImage" src="" alt="Current" class="max-h-32 mx-auto rounded-lg mb-2">
                            <p class="text-slate-500 text-sm">Klik untuk ganti gambar</p>
                        </div>
                    </div>
                    <input type="hidden" id="editImage" name="image">
                </div>

                <div>
                    <label class="block text-sm text-slate-400 mb-2">Project Link</label>
                    <input type="text" id="editLink" name="link" required
                        class="w-full bg-slate-950 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-cyan-500 focus:outline-none transition">
                </div>

                <div>
                    <label class="block text-sm text-slate-400 mb-2">Tags</label>
                    <div class="flex flex-wrap gap-2" id="editTagsContainer">
                        @php $availableTags = ['HTML', 'CSS', 'JavaScript', 'PHP', 'MySQL', 'Laravel', 'UI/UX Desaign']; @endphp
                        @foreach($availableTags as $tag)
                        <label class="inline-flex items-center bg-slate-950 border border-white/10 rounded-lg px-3 py-1.5 cursor-pointer hover:border-cyan-400/50 transition">
                            <input type="checkbox" name="tags[]" value="{{ $tag }}" class="sr-only peer edit-tag-checkbox">
                            <span class="text-slate-400 peer-checked:text-cyan-400 text-sm">{{ $tag }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <button type="submit" class="bg-gradient-to-r from-cyan-500 to-purple-500 hover:opacity-90 px-6 py-3 rounded-xl font-medium transition flex-1">
                        Update
                    </button>
                    <button type="button" onclick="closeEditModal()" class="bg-slate-800 hover:bg-slate-700 px-6 py-3 rounded-xl font-medium transition">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black/80 hidden items-center justify-center z-50 p-4">
        <div class="bg-slate-900 border border-white/10 rounded-2xl p-6 w-full max-w-sm text-center">
            <div class="w-14 h-14 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold mb-2">Hapus Project?</h2>
            <p class="text-slate-400 mb-6">Project "<span id="deleteProjectTitle"></span>" akan dihapus permanen.</p>
            <form id="deleteForm" method="GET" class="flex gap-3">
                <button type="submit" class="bg-red-500 hover:bg-red-400 px-6 py-3 rounded-xl font-medium transition flex-1">
                    Hapus
                </button>
                <button type="button" onclick="closeDeleteModal()" class="bg-slate-800 hover:bg-slate-700 px-6 py-3 rounded-xl font-medium transition flex-1">
                    Cancel
                </button>
            </form>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('overlay').classList.toggle('active');
        }

        const editDropZone = document.getElementById('editDropZone');
        const editImageInput = document.getElementById('editImageInput');
        const editCurrentImage = document.getElementById('editCurrentImage');

        editDropZone.addEventListener('click', () => editImageInput.click());
        editDropZone.addEventListener('dragover', (e) => { e.preventDefault(); editDropZone.classList.add('border-cyan-400', 'bg-cyan-500/10'); });
        editDropZone.addEventListener('dragleave', () => { editDropZone.classList.remove('border-cyan-400', 'bg-cyan-500/10'); });
        editDropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            editDropZone.classList.remove('border-cyan-400', 'bg-cyan-500/10');
            const file = e.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) handleEditFile(file);
        });
        editImageInput.addEventListener('change', (e) => { if (e.target.files[0]) handleEditFile(e.target.files[0]); });

        function handleEditFile(file) {
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
                    document.getElementById('editImage').value = data.path;
                    editCurrentImage.src = data.url;
                }
            });
        }

        function openEditModal(id, title, description, image, link, tags) {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
            document.getElementById('editForm').action = '/admin/projects/' + id + '/update';
            document.getElementById('editTitle').value = title;
            document.getElementById('editDescription').value = description;
            document.getElementById('editImage').value = image;
            document.getElementById('editLink').value = link;
            editCurrentImage.src = image;
            const parsedTags = JSON.parse(tags);
            document.querySelectorAll('.edit-tag-checkbox').forEach(checkbox => { checkbox.checked = parsedTags.includes(checkbox.value); });
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('editModal').classList.remove('flex');
        }

        function openDeleteModal(id, title) {
            document.getElementById('deleteModal').classList.remove('hidden');
            document.getElementById('deleteModal').classList.add('flex');
            document.getElementById('deleteProjectTitle').textContent = title;
            document.getElementById('deleteForm').action = '/admin/projects/' + id + '/delete';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.getElementById('deleteModal').classList.remove('flex');
        }

        document.getElementById('editModal').addEventListener('click', function(e) { if (e.target === this) closeEditModal(); });
        document.getElementById('deleteModal').addEventListener('click', function(e) { if (e.target === this) closeDeleteModal(); });
    </script>
</body>
</html>