@extends('admin.layout')

@section('title', 'Admin - Skills')
@section('mobile_title', 'Skills')
@section('container_class', 'max-w-5xl')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Skills</h1>
        <p class="text-slate-500 text-sm mt-1">Kelola hard skill dan soft skill beserta persentasenya</p>
    </div>

    @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-xl text-sm font-medium mb-6">{{ $errors->first() }}</div>
    @endif

    <div class="bg-white border border-slate-200/80 rounded-3xl p-6 sm:p-8 shadow-sm mb-8">
        <h2 class="text-lg font-bold text-slate-900 mb-5">Tambah Skill</h2>
        <form action="/admin/skills" method="POST" class="grid grid-cols-1 sm:grid-cols-5 gap-4 items-end">
            @csrf
            <div class="sm:col-span-2">
                <label class="block text-sm font-semibold text-slate-700 mb-2">Nama</label>
                <input type="text" name="name" required
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Kategori</label>
                <select name="category" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
                    <option value="hard">Hard Skill</option>
                    <option value="soft">Soft Skill</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Persentase</label>
                <input type="number" name="percentage" min="0" max="100" required
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition text-sm">
            </div>
            <button type="submit" class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-5 py-3 rounded-xl font-bold text-sm transition shadow-md shadow-emerald-600/20">
                Tambah
            </button>
        </form>
    </div>

    <div class="space-y-3">
        @forelse($skills as $skill)
        <div class="bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm">
            <form action="/admin/skills/{{ $skill->id }}" method="POST" class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
                @csrf
                @method('PUT')
                <input type="text" name="name" value="{{ $skill->name }}" required
                    class="sm:col-span-4 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                <select name="category" class="sm:col-span-3 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                    <option value="hard" {{ $skill->category === 'hard' ? 'selected' : '' }}>Hard Skill</option>
                    <option value="soft" {{ $skill->category === 'soft' ? 'selected' : '' }}>Soft Skill</option>
                </select>
                <input type="number" name="percentage" value="{{ $skill->percentage }}" min="0" max="100" required
                    class="sm:col-span-2 bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                <input type="number" name="sort_order" value="{{ $skill->sort_order }}" min="0"
                    class="sm:col-span-1 bg-slate-50 border border-slate-200 rounded-xl px-3 py-2.5 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                <button type="submit" class="sm:col-span-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 border border-emerald-200 py-2.5 rounded-xl text-xs font-semibold transition">
                    Simpan
                </button>
            </form>
            <form action="/admin/skills/{{ $skill->id }}" method="POST" onsubmit="return confirm('Hapus skill ini?')" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs font-semibold text-rose-600 hover:text-rose-700">Hapus skill</button>
            </form>
        </div>
        @empty
        <div class="bg-white border border-slate-200/80 rounded-2xl p-10 text-center text-slate-500 text-sm">
            Belum ada skill. Tambahkan melalui form di atas.
        </div>
        @endforelse
    </div>
@endsection
