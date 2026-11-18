@extends('app')

@section('title', 'Contact')

@section('content')

@php
    $contactEmail = $profile->email ?? 'saranajila140@gmail.com';
    $contactLinks = [
        'GitHub' => $profile?->linkFor('github') ?? 'https://github.com/saraa9999',
        'LinkedIn' => $profile?->linkFor('linkedin') ?? 'https://www.linkedin.com/',
        'Gmail' => 'https://mail.google.com/mail/?view=cm&fs=1&to='.urlencode($contactEmail),
        'Instagram' => $profile?->linkFor('instagram') ?? 'https://www.instagram.com/sarnzllyoon._/',
    ];
@endphp

<!-- Contact Section -->
<section class="py-12 px-4 sm:px-6 relative overflow-hidden">

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Title Header -->
        <div class="text-center mb-16 space-y-4">
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block">
                Kontak Kami
            </span>

            <h2 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                Mari Bekerja <span class="gradient-emerald-text">Sama</span>
            </h2>

            <p class="text-slate-600 max-w-xl mx-auto text-base">
                Punya ide project menarik atau ingin berkonsultasi? Jangan ragu untuk menghubungi saya kapan saja.
            </p>
        </div>

        <!-- Contact Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

            <!-- Left Info Panel (5 cols) -->
            <div class="lg:col-span-5 bg-white border border-slate-200/80 rounded-3xl p-8 shadow-sm space-y-8">

                <div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-2">
                        Hubungi Saya
                    </h3>
                    <p class="text-slate-500 text-sm">
                        Saya selalu terbuka untuk mendiskusikan peluang kerja baru dan ide-ide kreatif.
                    </p>
                </div>

                <!-- Contact Items -->
                <div class="space-y-4">
                    @foreach($contactLinks as $label => $url)
                        <a href="{{ $url }}"
                           @if(!str_starts_with($url, 'mailto:')) target="_blank" rel="noopener" @endif
                           class="flex items-center gap-5 p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-300 hover:bg-emerald-50/50 transition duration-300">
                            <div class="w-12 h-12 rounded-xl bg-emerald-100/80 text-emerald-700 flex items-center justify-center shrink-0 shadow-sm">
                                @switch($label)
                                    @case('GitHub')
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.55 0-.27-.01-1.17-.02-2.12-3.2.7-3.87-1.36-3.87-1.36-.52-1.33-1.28-1.68-1.28-1.68-1.05-.72.08-.7.08-.7 1.16.08 1.77 1.19 1.77 1.19 1.03 1.76 2.7 1.25 3.36.96.1-.75.4-1.25.73-1.54-2.55-.29-5.23-1.28-5.23-5.68 0-1.25.45-2.28 1.19-3.08-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18.92-.26 1.9-.39 2.88-.39.98 0 1.96.13 2.88.39 2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.74.8 1.19 1.83 1.19 3.08 0 4.41-2.69 5.38-5.25 5.67.41.35.78 1.05.78 2.12 0 1.53-.01 2.76-.01 3.14 0 .3.21.66.8.55A11.51 11.51 0 0023.5 12C23.5 5.65 18.35.5 12 .5z"/></svg>
                                        @break
                                    @case('LinkedIn')
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1s2.48 1.12 2.48 2.5zM.5 8h4V23h-4V8zm7.5 0h3.83v2.05h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V23h-4v-7.9c0-1.88-.03-4.3-2.62-4.3-2.62 0-3.02 2.05-3.02 4.17V23h-4V8z"/></svg>
                                        @break
                                    @case('Gmail')
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M2.25 6.75A2.25 2.25 0 014.5 4.5h15a2.25 2.25 0 012.25 2.25v10.5A2.25 2.25 0 0119.5 19.5h-15a2.25 2.25 0 01-2.25-2.25V6.75zm1.5 0v.243l8.25 5.5 8.25-5.5V6.75a.75.75 0 00-.75-.75h-15a.75.75 0 00-.75.75zm16.5 2.07l-7.72 5.147a1.5 1.5 0 01-1.66 0L3.75 8.82v8.43c0 .414.336.75.75.75h15a.75.75 0 00.75-.75V8.82z"/></svg>
                                        @break
                                    @case('Instagram')
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                        @break
                                    @default
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/></svg>
                                @endswitch
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">
                                    {{ $label }}
                                </h4>
                                <p class="text-slate-600 text-sm break-all">
                                    {{ $label === 'Gmail' ? $contactEmail : 'Buka profil '.$label }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>

            <!-- Right Form Panel (7 cols) -->
            <div class="lg:col-span-7 bg-white border border-slate-200/80 rounded-3xl p-8 sm:p-10 shadow-sm">

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">

                    @csrf

                    @if(session('success'))
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-2xl text-sm font-medium flex items-center gap-3">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Nama Lengkap
                        </label>
                        <input type="text" name="name" required
                               placeholder="Masukkan nama Anda"
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Alamat Email
                        </label>
                        <input type="email" name="email" required
                               placeholder="nama@email.com"
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition">
                    </div>

                    <!-- Message -->
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">
                            Pesan
                        </label>
                        <textarea rows="5" name="message" required
                                  placeholder="Tuliskan pesan atau detail project Anda..."
                                  class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition resize-none"></textarea>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white py-4 rounded-xl font-bold text-sm tracking-wide transition duration-300 shadow-lg shadow-emerald-600/20 hover:shadow-xl hover:shadow-emerald-600/30">
                        Kirim Pesan Sekarang
                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection