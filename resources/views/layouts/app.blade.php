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
    @include('layouts.partials.footer')

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
