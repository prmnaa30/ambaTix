<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ambaTix') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-background-950">
    {{-- header --}}
    <header>
        @include('layouts.navigation')
    </header>

    {{-- main content --}}
    <main class="mx-24 mb-2 mt-4 min-h-screen flex flex-col gap-4">
        @yield('content')
    </main>

    {{-- footer --}}
    <footer class="bg-primary-400 rounded-t-lg border-t-8 border-primary-300 pt-4">
        <div class="flex justify-center gap-3 ">
            <a href=""
                class="transition-all duration-500 hover:bg-primary-500 hover:rounded-full hover:scale-105">
                <img src="{{ asset('images/X-logo.svg') }}" alt="Logo X">
            </a>
            <a href=""
                class="transition-all duration-500 hover:bg-primary-500 hover:rounded-full hover:scale-105">
                <img src="{{ asset('images/whatsapp-logo.svg') }}" alt="Logo Whatsapp">
            </a>
            <a href=""
                class="transition-all duration-500 hover:bg-primary-500 hover:rounded-full hover:scale-105">
                <img src="{{ asset('images/instagram-logo.svg') }}" alt="Logo Instagram">
            </a>
            <a href=""
                class="transition-all duration-500 hover:bg-primary-500 hover:rounded-full hover:scale-105">
                <img src="{{ asset('images/youtube-logo.svg') }}" alt="Logo Youtube">
            </a>
        </div>
        <div>
            <p class="text-center py-4">ambaTix © 2024. All rights reserved</p>
        </div>
    </footer>

    <script>
        const dropdownBtn = document.getElementById('dropdownBtn');
        const dropdownContent = document.getElementById('dropdownContent');
        const dropdownContentBg = document.getElementById('dropdownContentBg');
        const closeDropdown = document.getElementById('closeDropdown');

        dropdownBtn.addEventListener('click', () => {
            dropdownContent.classList.toggle('hidden');
            dropdownContentBg.classList.toggle('hidden');
        });

        closeDropdown.addEventListener('click', () => {
            dropdownContent.classList.add('hidden');
            dropdownContentBg.classList.add('hidden');
        });

        dropdownContentBg.addEventListener('click', () => {
            dropdownContent.classList.add('hidden');
            dropdownContentBg.classList.add('hidden');
        });

        document.addEventListener('scroll', () => {
            dropdownContent.classList.add('hidden');
            dropdownContentBg.classList.add('hidden');
        });
    </script>
</body>

</html>
