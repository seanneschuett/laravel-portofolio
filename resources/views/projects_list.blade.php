@extends('app')

@section('title', 'Projects')

@section('content')

<!-- Projects Section -->
<section class="py-12 px-4 sm:px-6 relative">

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Title -->
        <div class="text-center mb-12 space-y-4">
            <span class="px-4 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold uppercase tracking-wider inline-block">
                Semua Karya
            </span>

            <h2 class="text-4xl sm:text-5xl font-extrabold text-slate-900 tracking-tight">
                Daftar <span class="gradient-emerald-text">Project</span>
            </h2>

            <p class="text-slate-600 max-w-2xl mx-auto text-base">
                Kumpulan project yang telah saya kembangkan dengan struktur rapi, responsif, dan tampilan modern.
            </p>
        </div>

        <!-- Search & Filter -->
        <form action="/projects" method="GET" class="bg-white border border-slate-200/80 rounded-3xl p-5 sm:p-6 shadow-sm mb-10">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <div class="md:col-span-7">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Cari Project</label>
                    <input type="text" name="q" value="{{ $search }}" placeholder="Cari judul, deskripsi, atau teknologi..."
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                </div>

                <div class="md:col-span-5">
                    <label class="block text-xs font-semibold uppercase tracking-wider text-slate-500 mb-2">Teknologi</label>
                    <select name="tech" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-slate-800 focus:bg-white focus:outline-none focus:border-emerald-500 transition text-sm">
                        <option value="">Semua Teknologi</option>
                        @foreach($technologies as $technology)
                            <option value="{{ $technology }}" {{ $tech === $technology ? 'selected' : '' }}>{{ $technology }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-3 mt-4">
                <button type="submit" class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-6 py-2.5 rounded-xl font-bold text-sm transition shadow-md shadow-emerald-600/20">
                    Terapkan Filter
                </button>
                @if($search !== '' || $tech !== '')
                    <a href="/projects" class="bg-slate-100 hover:bg-slate-200 text-slate-700 px-5 py-2.5 rounded-xl font-semibold text-sm transition">
                        Reset
                    </a>
                @endif
                <span class="text-xs text-slate-500 ml-auto">{{ $projects->count() }} project ditemukan</span>
            </div>
        </form>

        @if($projects->isEmpty())
            <div class="bg-white border border-slate-200/80 rounded-3xl p-12 text-center text-slate-500 text-sm">
                Tidak ada project yang sesuai dengan pencarian atau filter Anda.
            </div>
        @else
        <!-- Project Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($projects as $project)

            <div class="group bg-white border border-slate-200/80 rounded-3xl overflow-hidden hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-600/10 transition duration-300 flex flex-col justify-between">

                <div>
                    <!-- Image -->
                    <div class="overflow-hidden relative h-60 bg-slate-100">
                        <img src="{{ $project->image }}"
                             alt="{{ $project->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-semibold text-emerald-700 border border-emerald-100 shadow-sm">
                            {{ $project->category ?: 'Laravel Project' }}
                        </span>
                        @if($project->is_featured)
                            <span class="absolute top-4 left-4 bg-amber-400 text-amber-900 px-3 py-1 rounded-full text-xs font-bold shadow-sm">
                                Featured
                            </span>
                        @endif
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-slate-900 group-hover:text-emerald-600 transition mb-3">
                            {{ $project->title }}
                        </h3>

                        <p class="text-slate-600 text-sm leading-relaxed mb-6">
                            {{ \Illuminate\Support\Str::limit($project->description, 160) }}
                        </p>

                        <!-- Tech Tags -->
                        @php
                        $tagColors = [
                            'HTML' => 'bg-orange-50 text-orange-700 border-orange-200',
                            'CSS' => 'bg-sky-50 text-sky-700 border-sky-200',
                            'JavaScript' => 'bg-amber-50 text-amber-700 border-amber-200',
                            'PHP' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
                            'MySQL' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
                            'Laravel' => 'bg-rose-50 text-rose-700 border-rose-200',
                            'UI/UX Desaign' => 'bg-emerald-50 text-emerald-700 border-emerald-200'
                        ];
                        $tags = is_array($project->tags) ? $project->tags : (is_string($project->tags) ? json_decode($project->tags, true) : []);
                        @endphp

                        @if(!empty($tags))
                        <div class="flex flex-wrap gap-2 mb-6">
                            @foreach($tags as $tag)
                            <span class="{{ $tagColors[$tag] ?? 'bg-emerald-50 text-emerald-700 border-emerald-200' }} text-xs font-medium px-3 py-1 rounded-lg border">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Button Link -->
                <div class="px-6 pb-6 pt-0 flex items-center justify-between gap-3">
                    <a href="/projects/{{ $project->id }}"
                       class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-600 hover:text-emerald-700 transition">
                        <span>Lihat Detail</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                    <button type="button"
                            class="preview-project text-xs font-semibold text-slate-500 hover:text-emerald-600 transition"
                            data-title="{{ $project->title }}"
                            data-image="{{ $project->image }}"
                            data-description="{{ \Illuminate\Support\Str::limit($project->description, 300) }}"
                            data-category="{{ $project->category ?: 'Laravel Project' }}"
                            data-tags="{{ implode('|', $tags ?? []) }}"
                            data-detail="/projects/{{ $project->id }}"
                            data-github="{{ $project->github_url }}">
                        Preview
                    </button>
                </div>

            </div>

            @endforeach

        </div>
        @endif

    </div>

</section>

<!-- Project Preview Modal -->
<div id="projectPreview" class="fixed inset-0 z-[60] hidden items-center justify-center p-4 sm:p-6" role="dialog" aria-modal="true" aria-labelledby="previewTitle">
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" data-preview-close></div>

    <div class="relative bg-white border border-slate-200/80 rounded-3xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
        <button type="button" data-preview-close aria-label="Tutup preview"
                class="absolute top-4 right-4 z-10 w-10 h-10 rounded-xl bg-white/90 border border-slate-200 text-slate-700 hover:text-emerald-600 hover:border-emerald-200 flex items-center justify-center transition shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <div class="h-56 sm:h-64 bg-slate-100 overflow-hidden rounded-t-3xl">
            <img id="previewImage" src="" alt="" class="w-full h-full object-cover">
        </div>

        <div class="p-6 sm:p-8">
            <span id="previewCategory" class="inline-block px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold mb-4"></span>
            <h3 id="previewTitle" class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-3"></h3>
            <p id="previewDescription" class="text-slate-600 text-sm leading-relaxed mb-5"></p>
            <div id="previewTags" class="flex flex-wrap gap-2 mb-6"></div>

            <div class="flex flex-wrap gap-3">
                <a id="previewDetail" href="#"
                   class="bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white px-5 py-2.5 rounded-xl font-semibold text-sm transition shadow-md shadow-emerald-600/20">
                    Lihat Detail
                </a>
                <a id="previewGithub" href="#" target="_blank"
                   class="bg-white border border-slate-200 hover:border-emerald-300 text-slate-700 hover:text-emerald-700 px-5 py-2.5 rounded-xl font-semibold text-sm transition shadow-sm">
                    GitHub
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
        const modal = document.getElementById('projectPreview');
        if (!modal) return;

        const image = document.getElementById('previewImage');
        const category = document.getElementById('previewCategory');
        const title = document.getElementById('previewTitle');
        const description = document.getElementById('previewDescription');
        const tagsWrap = document.getElementById('previewTags');
        const detailLink = document.getElementById('previewDetail');
        const githubLink = document.getElementById('previewGithub');

        const openPreview = (button) => {
            image.src = button.dataset.image || '';
            image.alt = button.dataset.title || '';
            category.textContent = button.dataset.category || 'Project';
            title.textContent = button.dataset.title || '';
            description.textContent = button.dataset.description || '';
            detailLink.href = button.dataset.detail || '#';

            tagsWrap.innerHTML = '';
            (button.dataset.tags || '').split('|').filter(Boolean).forEach((tag) => {
                const chip = document.createElement('span');
                chip.className = 'text-xs font-medium px-3 py-1 rounded-lg border bg-emerald-50 text-emerald-700 border-emerald-200';
                chip.textContent = tag;
                tagsWrap.appendChild(chip);
            });

            const github = button.dataset.github;
            githubLink.href = github || '#';
            githubLink.classList.toggle('hidden', !github);

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        };

        const closePreview = () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = '';
        };

        document.querySelectorAll('.preview-project').forEach((button) => {
            button.addEventListener('click', () => openPreview(button));
        });

        modal.querySelectorAll('[data-preview-close]').forEach((element) => {
            element.addEventListener('click', closePreview);
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                closePreview();
            }
        });
    })();
</script>

@endsection
