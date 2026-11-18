@extends('app')

@section('title', 'CV Digital')

@section('content')

@php
    $displayName = $profile->full_name ?? 'Sara Nazilla';
    $displayMajor = $profile->major ?? 'Web Developer & UI/UX Designer';
    $profilePhoto = $profile->photo ?? asset('images/paspoto.jpeg');
    $contactItems = collect([
        'Email' => $profile->email ?? null,
        'Telepon' => $profile->phone ?? null,
        'Lokasi' => $profile->location ?? null,
    ])->filter();
    $socialItems = collect([
        'GitHub' => $profile->github ?? null,
        'Instagram' => $profile->instagram ?? null,
        'LinkedIn' => $profile->linkedin ?? null,
    ])->filter();
@endphp

<section class="py-12 px-4 sm:px-6 relative">
    <div class="max-w-4xl mx-auto relative z-10">

        <div class="text-center mb-10 space-y-4 print:hidden">
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block">
                CV Digital
            </span>
            <h2 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                Curriculum <span class="gradient-emerald-text">Vitae</span>
            </h2>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-3 mb-8 print:hidden">
            @if($profile && $profile->cv_file)
                <a href="{{ \Illuminate\Support\Str::startsWith($profile->cv_file, ['http://', 'https://']) ? $profile->cv_file : asset($profile->cv_file) }}"
                   target="_blank"
                   class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-6 py-3 rounded-xl font-bold text-sm transition shadow-md shadow-emerald-600/20">
                    Unduh CV
                </a>
            @endif
            <button type="button" onclick="window.print()" class="bg-white border border-slate-200 hover:border-emerald-300 text-slate-700 hover:text-emerald-700 px-6 py-3 rounded-xl font-semibold text-sm transition shadow-sm">
                Cetak / Simpan PDF
            </button>
        </div>

        <div class="bg-white border border-slate-200/80 rounded-3xl p-8 sm:p-10 shadow-sm">

            <!-- Header -->
            <div class="flex flex-col sm:flex-row items-center gap-6 pb-8 border-b border-slate-100">
                <div class="w-28 h-28 rounded-2xl overflow-hidden ring-4 ring-emerald-500/20 shrink-0">
                    <img src="{{ $profilePhoto }}" alt="{{ $displayName }}" class="w-full h-full object-cover">
                </div>
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900">{{ $displayName }}</h1>
                    <p class="text-emerald-700 font-semibold mt-1">{{ $displayMajor }}</p>
                    @if($profile && $profile->school)
                        <p class="text-slate-500 text-sm mt-1">{{ $profile->class ? $profile->class.' · ' : '' }}{{ $profile->school }}</p>
                    @endif

                    @if($contactItems->isNotEmpty())
                    <div class="flex flex-wrap justify-center sm:justify-start gap-x-4 gap-y-1 mt-3 text-xs text-slate-600">
                        @foreach($contactItems as $label => $value)
                            <span>{{ $label }}: {{ $value }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            @if($profile && $profile->bio)
                <div class="py-6 border-b border-slate-100">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">Ringkasan</h2>
                    <p class="text-slate-600 text-sm leading-relaxed">{{ $profile->bio }}</p>
                </div>
            @endif

            @if($skills->isNotEmpty())
            <div class="py-6 border-b border-slate-100">
                <h2 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Keahlian</h2>
                <div class="grid sm:grid-cols-2 gap-x-8 gap-y-4">
                    @foreach($skills as $skill)
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-sm text-slate-700">{{ $skill->name }}</span>
                            <span class="text-xs font-semibold text-emerald-700">{{ $skill->percentage }}%</span>
                        </div>
                        <div class="h-1.5 bg-slate-100 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-emerald-600 to-teal-500 rounded-full" style="width: {{ max(0, min(100, $skill->percentage)) }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if($experiences->isNotEmpty())
            <div class="py-6 border-b border-slate-100">
                <h2 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Pengalaman</h2>
                <div class="space-y-4">
                    @foreach($experiences as $experience)
                    <div>
                        <div class="flex flex-wrap items-center justify-between gap-2">
                            <h3 class="font-bold text-slate-900 text-sm">{{ $experience->title }}</h3>
                            @if($experience->period)
                                <span class="text-xs text-slate-500">{{ $experience->period }}</span>
                            @endif
                        </div>
                        <p class="text-xs font-semibold text-emerald-700 mt-0.5">
                            {{ $experience->type === 'plk' ? 'PLK' : ucfirst($experience->type) }}{{ $experience->place ? ' · '.$experience->place : '' }}
                        </p>
                        @if($experience->description)
                            <p class="text-slate-600 text-sm leading-relaxed mt-1">{{ $experience->description }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if($profile && $profile->education)
            <div class="py-6 border-b border-slate-100">
                <h2 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">Pendidikan</h2>
                <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">{{ $profile->education }}</p>
            </div>
            @endif

            @if($certificates->isNotEmpty())
            <div class="py-6 border-b border-slate-100">
                <h2 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">Sertifikat & Prestasi</h2>
                <ul class="space-y-2">
                    @foreach($certificates as $certificate)
                    <li class="flex flex-wrap items-center justify-between gap-2 text-sm">
                        <span class="text-slate-700">{{ $certificate->title }}</span>
                        <span class="text-xs text-slate-500">{{ $certificate->issuer }}{{ $certificate->year ? ' · '.$certificate->year : '' }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if($profile && $profile->career_goal)
            <div class="py-6">
                <h2 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-2">Tujuan Karir</h2>
                <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">{{ $profile->career_goal }}</p>
            </div>
            @endif

            @if($socialItems->isNotEmpty())
            <div class="pt-6 border-t border-slate-100 print:hidden">
                <h2 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-3">Media Sosial</h2>
                <div class="flex flex-wrap gap-3 text-sm">
                    @foreach($socialItems as $label => $url)
                        <a href="{{ $url }}" target="_blank" class="text-emerald-600 hover:text-emerald-700 font-semibold">{{ $label }}</a>
                    @endforeach
                </div>
            </div>
            @endif

        </div>

    </div>
</section>

<style>
    @media print {
        nav, footer, .print\:hidden { display: none !important; }
        main { padding-top: 0 !important; }
        body { background: #fff !important; }
    }
</style>

@endsection
