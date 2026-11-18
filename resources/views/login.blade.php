<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login | SaraDev</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
        }

        .gradient-emerald-text {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4 sm:p-6 relative overflow-hidden">

    <!-- Ambient Glow Orbs -->
    <div class="absolute top-1/4 -left-20 w-80 h-80 bg-emerald-200/40 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 -right-20 w-80 h-80 bg-teal-200/30 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Login Container -->
    <div class="relative z-10 w-full max-w-md">

        <!-- Logo Header -->
        <div class="text-center mb-8">
            <a href="/" class="inline-flex items-center gap-2 mb-3">
                <span class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-emerald-600 to-teal-400 flex items-center justify-center text-white font-extrabold text-xl shadow-lg shadow-emerald-600/30">S</span>
                <span class="text-2xl font-bold text-slate-900 tracking-tight">
                    <span class="text-emerald-600">Sara</span>Dev
                </span>
            </a>
            <p class="text-slate-500 text-sm font-medium">Panel Administrasi Portfolio</p>
        </div>

        <!-- Card -->
        <div class="bg-white border border-slate-200/80 rounded-3xl p-8 shadow-xl shadow-emerald-900/5">

            <!-- Title -->
            <div class="mb-8 text-center sm:text-left">
                <h2 class="text-2xl font-extrabold text-slate-900">
                    Admin <span class="gradient-emerald-text">Login</span>
                </h2>
                <p class="text-slate-500 text-sm mt-1">
                    Masukan kredensial Anda untuk mengelola website.
                </p>
            </div>

            <!-- Error Notification -->
            @if(session('error'))
                <div class="bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-xl text-sm font-medium mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form -->
            <form action="/admin/login" method="POST" class="space-y-5">

                @csrf

                <!-- Username -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Username
                    </label>

                    <input type="text"
                           name="username"
                           required
                           placeholder="Masukkan username"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           required
                           placeholder="••••••••"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-slate-800 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition">
                </div>

                <!-- Button -->
                <button type="submit"
                        class="w-full mt-2 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white py-3.5 rounded-xl font-bold text-sm transition duration-300 shadow-md shadow-emerald-600/20 hover:shadow-lg hover:shadow-emerald-600/30">
                    Masuk ke Dashboard
                </button>

            </form>

            <div class="mt-6 pt-6 border-t border-slate-100 text-center">
                <a href="/" class="text-xs font-semibold text-slate-500 hover:text-emerald-600 transition flex items-center justify-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
                    Kembali ke Website Utama
                </a>
            </div>

        </div>

    </div>

</body>
</html>