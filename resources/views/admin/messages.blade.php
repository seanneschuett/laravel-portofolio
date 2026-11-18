@extends('admin.layout')

@section('title', 'Admin - Messages')
@section('mobile_title', 'Pesan Masuk')
@section('container_class', 'max-w-7xl')

@section('content')
    <!-- Title -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Inbox Messages</h1>
            <p class="text-slate-500 text-sm mt-1">Daftar pesan yang masuk dari pengunjung melalui form kontak</p>
        </div>
    </div>

    <!-- Messages Grid -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        @forelse($messages as $message)
        <div class="bg-white border border-slate-200/80 p-6 rounded-2xl shadow-sm hover:border-emerald-300 transition group flex flex-col justify-between space-y-4">

            <div class="flex flex-col sm:flex-row justify-between items-start gap-4">
                <div class="min-w-0 flex-1">
                    <h3 class="text-lg font-bold text-slate-900 truncate">{{ $message->name }}</h3>
                    <p class="text-emerald-600 text-sm font-semibold truncate">{{ $message->email }}</p>
                </div>

                <div class="flex items-center gap-3 shrink-0">
                    <span class="text-xs font-medium bg-emerald-50 text-emerald-700 px-3 py-1 rounded-full border border-emerald-100">
                        {{ $message->created_at->diffForHumans() }}
                    </span>

                    <form method="POST"
                          action="/admin/messages/{{ $message->id }}/delete"
                          onsubmit="return confirm('Hapus pesan ini?')"
                          class="inline-flex">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-slate-400 hover:text-rose-600 hover:bg-rose-50 p-1.5 rounded-lg transition"
                                title="Hapus Pesan">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="text-slate-700 text-sm leading-relaxed bg-slate-50 p-4 rounded-xl border border-slate-100 break-words">
                {{ $message->message }}
            </div>

        </div>
        @empty
        <div class="col-span-full py-20 text-center bg-white border border-slate-200/80 rounded-2xl shadow-sm">
            <div class="w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mx-auto mb-4">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z"/></svg>
            </div>
            <h3 class="text-slate-800 font-bold text-base">Belum Ada Pesan</h3>
            <p class="text-slate-500 text-sm mt-1">Pesan dari pengunjung kontak akan muncul di halaman ini.</p>
        </div>
        @endforelse
    </div>
@endsection
