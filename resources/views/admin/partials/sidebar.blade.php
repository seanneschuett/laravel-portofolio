@php
    $items = [
        ['url' => '/admin/profile', 'match' => 'admin/profile*', 'label' => 'Profil', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z'],
        ['url' => '/admin/projects', 'match' => 'admin/projects*', 'label' => 'Kelola Projects', 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
        ['url' => '/admin/skills', 'match' => 'admin/skills*', 'label' => 'Skills', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
        ['url' => '/admin/experience', 'match' => 'admin/experience*', 'label' => 'Experience', 'icon' => 'M21 13.255A23.9 23.9 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
        ['url' => '/admin/certificates', 'match' => 'admin/certificates*', 'label' => 'Sertifikat', 'icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
        ['url' => '/admin/testimonials', 'match' => 'admin/testimonials*', 'label' => 'Testimoni', 'icon' => 'M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z'],
        ['url' => '/admin/posts', 'match' => 'admin/posts*', 'label' => 'Blog', 'icon' => 'M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z'],
        ['url' => '/admin/feedback', 'match' => 'admin/feedback*', 'label' => 'Feedback', 'icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.196-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118L2.05 10.1c-.783-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z'],
        ['url' => '/admin/messages', 'match' => 'admin/messages*', 'label' => 'Pesan Masuk', 'icon' => 'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z'],
    ];
@endphp

<aside id="sidebar" class="sidebar fixed lg:static top-0 left-0 h-screen w-64 bg-white border-r border-slate-200/80 z-50 flex flex-col shrink-0 shadow-sm">

    <!-- Brand Header -->
    <div class="p-6 border-b border-slate-100 flex items-center gap-3">
        <span class="w-9 h-9 rounded-xl bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white font-extrabold text-lg shadow-md shadow-emerald-600/30">S</span>
        <div>
            <h1 class="text-xl font-bold tracking-tight text-slate-900">
                <span class="text-emerald-600">Sara</span>Dev
            </h1>
            <span class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Admin Panel</span>
        </div>
    </div>

    <!-- Nav -->
    <nav class="flex-1 p-4 space-y-1.5 overflow-y-auto">
        @foreach($items as $item)
            @php($active = request()->is($item['match']))
            <a href="{{ $item['url'] }}"
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition text-sm {{ $active ? 'bg-emerald-50 text-emerald-700 font-semibold border-l-4 border-emerald-600' : 'text-slate-600 hover:bg-emerald-50/60 hover:text-emerald-700 font-medium' }}">
                <svg class="w-5 h-5 {{ $active ? 'text-emerald-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                </svg>
                <span>{{ $item['label'] }}</span>
            </a>
        @endforeach

        <a href="/" target="_blank" class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition font-medium text-sm">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            <span>Lihat Website Live</span>
        </a>
    </nav>

    <!-- Logout -->
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
