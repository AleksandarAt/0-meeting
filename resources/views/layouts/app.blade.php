<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mijn Blog') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col">

        <!-- Navigatie -->
        <nav class="bg-indigo-700 shadow-md">
            <div class="max-w-7xl mx-auto px-6">
                <div class="flex justify-between h-16 items-center">

                    <!-- Logo / titel -->
                    <a href="{{ url('/posts') }}" class="text-2xl font-bold text-white">
                        {{ config('app.name', 'Mijn Blog') }}
                    </a>

                    <!-- Menu -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ url('/posts') }}" class="text-white font-medium hover:text-orange-400 transition duration-300">
                            📚 Alle Posts
                        </a>
                        <a href="{{ url('/posts/create') }}" class="text-white font-medium hover:text-orange-400 transition duration-300">
                            ✍️ Nieuwe Post
                        </a>

                        @auth
                            <span class="text-gray-100 font-medium">👋 {{ Auth::user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit"
                                    class="ml-2 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow-lg transition duration-300">
                                    Uitloggen
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                               class="px-4 py-2 bg-white text-indigo-700 font-semibold rounded-lg shadow-lg hover:bg-gray-200 transition duration-300">
                                Inloggen
                            </a>
                            <a href="{{ route('register') }}"
                               class="px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg shadow-lg hover:bg-orange-600 transition duration-300">
                                Registreren
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Flash messages -->
        @if(session('success'))
            <div class="max-w-7xl mx-auto mt-4 px-4">
                <div class="p-4 bg-green-100 border border-green-400 text-green-800 rounded-lg shadow">
                    ✅ {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Pagina inhoud -->
        <main class="flex-grow max-w-7xl mx-auto py-10 px-6 sm:px-8">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-indigo-800 text-center py-6 text-sm text-gray-100">
            &copy; {{ date('Y') }} - <span class="font-semibold text-orange-400">Mijn Blog</span>. Alle rechten voorbehouden.
        </footer>
    </div>
</body>
</html>
