@extends('app')

@section('title', 'About')

@section('content')
<div class="max-w-5xl mx-auto py-12 px-4 sm:px-6">
    
    <!-- Title -->
    <div class="text-center mb-16 space-y-4">
        <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block">
            Profil Saya
        </span>

        <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">
            Tentang <span class="gradient-emerald-text">Sara Dev</span>
        </h2>
    </div>

    <div class="bg-white border border-slate-200/80 rounded-3xl p-8 sm:p-12 shadow-sm flex flex-col md:flex-row items-center gap-10">
        
        <div class="w-48 h-48 sm:w-64 sm:h-64 rounded-2xl overflow-hidden shrink-0 ring-4 ring-emerald-500/20 shadow-lg">
            <img src="{{ asset('images/paspoto.jpeg') }}" alt="Sara Nazilla" class="w-full h-full object-cover">
        </div>

        <div class="flex-1 space-y-5">
            <h3 class="text-2xl font-bold text-slate-900">Siapa Saya?</h3>
            <p class="text-slate-600 leading-relaxed">
                Saya adalah seorang pengembang web passionate yang berfokus pada pembuatan aplikasi web modern, responsif, dan elegan menggunakan Laravel, Tailwind CSS, dan teknologi web terkini.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200/80">
                    <h4 class="font-bold text-emerald-700 mb-1">Frontend</h4>
                    <p class="text-xs text-slate-500">HTML5, CSS3, JavaScript, Tailwind CSS, UI/UX Design</p>
                </div>
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200/80">
                    <h4 class="font-bold text-teal-700 mb-1">Backend</h4>
                    <p class="text-xs text-slate-500">PHP, Laravel Framework, MySQL Database</p>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection