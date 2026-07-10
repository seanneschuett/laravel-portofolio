@extends('app')

@section('title', 'Contact')

@section('content')

<!-- Contact Section -->
<section class="min-h-screen py-28 px-6 relative overflow-hidden">

    <!-- Background Blur -->
    <div class="absolute top-0 left-0 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto relative z-10">

        <!-- Title -->
        <div class="text-center mb-16">

            <p class="text-cyan-400 uppercase tracking-[4px] text-sm font-medium mb-4">
                Contact Me
            </p>

            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Let's Work
                <span class="bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent">
                    Together
                </span>
            </h2>

            <p class="text-gray-400 max-w-2xl mx-auto">
                Have a project idea or want to collaborate?
                Feel free to contact me anytime.
            </p>

        </div>

        <!-- Contact Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            <!-- Left -->
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8">

                <h3 class="text-2xl font-bold mb-8">
                    Get In Touch
                </h3>

                <!-- Contact Item -->
                <div class="space-y-6">

                    <div class="flex items-start gap-5">

                        <div class="w-14 h-14 rounded-2xl bg-cyan-500/10 flex items-center justify-center text-cyan-400 text-2xl">
                            📧
                        </div>

                        <div>
                            <h4 class="font-semibold text-lg mb-1">
                                Email
                            </h4>

                            <p class="text-gray-400">
                                saranajila140@gmail.com
                            </p>
                        </div>

                    </div>

                    <div class="flex items-start gap-5">

                        <div class="w-14 h-14 rounded-2xl bg-purple-500/10 flex items-center justify-center text-purple-400 text-2xl">
                            📍
                        </div>

                        <div>
                            <h4 class="font-semibold text-lg mb-1">
                                Location
                            </h4>

                            <p class="text-gray-400">
                                Banjarmasin, Indonesia
                            </p>
                        </div>

                    </div>

                    <div class="flex items-start gap-5">

                        <div class="w-14 h-14 rounded-2xl bg-pink-500/10 flex items-center justify-center text-pink-400 text-2xl">
                            📱
                        </div>

                        <div>
                            <h4 class="font-semibold text-lg mb-1">
                                Phone
                            </h4>

                            <p class="text-gray-400">
                                +62 896 8139 2003
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            <!-- Right Form -->
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8">

                <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">

                    @csrf

                    @if(session('success'))
                        <div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-2xl mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Name -->
                    <div>

                        <label class="block text-sm mb-3 text-gray-300">
                            Full Name
                        </label>

                        <input type="text" name="name" required
                               placeholder="Enter your name"
                               class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:border-cyan-400 transition">

                    </div>

                    <!-- Email -->
                    <div>

                        <label class="block text-sm mb-3 text-gray-300">
                            Email Address
                        </label>

                        <input type="email" name="email" required
                               placeholder="Enter your email"
                               class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:border-cyan-400 transition">

                    </div>

                    <!-- Message -->
                    <div>

                        <label class="block text-sm mb-3 text-gray-300">
                            Message
                        </label>

                        <textarea rows="6" name="message" required
                                  placeholder="Write your message..."
                                  class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:border-cyan-400 transition resize-none"></textarea>

                    </div>

                    <!-- Button -->
                    <button type="submit"
                            class="w-full bg-gradient-to-r from-cyan-500 to-purple-500 hover:opacity-90 text-white py-4 rounded-2xl font-medium transition duration-300 shadow-lg">

                        Send Message

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection