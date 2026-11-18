@extends('admin.layout')

@section('title', 'Admin - Profil')
@section('mobile_title', 'Profil')
@section('container_class', 'max-w-4xl')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Profil Website</h1>
        <p class="text-slate-500 text-sm mt-1">Kelola biodata, kontak, dan narasi yang tampil di halaman publik</p>
    </div>

    <form action="/admin/profile" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        @if($errors->any())
            <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-xl text-sm font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
            <h2 class="text-lg font-bold text-slate-900">Identitas</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="full_name" value="{{ old('full_name', $profile->full_name) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Panggilan</label>
                    <input type="text" name="nickname" value="{{ old('nickname', $profile->nickname) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kelas</label>
                    <input type="text" name="class" value="{{ old('class', $profile->class) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Kompetensi Keahlian</label>
                    <input type="text" name="major" value="{{ old('major', $profile->major) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Sekolah</label>
                    <input type="text" name="school" value="{{ old('school', $profile->school) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Lokasi</label>
                    <input type="text" name="location" value="{{ old('location', $profile->location) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
            <h2 class="text-lg font-bold text-slate-900">Kontak & Sosial</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $profile->email) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">WhatsApp</label>
                    <input type="text" name="whatsapp" value="{{ old('whatsapp', $profile->whatsapp) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Instagram</label>
                    <input type="text" name="instagram" value="{{ old('instagram', $profile->instagram) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">GitHub</label>
                    <input type="text" name="github" value="{{ old('github', $profile->github) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">LinkedIn</label>
                    <input type="text" name="linkedin" value="{{ old('linkedin', $profile->linkedin) }}"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
            <h2 class="text-lg font-bold text-slate-900">Foto & CV</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Foto Hero (Beranda)</label>
                    <div id="photoDropZone" class="border-2 border-dashed border-slate-200 rounded-2xl p-4 text-center cursor-pointer hover:border-emerald-500 hover:bg-emerald-50/30 transition">
                        <input type="file" id="photoInput" accept="image/*" class="hidden">
                        <img id="photoPreview" src="{{ $profile->photo }}" alt="Foto" class="max-h-40 mx-auto rounded-xl mb-2 object-cover {{ $profile->photo ? '' : 'hidden' }}">
                        <p class="text-emerald-700 font-semibold text-xs">Klik untuk upload foto</p>
                    </div>
                    <input type="hidden" name="photo" id="photoPath" value="{{ $profile->photo }}">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Foto Tentang Saya</label>
                    <div id="aboutPhotoDropZone" class="border-2 border-dashed border-slate-200 rounded-2xl p-4 text-center cursor-pointer hover:border-emerald-500 hover:bg-emerald-50/30 transition">
                        <input type="file" id="aboutPhotoInput" accept="image/*" class="hidden">
                        <img id="aboutPhotoPreview" src="{{ $profile->about_photo }}" alt="Foto Tentang Saya" class="max-h-40 mx-auto rounded-xl mb-2 object-cover {{ $profile->about_photo ? '' : 'hidden' }}">
                        <p class="text-emerald-700 font-semibold text-xs">Klik untuk upload foto</p>
                    </div>
                    <input type="hidden" name="about_photo" id="aboutPhotoPath" value="{{ $profile->about_photo }}">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">File CV (PDF)</label>
                    <div class="space-y-3">
                        <input type="file" id="cvInput" accept=".pdf,.doc,.docx"
                            class="block w-full text-sm text-slate-600 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                        <input type="text" name="cv_file" id="cvPath" value="{{ $profile->cv_file }}"
                            placeholder="/storage/files/cv.pdf"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                        <p id="cvStatus" class="text-xs text-slate-500"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-sm space-y-6">
            <h2 class="text-lg font-bold text-slate-900">Narasi & Karir</h2>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Singkat (Personal Branding)</label>
                <textarea name="bio" rows="3"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm resize-none">{{ old('bio', $profile->bio) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Tentang Saya</label>
                <textarea name="about" rows="4"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm resize-none">{{ old('about', $profile->about) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Minat Teknologi</label>
                    <textarea name="interests" rows="3"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm resize-none">{{ old('interests', $profile->interests) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Pendidikan</label>
                    <textarea name="education" rows="3"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm resize-none">{{ old('education', $profile->education) }}</textarea>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Tujuan Karir</label>
                <textarea name="career_goal" rows="3"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm resize-none">{{ old('career_goal', $profile->career_goal) }}</textarea>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-8 py-3.5 rounded-xl font-bold text-sm transition shadow-lg shadow-emerald-600/20">
                Simpan Profil
            </button>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        const photoDropZone = document.getElementById('photoDropZone');
        const photoInput = document.getElementById('photoInput');
        const photoPreview = document.getElementById('photoPreview');
        const photoPath = document.getElementById('photoPath');

        photoDropZone.addEventListener('click', () => photoInput.click());
        photoInput.addEventListener('change', (e) => {
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
                    photoPath.value = data.path;
                    photoPreview.src = data.url;
                    photoPreview.classList.remove('hidden');
                }
            });
        });

        const aboutPhotoDropZone = document.getElementById('aboutPhotoDropZone');
        const aboutPhotoInput = document.getElementById('aboutPhotoInput');
        const aboutPhotoPreview = document.getElementById('aboutPhotoPreview');
        const aboutPhotoPath = document.getElementById('aboutPhotoPath');

        aboutPhotoDropZone.addEventListener('click', () => aboutPhotoInput.click());
        aboutPhotoInput.addEventListener('change', (e) => {
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
                    aboutPhotoPath.value = data.path;
                    aboutPhotoPreview.src = data.url;
                    aboutPhotoPreview.classList.remove('hidden');
                }
            });
        });

        const cvInput = document.getElementById('cvInput');
        const cvPath = document.getElementById('cvPath');
        const cvStatus = document.getElementById('cvStatus');

        cvInput.addEventListener('change', (e) => {
            if (!e.target.files[0]) return;
            const formData = new FormData();
            formData.append('file', e.target.files[0]);
            cvStatus.textContent = 'Mengunggah...';
            fetch('/admin/upload/file', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.path) {
                    cvPath.value = data.path;
                    cvStatus.textContent = 'File CV berhasil diunggah.';
                }
            });
        });
    </script>
@endpush
