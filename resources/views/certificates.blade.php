@extends('app')

@section('title', 'Sertifikat & Prestasi')

@section('content')

<section class="py-12 px-4 sm:px-6 relative">
    <div class="max-w-7xl mx-auto relative z-10">

        <div class="text-center mb-16 space-y-4">
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block">
                Pencapaian
            </span>
            <h2 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                Sertifikat & <span class="gradient-emerald-text">Prestasi</span>
            </h2>
            <p class="text-slate-600 max-w-2xl mx-auto text-base">
                Dokumentasi sertifikat dan prestasi yang telah diraih.
            </p>
        </div>

        @if($certificates->isEmpty())
            <div class="bg-white border border-slate-200/80 rounded-3xl p-12 text-center text-slate-500 text-sm">
                Belum ada sertifikat atau prestasi yang ditambahkan.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($certificates as $certificate)
                <div class="bg-white border border-slate-200/80 rounded-3xl overflow-hidden shadow-sm hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-600/10 transition duration-300 flex flex-col">
                    <div class="aspect-video bg-slate-100">
                        @if($certificate->image)
                            <img src="{{ $certificate->image }}" alt="{{ $certificate->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-400 text-sm">Tanpa gambar</div>
                        @endif
                    </div>

                    <div class="p-6 flex-1 flex flex-col">
                        <span class="inline-block text-[11px] font-semibold px-2.5 py-0.5 rounded-lg border mb-3 {{ $certificate->type === 'prestasi' ? 'bg-amber-50 text-amber-700 border-amber-200' : 'bg-emerald-50 text-emerald-700 border-emerald-200' }}">
                            {{ ucfirst($certificate->type) }}
                        </span>

                        <h3 class="text-xl font-bold text-slate-900 mb-1">{{ $certificate->title }}</h3>
                        <p class="text-slate-500 text-sm mb-3">
                            {{ $certificate->issuer }}{{ $certificate->year ? ' · '.$certificate->year : '' }}
                        </p>

                        @if($certificate->description)
                            <p class="text-slate-600 text-sm leading-relaxed flex-1">{{ $certificate->description }}</p>
                        @endif

                        @if($certificate->documentation)
                            <p class="text-slate-500 text-xs leading-relaxed mt-4 pt-4 border-t border-slate-100">
                                {{ $certificate->documentation }}
                            </p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

@endsection
