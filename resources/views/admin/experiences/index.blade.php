@extends('admin.layout')

@section('title', 'Admin - Experience')
@section('mobile_title', 'Experience')
@section('container_class', 'max-w-5xl')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Experience</h1>
        <p class="text-slate-500 text-sm mt-1">Kelola pengalaman PLK, organisasi, dan lomba</p>
    </div>

    @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-xl text-sm font-medium mb-6">{{ $errors->first() }}</div>
    @endif

    <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-sm mb-8">
        <h2 class="text-lg font-bold text-slate-900 mb-5">Tambah Experience</h2>
        <form action="/admin/experience" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tipe</label>
                    <select name="type" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                        <option value="plk">PLK</option>
                        <option value="organisasi">Organisasi</option>
                        <option value="lomba">Lomba</option>
                    </select>
                </div>
                <div class="sm:col-span-3">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Judul</label>
                    <input type="text" name="title" required
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tempat</label>
                    <input type="text" name="place"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Periode</label>
                    <input type="text" name="period" placeholder="2025 - 2026"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Urutan</label>
                    <input type="number" name="sort_order" min="0" value="0"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi</label>
                <textarea name="description" rows="3"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm resize-none"></textarea>
            </div>
            <button type="submit" class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-5 py-3 rounded-xl font-bold text-sm transition shadow-md shadow-emerald-600/20">
                Tambah
            </button>
        </form>
    </div>

    <div class="space-y-4">
        @forelse($experiences as $experience)
        <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm">
            <form action="/admin/experience/{{ $experience->id }}" method="POST" class="space-y-3">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-3">
                    <select name="type" class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                        <option value="plk" {{ $experience->type === 'plk' ? 'selected' : '' }}>PLK</option>
                        <option value="organisasi" {{ $experience->type === 'organisasi' ? 'selected' : '' }}>Organisasi</option>
                        <option value="lomba" {{ $experience->type === 'lomba' ? 'selected' : '' }}>Lomba</option>
                    </select>
                    <input type="text" name="title" value="{{ $experience->title }}" required
                        class="sm:col-span-2 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                    <input type="number" name="sort_order" value="{{ $experience->sort_order }}" min="0"
                        class="bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                    <input type="text" name="place" value="{{ $experience->place }}" placeholder="Tempat"
                        class="sm:col-span-2 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                    <input type="text" name="period" value="{{ $experience->period }}" placeholder="Periode"
                        class="sm:col-span-2 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                    <textarea name="description" rows="2" placeholder="Deskripsi"
                        class="sm:col-span-4 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm resize-none">{{ $experience->description }}</textarea>
                </div>
                <div class="flex items-center gap-4">
                    <button type="submit" class="bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200 px-5 py-2.5 rounded-xl text-xs font-semibold transition">
                        Simpan
                    </button>
                </div>
            </form>
            <form action="/admin/experience/{{ $experience->id }}" method="POST" onsubmit="return confirm('Hapus experience ini?')" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs font-semibold text-rose-600 hover:text-rose-700">Hapus experience</button>
            </form>
        </div>
        @empty
        <div class="bg-white border border-slate-200/80 rounded-2xl p-10 text-center text-slate-500 text-sm">
            Belum ada experience. Tambahkan melalui form di atas.
        </div>
        @endforelse
    </div>
@endsection
