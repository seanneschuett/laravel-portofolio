@extends('app')

@section('title', 'About')

@section('content')
<div class="max-w-4xl mx-auto py-20 px-4">
    <h2 class="text-3xl font-bold text-center mb-12">About Me</h2>
    <div class="flex flex-col md:flex-row items-center gap-8">
        <div class="w-64 h-64 bg-gray-300 rounded-full overflow-hidden">
            <img src="https://via.placeholder.com/300" alt="Profile" class="w-full h-full object-cover">
        </div>
        <div class="flex-1">
            <h3 class="text-2xl font-semibold mb-4">Siapa Saya?</h3>
            <p class="text-gray-600 mb-4">Saya adalah seorang pengembang web dengan pengalaman 3+ tahun dalam membangun aplikasi web modern menggunakan Laravel, Vue.js, dan teknologi terkini.</p>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="font-semibold">Frontend</h4>
                    <p class="text-gray-500">HTML, CSS, JavaScript, Vue.js</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h4 class="font-semibold">Backend</h4>
                    <p class="text-gray-500">PHP, Laravel, MySQL</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection