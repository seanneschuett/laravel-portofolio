@extends('app')

@section('title', 'Contact')

@section('content')

@php
    $contactEmail = $profile->email ?? 'saranajila140@gmail.com';
    $contactLocation = $profile->location ?? 'Banjarmasin, Indonesia';
    $contactPhone = $profile->phone ?? '+62 896 8139 2003';
    $socialLinks = collect([
        'GitHub' => $profile->github ?? null,
        'Instagram' => $profile->instagram ?? 'https://www.instagram.com/sarnzllyoon._/',
        'LinkedIn' => $profile->linkedin ?? null,
        'WhatsApp' => $profile->whatsapp ?? 'https://wa.me/6289681392003',
    ])->filter();
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
                <div class="space-y-6">

                    <!-- Email -->
                    <div class="flex items-center gap-5 p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-200 transition duration-300">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100/80 text-emerald-700 flex items-center justify-center text-xl shrink-0 shadow-sm">
                            📧
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">
                                Email
                            </h4>
                            <p class="text-slate-600 text-sm break-all">
                                {{ $contactEmail }}
                            </p>
                        </div>
                    </div>

                    <!-- Location -->
                    <div class="flex items-center gap-5 p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-200 transition duration-300">
                        <div class="w-12 h-12 rounded-xl bg-teal-100/80 text-teal-700 flex items-center justify-center text-xl shrink-0 shadow-sm">
                            📍
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">
                                Lokasi
                            </h4>
                            <p class="text-slate-600 text-sm">
                                {{ $contactLocation }}
                            </p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="flex items-center gap-5 p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-200 transition duration-300">
                        <div class="w-12 h-12 rounded-xl bg-emerald-100/80 text-emerald-700 flex items-center justify-center text-xl shrink-0 shadow-sm">
                            📱
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">
                                Telepon / WhatsApp
                            </h4>
                            <p class="text-slate-600 text-sm">
                                {{ $contactPhone }}
                            </p>
                        </div>
                    </div>

                    @if($socialLinks->isNotEmpty())
                    <div class="pt-2">
                        <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Media Sosial</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach($socialLinks as $label => $url)
                                <a href="{{ $url }}" target="_blank" class="px-3 py-1.5 rounded-lg bg-emerald-50 border border-emerald-100 text-emerald-700 text-xs font-semibold hover:bg-emerald-600 hover:text-white transition">
                                    {{ $label }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>

                <div class="pt-4 border-t border-slate-100">
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Waktu Respon</p>
                    <p class="text-sm text-slate-600 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Biasa membalas dalam waktu kurang dari 24 jam
                    </p>
                    <a href="/#testimoni" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700 mt-3">
                        Ingin memberi kesan & pesan? Tulis testimoni <span>→</span>
                    </a>
                </div>

            </div>

            <!-- Right Form Panel (7 cols) -->
            <div class="lg:col-span-7 bg-white border border-slate-200/80 rounded-3xl p-8 sm:p-10 shadow-sm">

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">

                    @csrf

                    @if(session('success'))
                        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 p-4 rounded-2xl text-sm font-medium flex items-center gap-3">
                            <span class="text-lg">✓</span>
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