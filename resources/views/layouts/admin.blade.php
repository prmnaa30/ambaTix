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

<body class="font-sans antialiased bg-background-950 text-text-100">
    <header class="fixed w-full top-0">
        {{-- top bar --}}
        <div
            class="flex items-center justify-between h-16 px-6 py-3 bg-primary-400 shadow-[4px_0_24px_0_rgba(0,0,0,0.25)]">
            <div class="flex gap-2 items-center">
                <div class="bg-primary-400 w-48 object-center">
                    <x-application-logo width="145.4" height="57.4" class="bg-accent-300 px-4 py-2 rounded-2xl" />
                </div>
                <div class="flex items-center gap-4">
                    <img src="{{ asset('icons/3line.svg') }}" alt="">
                    <div class="flex font-semibold text-lg">
                        <a href="{{ Route::is('admin') ? '#' : route('admin') }}" class="hover:underline">
                            Dashboard
                        </a>
                        &nbsp;/&nbsp;
                        <span>
                            @php
                                $segments = Request::segments();
                                $breadcrumbs = [];
                                $link = '';
                            @endphp
                            @foreach ($segments as $segment)
                                @php
                                    $link .= '/' . $segment;
                                    if (is_numeric($segment)) {
                                        $title = '';
                                    } else {
                                        $title = ucfirst($segment);
                                    }
                                    $breadcrumbs[] = [
                                        'title' => $title,
                                        'link' => $link,
                                    ];
                                @endphp
                                <a href="{{ $breadcrumbs[count($breadcrumbs) - 1]['link'] }}" class="hover:underline">{{ $breadcrumbs[count($breadcrumbs) - 1]['title'] }}</a>
                                @if ($loop->last || empty($breadcrumbs[count($breadcrumbs) - 1]['title']))
                                    
                                @else
                                    <span> / </span>
                                @endif
                            @endforeach
                        </span>
                    </div>
                </div>
            </div>
            <div>
                <p>Atmin</p>
            </div>
        </div>
    </header>

    {{-- sidebar --}}
    <aside class="bg-primary-400 w-48 px-6 py-3 fixed h-full ">
        <h1 class="font-bold text-lg mb-2">Main Menu</h1>
        <nav class="flex flex-col">
            <a href="{{ Route::is('admin') ? '#' : route('admin') }}"
                class="flex gap-2 px-2 py-1 hover:bg-accent-400 {{ Route::is('admin') ? 'bg-accent-400' : '' }} transition-colors duration-500 rounded-lg">
                <img src="{{ asset('icons/dashboard.svg') }}" alt="">
                <p class="text-base">Dashboard</p>
            </a>
            <a href="{{ Route::is('events.') ? '#' : route('events.index') }}"
                class="flex gap-2 px-2 py-1 hover:bg-accent-400 {{ Route::is('events.*') ? 'bg-accent-400' : '' }} transition-colors duration-500 rounded-lg mt-2">
                <img src="{{ asset('icons/calendar.svg') }}" alt="">
                <p class="text-base">Event</p>
            </a>
            <a href="{{ Route::is('kategori.') ? '#' : route('kategori.index') }}"
                class="flex gap-2 px-2 py-1 hover:bg-accent-400 {{ Route::is('kategori.*') ? 'bg-accent-400' : '' }} transition-colors duration-500 rounded-lg mt-2">
                <img src="{{ asset('icons/category.svg') }}" alt="">
                <p class="text-base">Kategori</p>
            </a>
            <a href=""
                class="flex gap-2 px-2 py-1 hover:bg-accent-400 transition-colors duration-500 rounded-lg mt-2">
                <img src="{{ asset('icons/receipt2.svg') }}" alt="">
                <p class="text-base">Transaksi</p>
            </a>
            <a href=""
                class="flex gap-2 px-2 py-1 hover:bg-accent-400 transition-colors duration-500 rounded-lg mt-2">
                <img src="{{ asset('icons/user2.svg') }}" alt="">
                <p class="text-base">User</p>
            </a>
        </nav>
    </aside>

    {{-- main content --}}
    <main class="ml-48 mt-16 p-6">
        @yield('content')
    </main>
</body>

</html>
