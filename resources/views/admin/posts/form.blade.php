@php($post = $post ?? null)

<form action="{{ $post ? '/admin/posts/'.$post->id : '/admin/posts' }}" method="POST" class="space-y-6">
    @csrf
    @if($post)
        @method('PUT')
    @endif

    @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-xl text-sm font-medium">{{ $errors->first() }}</div>
    @endif

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2">Judul</label>
        <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}" required
            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Slug (opsional)</label>
            <input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}" placeholder="otomatis dari judul"
                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
        </div>
        <div class="flex items-end pb-3">
            <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                <input type="checkbox" name="is_published" value="1" class="rounded border-slate-300 text-emerald-600 focus:ring-emerald-500" {{ old('is_published', $post->is_published ?? true) ? 'checked' : '' }}>
                Publikasikan artikel
            </label>
        </div>
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2">Ringkasan</label>
        <textarea name="excerpt" rows="2"
            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm resize-none">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2">Cover</label>
        <div id="postDropZone" class="border-2 border-dashed border-slate-200 rounded-2xl p-4 text-center cursor-pointer hover:border-emerald-500 hover:bg-emerald-50/30 transition">
            <input type="file" id="postImageInput" accept="image/*" class="hidden">
            <img id="postImagePreview" src="{{ $post->cover ?? '' }}" alt="Preview" class="max-h-40 mx-auto rounded-xl mb-2 object-cover {{ !empty($post->cover) ? '' : 'hidden' }}">
            <p class="text-emerald-700 font-semibold text-xs">Klik untuk upload cover</p>
        </div>
        <input type="hidden" name="cover" id="postCoverPath" value="{{ $post->cover ?? '' }}">
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2">Konten</label>
        <textarea name="content" rows="12" required
            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">{{ old('content', $post->content ?? '') }}</textarea>
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-6 py-3 rounded-xl font-bold text-sm transition shadow-md shadow-emerald-600/20">
            {{ $post ? 'Perbarui Artikel' : 'Simpan Artikel' }}
        </button>
        <a href="/admin/posts" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-6 py-3 rounded-xl font-bold text-sm transition">Batal</a>
    </div>
</form>

@push('scripts')
    <script>
        const postDropZone = document.getElementById('postDropZone');
        const postImageInput = document.getElementById('postImageInput');
        const postImagePreview = document.getElementById('postImagePreview');
        const postCoverPath = document.getElementById('postCoverPath');

        postDropZone.addEventListener('click', () => postImageInput.click());
        postImageInput.addEventListener('change', (e) => {
            if (!e.target.files[0]) return;
            const formData = new FormData();
            formData.append('image', e.target.files[0]);
            fetch('/admin/upload/image', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.path) {
                    postCoverPath.value = data.path;
                    postImagePreview.src = data.url;
                    postImagePreview.classList.remove('hidden');
                }
            });
        });
    </script>
@endpush
