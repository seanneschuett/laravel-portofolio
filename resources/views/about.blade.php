@extends('app')

@section('title', 'About')

@section('content')
<div class="max-w-5xl mx-auto py-12 px-4 sm:px-6">

    @php
        $displayName = $profile->full_name ?? 'Sara Nazilla';
        $displayNickname = $profile->nickname ?? 'Sara';
        $profilePhoto = $profile->about_photo ?? asset('images/paspoto2.jpeg');
        $biodata = collect([
            'Nama Lengkap' => $profile->full_name ?? null,
            'Nama Panggilan' => $profile->nickname ?? null,
            'Kelas' => $profile->class ?? null,
            'Kompetensi Keahlian' => $profile->major ?? null,
            'Sekolah' => $profile->school ?? null,
            'Lokasi' => $profile->location ?? null,
            'Email' => $profile->email ?? null,
            'Telepon' => $profile->phone ?? null,
        ])->filter();
    @endphp

    <!-- Title -->
    <div class="text-center mb-16 space-y-4">
        <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block">
            Profil Saya
        </span>

        <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">
            Tentang <span class="gradient-emerald-text">{{ $displayNickname }}</span>
        </h2>
    </div>

    <div class="bg-white border border-slate-200/80 rounded-3xl p-8 sm:p-12 shadow-sm flex flex-col md:flex-row items-center gap-10">

        <div class="w-48 h-48 sm:w-64 sm:h-64 rounded-2xl overflow-hidden shrink-0 ring-4 ring-emerald-500/20 shadow-lg">
            <img src="{{ $profilePhoto }}" alt="{{ $displayName }}" class="w-full h-full object-cover">
        </div>

        <div class="flex-1 space-y-5">
            <h3 class="text-2xl font-bold text-slate-900">{{ $displayName }}</h3>

            @if($profile && $profile->bio)
                <p class="text-slate-600 leading-relaxed">{{ $profile->bio }}</p>
            @else
                <p class="text-slate-600 leading-relaxed">
                    Saya adalah seorang pengembang web passionate yang berfokus pada pembuatan aplikasi web modern, responsif, dan elegan menggunakan Laravel, Tailwind CSS, dan teknologi web terkini.
                </p>
            @endif

            @if($profile && $profile->about)
                <p class="text-slate-600 leading-relaxed">{{ $profile->about }}</p>
            @endif

            <div class="flex flex-wrap gap-3 pt-2">
                <a href="/cv" class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-6 py-3 rounded-xl font-semibold text-sm transition shadow-md shadow-emerald-600/20">
                    Lihat CV Digital
                </a>
                @if($profile && $profile->cv_file)
                    <a href="{{ \Illuminate\Support\Str::startsWith($profile->cv_file, ['http://', 'https://']) ? $profile->cv_file : asset($profile->cv_file) }}"
                       target="_blank"
                       class="bg-white border border-slate-200 hover:border-emerald-300 text-slate-700 hover:text-emerald-700 px-6 py-3 rounded-xl font-semibold text-sm transition shadow-sm">
                        Unduh CV
                    </a>
                @endif
            </div>
        </div>

    </div>

    @if($biodata->isNotEmpty())
    <!-- Biodata -->
    <div class="mt-8 bg-white border border-slate-200/80 rounded-3xl p-8 sm:p-10 shadow-sm">
        <h3 class="text-xl font-bold text-slate-900 mb-6">Biodata</h3>
        <div class="grid sm:grid-cols-2 gap-x-10 gap-y-4">
            @foreach($biodata as $label => $value)
                <div class="flex justify-between gap-4 border-b border-slate-100 pb-3">
                    <span class="text-sm text-slate-500">{{ $label }}</span>
                    <span class="text-sm font-semibold text-slate-800 text-right">{{ $value }}</span>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    @if($profile && ($profile->education || $profile->career_goal))
    <!-- Pendidikan & Tujuan -->
    <div class="mt-8 grid md:grid-cols-2 gap-6">
        @if($profile->education)
        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-sm">
            <h3 class="font-bold text-emerald-700 mb-3">Pendidikan</h3>
            <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">{{ $profile->education }}</p>
        </div>
        @endif

        @if($profile->career_goal)
        <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-sm">
            <h3 class="font-bold text-emerald-700 mb-3">Tujuan Karir</h3>
            <p class="text-slate-600 text-sm leading-relaxed whitespace-pre-line">{{ $profile->career_goal }}</p>
        </div>
        @endif
    </div>
    @endif

    @if($skills->isNotEmpty())
    <!-- Skills -->
    <div class="mt-8 bg-white border border-slate-200/80 rounded-3xl p-8 sm:p-10 shadow-sm">
        <h3 class="text-xl font-bold text-slate-900 mb-6">Keahlian</h3>
        <div class="grid md:grid-cols-2 gap-x-10 gap-y-8">
            @foreach(['hard' => 'Hard Skill', 'soft' => 'Soft Skill'] as $category => $label)
                @php $items = $skills->where('category', $category); @endphp
                @if($items->isNotEmpty())
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-wider text-slate-500 mb-4">{{ $label }}</h4>
                    <div class="space-y-4">
                        @foreach($items as $skill)
                        <div>
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-sm font-semibold text-slate-700">{{ $skill->name }}</span>
                                <span class="text-xs font-bold text-emerald-700">{{ $skill->percentage }}%</span>
                            </div>
                            <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-emerald-600 to-teal-500 rounded-full" style="width: {{ max(0, min(100, $skill->percentage)) }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    @endif

    @if($experiences->isNotEmpty())
    <!-- Pengalaman -->
    <div class="mt-8 bg-white border border-slate-200/80 rounded-3xl p-8 sm:p-10 shadow-sm">
        <h3 class="text-xl font-bold text-slate-900 mb-6">Pengalaman, Organisasi & PLK</h3>
        <div class="space-y-4">
            @foreach($experiences as $experience)
            <div class="border border-slate-100 rounded-2xl p-5">
                <div class="flex flex-wrap items-center justify-between gap-2 mb-1">
                    <span class="text-[11px] font-semibold px-2.5 py-0.5 rounded-lg border bg-emerald-50 text-emerald-700 border-emerald-200">
                        {{ $experience->type === 'plk' ? 'PLK' : ucfirst($experience->type) }}
                    </span>
                    @if($experience->period)
                        <span class="text-xs text-slate-500">{{ $experience->period }}</span>
                    @endif
                </div>
                <h4 class="font-bold text-slate-900">{{ $experience->title }}</h4>
                @if($experience->place)
                    <p class="text-emerald-700 text-xs font-semibold mt-1">{{ $experience->place }}</p>
                @endif
                @if($experience->description)
                    <p class="text-slate-600 text-sm leading-relaxed mt-2">{{ $experience->description }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection
