@extends('admin.layout')

@section('title', 'Admin - Tambah Project')
@section('mobile_title', 'Tambah Project')
@section('container_class', 'max-w-4xl')

@section('content')
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
@endsection

@push('scripts')
    <script>
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
@endpush
