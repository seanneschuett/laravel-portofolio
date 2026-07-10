<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Poppins', sans-serif;
            background: #0f172a;
        }
    </style>
</head>

<body>

<section class="min-h-screen flex items-center justify-center px-6 relative overflow-hidden">

    <!-- Blur Background -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-cyan-500/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-purple-500/20 rounded-full blur-3xl"></div>

    <!-- Login Card -->
    <div class="relative z-10 w-full max-w-md">

        <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-3xl p-8 shadow-2xl">

            <!-- Title -->
            <div class="text-center mb-10">

                <h2 class="text-4xl font-bold mb-3 text-white">
                    Admin
                    <span class="bg-gradient-to-r from-cyan-400 to-purple-500 bg-clip-text text-transparent">
                        Login
                    </span>
                </h2>

                <p class="text-gray-400">
                    Welcome back, please login first.
                </p>

            </div>

            <!-- Form -->
            <form action="/admin/login" method="POST">

                @csrf

                <!-- Email -->
                <div>

                    <label class="block text-sm text-gray-300 mb-3">
                        Username
                    </label>

                    <input type="text"
                           name="username"
                           placeholder="Enter your Username"
                           class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:border-cyan-400 transition">

                </div>

                <!-- Password -->
                <div>

                    <label class="block text-sm text-gray-300 mb-3">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           placeholder="Enter your password"
                           class="w-full bg-white/5 border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-gray-500 focus:outline-none focus:border-purple-400 transition">

                </div>

                <!-- Button -->
                <button type="submit"
                        class="w-full mt-6 bg-gradient-to-r from-cyan-500 to-purple-500 hover:opacity-90 text-white py-4 rounded-2xl font-medium transition duration-300 shadow-lg">

                    Login

                </button>

            </form>

        </div>

    </div>

</section>

</body>
</html>