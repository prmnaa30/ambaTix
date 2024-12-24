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
    <nav class="bg-primary-400 rounded-2xl mx-24 mt-2 px-10 py-4 flex gap-16 items-center">
        <x-application-logo width="145.4" height="57.4" />
        <div class="bg-background-950 w-100 rounded-2xl flex items-center justify-center px-4 py-1 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#5A6006" viewBox="0 0 256 256">
                <path
                    d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                </path>
            </svg>
            <input type="text" placeholder="Cari Event"
                class="bg-background-950 w-full rounded-lg px-4 py-3 placeholder:text-primary-200/50 text-primary-200 border-none focus:outline-none focus:ring-0" />
        </div>
        
        {{-- Dropdown Button --}}
        <button type="button" id="dropdownBtn">
            Profile
        </button>

        {{-- Dropdown Bg + Content --}}
        <div id="dropdownContentBg" class="fixed hidden inset-0 bg-background-50/20 transition-colors duration-500"></div>
        <div id="dropdownContent" class="bg-primary-400 text-white absolute hidden top-28 right-24 rounded-2xl w-56 px-8 py-6">
            <div class="border-b-2 pb-1 border-primary-900 w-full">
                <p>Hi, </p>
                <p>Atmin</p>
                <button id="closeDropdown" class="absolute top-6 right-8">
                    <img src="{{ asset('images/cross.svg') }}" alt="">
                </button>
            </div>
            <div class="flex flex-col gap-1 mt-1 pb-1 border-b-2 border-primary-900">
                <a href="{{ route('landing') }}"
                    class="hover:bg-primary-500 hover:rounded hover:transition-all duration-500 py-1 px-2 flex gap-2">
                    <img src="{{ asset('images/receipt.svg') }}" alt="">
                    <p>Transaksi</p>
                </a>
                <a href="{{ route('landing') }}"
                    class="hover:bg-primary-500 hover:rounded hover:transition-all duration-500 py-1 px-2 flex gap-2">
                    <img src="{{ asset('images/ticket.svg') }}" alt="">
                    <p>Ticket</p>
                </a>
            </div>
            <a href="{{ route('landing') }}"
                class="hover:bg-primary-500 hover:rounded hover:transition-all duration-500 py-1 px-2 block mt-1">
                Logout
            </a>
        </div>
    </nav>

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
