@php($certificate = $certificate ?? null)

<form action="{{ $certificate ? '/admin/certificates/'.$certificate->id : '/admin/certificates' }}" method="POST" class="space-y-6">
    @csrf
    @if($certificate)
        @method('PUT')
    @endif

    @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-xl text-sm font-medium">{{ $errors->first() }}</div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Tipe</label>
            <select name="type" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                <option value="sertifikat" {{ ($certificate->type ?? 'sertifikat') === 'sertifikat' ? 'selected' : '' }}>Sertifikat</option>
                <option value="prestasi" {{ ($certificate->type ?? '') === 'prestasi' ? 'selected' : '' }}>Prestasi</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Judul</label>
            <input type="text" name="title" value="{{ old('title', $certificate->title ?? '') }}" required
                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Penerbit</label>
            <input type="text" name="issuer" value="{{ old('issuer', $certificate->issuer ?? '') }}"
                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Tahun</label>
            <input type="text" name="year" value="{{ old('year', $certificate->year ?? '') }}"
                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
        </div>
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2">Gambar Sertifikat</label>
        <div id="certDropZone" class="border-2 border-dashed border-slate-200 rounded-2xl p-4 text-center cursor-pointer hover:border-emerald-500 hover:bg-emerald-50/30 transition">
            <input type="file" id="certImageInput" accept="image/*" class="hidden">
            <img id="certImagePreview" src="{{ $certificate->image ?? '' }}" alt="Preview" class="max-h-40 mx-auto rounded-xl mb-2 object-cover {{ !empty($certificate->image) ? '' : 'hidden' }}">
            <p class="text-emerald-700 font-semibold text-xs">Klik untuk upload gambar</p>
        </div>
        <input type="hidden" name="image" id="certImagePath" value="{{ $certificate->image ?? '' }}">
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2">Dokumentasi</label>
        <textarea name="documentation" rows="3"
            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm resize-none">{{ old('documentation', $certificate->documentation ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
        <textarea name="description" rows="3"
            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm resize-none">{{ old('description', $certificate->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-2">Urutan</label>
        <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $certificate->sort_order ?? 0) }}"
            class="w-full sm:w-40 bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
    </div>

    <div class="flex items-center gap-3 pt-2">
        <button type="submit" class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-6 py-3 rounded-xl font-bold text-sm transition shadow-md shadow-emerald-600/20">
            {{ $certificate ? 'Perbarui Sertifikat' : 'Simpan Sertifikat' }}
        </button>
        <a href="/admin/certificates" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-6 py-3 rounded-xl font-bold text-sm transition">Batal</a>
    </div>
</form>

@push('scripts')
    <script>
        const certDropZone = document.getElementById('certDropZone');
        const certImageInput = document.getElementById('certImageInput');
        const certImagePreview = document.getElementById('certImagePreview');
        const certImagePath = document.getElementById('certImagePath');

        certDropZone.addEventListener('click', () => certImageInput.click());
        certImageInput.addEventListener('change', (e) => {
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
                    certImagePath.value = data.path;
                    certImagePreview.src = data.url;
                    certImagePreview.classList.remove('hidden');
                }
            });
        });
    </script>
@endpush
