<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }" x-bind:class="{ 'dark': darkMode }" x-init="
    if(localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }
">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Permify')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">

    <nav class="bg-white dark:bg-gray-800 shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('permify.dashboard') }}" class="text-2xl font-bold text-blue-600 dark:text-blue-400">Permify</a>

            <div class="space-x-4 flex items-center">
                <a href="{{ route('permify.dashboard') }}" class="hover:underline">Dashboard</a>
                <a href="{{ route('permify.roles.index') }}" class="hover:underline">Roles</a>
                <a href="{{ route('permify.permissions.index') }}" class="hover:underline">Permissions</a>

                @auth
                    <span class="ml-4">Hello, {{ auth()->user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}" class="inline ml-4">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:underline">Login</a>
                    <a href="{{ route('register') }}" class="ml-4 hover:underline">Register</a>
                @endauth

                <button
                    @click="
                        darkMode = !darkMode;
                        if(darkMode) {
                            localStorage.setItem('theme', 'dark');
                            document.documentElement.classList.add('dark');
                        } else {
                            localStorage.setItem('theme', 'light');
                            document.documentElement.classList.remove('dark');
                        }
                    "
                    class="ml-4 p-2 rounded bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300"
                    aria-label="Toggle Dark Mode"
                >
                    <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 3v1m0 16v1m8.66-12.66l-.71.71M5.05 18.95l-.7.7m15.6 2.11l-.7-.7M5.05 5.05l-.7-.7M21 12h-1M4 12H3" />
                    </svg>
                    <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" >
                        <path d="M10 2a8 8 0 000 16c4.42 0 8-3.58 8-8 0-1.21-.34-2.35-.92-3.33A7.969 7.969 0 0110 2z" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <main class="flex-grow container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-white dark:bg-gray-800 shadow py-4 text-center text-sm text-gray-600 dark:text-gray-400">
        &copy; {{ date('Y') }} Permify. All rights reserved.
    </footer>

</body>
</html>
