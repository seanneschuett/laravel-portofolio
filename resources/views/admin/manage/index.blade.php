@extends('admin.layout')

@section('title', 'Admin - Projects')
@section('mobile_title', 'Projects Portfolio')
@section('container_class', 'max-w-7xl')

@section('content')
    <!-- Header Bar -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Project Portfolio</h1>
            <p class="text-slate-500 text-sm mt-1">Kelola seluruh daftar karya dan project Anda</p>
        </div>

        <a href="/admin/projects/create"
           class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-5 py-2.5 rounded-xl font-bold text-sm transition flex items-center gap-2 shadow-md shadow-emerald-600/20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span>Tambah Project Baru</span>
        </a>
    </div>

    <!-- Projects Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($projects as $project)
        <div class="bg-white border border-slate-200/80 rounded-2xl overflow-hidden hover:border-emerald-300 hover:shadow-lg hover:shadow-emerald-600/5 transition group flex flex-col justify-between">

            <div>
                <!-- Image Cover -->
                <div class="relative aspect-video overflow-hidden bg-slate-100">
                    <img src="{{ $project->image }}"
                         alt="{{ $project->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>

                <!-- Details -->
                <div class="p-5">
                    <h2 class="text-lg font-bold text-slate-900 mb-2 line-clamp-1 group-hover:text-emerald-600 transition">{{ $project->title }}</h2>
                    <p class="text-slate-600 text-sm mb-4 line-clamp-2 leading-relaxed">{{ $project->description }}</p>

                    @php
                    $tags = is_array($project->tags) ? $project->tags : (is_string($project->tags) ? json_decode($project->tags, true) : []);
                    $tagColors = [
                        'HTML' => 'bg-orange-50 text-orange-700 border-orange-200',
                        'CSS' => 'bg-sky-50 text-sky-700 border-sky-200',
                        'JavaScript' => 'bg-amber-50 text-amber-700 border-amber-200',
                        'PHP' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                        'MySQL' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
                        'Laravel' => 'bg-rose-50 text-rose-700 border-rose-200',
                        'UI/UX Desaign' => 'bg-emerald-50 text-emerald-700 border-emerald-200'
                    ];
                    @endphp

                    @if(!empty($tags))
                    <div class="flex flex-wrap gap-1.5 mb-5">
                        @foreach($tags as $tag)
                        <span class="{{ $tagColors[$tag] ?? 'bg-emerald-50 text-emerald-700 border-emerald-200' }} text-[11px] font-medium px-2.5 py-0.5 rounded-lg border">
                            {{ $tag }}
                        </span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <!-- Actions Footer -->
            <div class="px-5 pb-5 pt-0 flex items-center gap-2">
                <button onclick="openEditModal({{ $project->id }}, '{{ addslashes($project->title) }}', '{{ addslashes($project->description) }}', '{{ addslashes($project->image) }}', '{{ addslashes($project->link) }}', '{{ json_encode($project->tags ?? []) }}')"
                    class="flex-1 bg-amber-50 hover:bg-amber-100 text-amber-700 border border-amber-200/80 py-2 rounded-xl text-xs font-semibold transition text-center">
                    Edit
                </button>
                <button onclick="openDeleteModal({{ $project->id }}, '{{ addslashes($project->title) }}')"
                    class="flex-1 bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200/80 py-2 rounded-xl text-xs font-semibold transition text-center">
                    Hapus
                </button>
            </div>

        </div>
        @endforeach
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div class="bg-white border border-slate-200 rounded-3xl w-full max-w-xl max-h-[90vh] overflow-y-auto shadow-2xl">
            <div class="sticky top-0 bg-white border-b border-slate-100 p-6 flex justify-between items-center z-10">
                <h2 class="text-xl font-bold text-slate-900">Edit Project</h2>
                <button onclick="closeEditModal()" class="text-slate-400 hover:text-slate-700 p-1.5 rounded-xl hover:bg-slate-100 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form id="editForm" method="POST" class="p-6 space-y-5">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul Project</label>
                    <input type="text" id="editTitle" name="title" required
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                    <textarea id="editDescription" name="description" rows="3" required
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm resize-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Gambar Project</label>
                    <div id="editDropZone" class="border-2 border-dashed border-slate-200 rounded-2xl p-4 text-center cursor-pointer hover:border-emerald-500 hover:bg-emerald-50/30 transition">
                        <input type="file" id="editImageInput" accept="image/*" class="hidden">
                        <div id="editUploadPrompt">
                            <img id="editCurrentImage" src="" alt="Current" class="max-h-32 mx-auto rounded-xl mb-2 object-cover">
                            <p class="text-emerald-700 font-semibold text-xs">Klik untuk ganti gambar</p>
                        </div>
                    </div>
                    <input type="hidden" id="editImage" name="image">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Link Live Project</label>
                    <input type="text" id="editLink" name="link" required
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tags / Teknologi</label>
                    <div class="flex flex-wrap gap-2" id="editTagsContainer">
                        @php $availableTags = ['HTML', 'CSS', 'JavaScript', 'PHP', 'MySQL', 'Laravel', 'UI/UX Desaign']; @endphp
                        @foreach($availableTags as $tag)
                        <label class="inline-flex items-center bg-slate-50 border border-slate-200 rounded-xl px-3 py-1.5 cursor-pointer hover:border-emerald-400 transition">
                            <input type="checkbox" name="tags[]" value="{{ $tag }}" class="sr-only peer edit-tag-checkbox">
                            <span class="text-slate-600 peer-checked:text-emerald-700 peer-checked:font-bold text-xs">{{ $tag }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="flex gap-3 pt-4 border-t border-slate-100">
                    <button type="submit" class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-6 py-3 rounded-xl font-bold text-sm transition flex-1 shadow-md shadow-emerald-600/20">
                        Perbarui Project
                    </button>
                    <button type="button" onclick="closeEditModal()" class="bg-slate-100 text-slate-700 hover:bg-slate-200 px-6 py-3 rounded-xl font-bold text-sm transition">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div class="bg-white border border-slate-200 rounded-3xl p-6 w-full max-w-sm text-center shadow-2xl">
            <div class="w-14 h-14 bg-rose-100 rounded-2xl flex items-center justify-center mx-auto mb-4 text-rose-600 font-bold text-xl">
                ⚠️
            </div>
            <h2 class="text-xl font-extrabold text-slate-900 mb-2">Hapus Project?</h2>
            <p class="text-slate-500 text-sm mb-6">Project "<span id="deleteProjectTitle" class="font-bold text-slate-800"></span>" akan dihapus secara permanen.</p>
            <form id="deleteForm" method="POST" class="flex gap-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white px-6 py-3 rounded-xl font-bold text-sm transition flex-1 shadow-md shadow-rose-600/20">
                    Ya, Hapus
                </button>
                <button type="button" onclick="closeDeleteModal()" class="bg-slate-100 text-slate-700 hover:bg-slate-200 px-6 py-3 rounded-xl font-bold text-sm transition flex-1">
                    Batal
                </button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const editDropZone = document.getElementById('editDropZone');
        const editImageInput = document.getElementById('editImageInput');
        const editCurrentImage = document.getElementById('editCurrentImage');

        editDropZone.addEventListener('click', () => editImageInput.click());
        editDropZone.addEventListener('dragover', (e) => { e.preventDefault(); editDropZone.classList.add('border-emerald-500', 'bg-emerald-50/50'); });
        editDropZone.addEventListener('dragleave', () => { editDropZone.classList.remove('border-emerald-500', 'bg-emerald-50/50'); });
        editDropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            editDropZone.classList.remove('border-emerald-500', 'bg-emerald-50/50');
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
            let parsedTags = [];
            try { parsedTags = typeof tags === 'string' ? JSON.parse(tags) : tags; } catch(e) {}
            document.querySelectorAll('.edit-tag-checkbox').forEach(checkbox => { checkbox.checked = Array.isArray(parsedTags) && parsedTags.includes(checkbox.value); });
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
@endpush
