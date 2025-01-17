<nav class="bg-primary-400 rounded-2xl mx-24 mt-2 px-10 py-4 flex gap-10 items-center">
    <x-application-logo width="145.4" height="57.4" />
    @include('layouts.partials.search-bar')

    {{-- Dropdown Button --}}
    <button type="button" id="dropdownBtn"
        class="flex items-center justify-center bg-background-900 hover:bg-background-800 transition-colors duration-500 px-5 py-2 rounded-lg">
        <img src="{{ asset('icons/profile.svg') }}" alt="" class="pr-1 border-r-2 border-text-100">
        <p class="pl-1 font-semibold">Profile</p>
    </button>

    {{-- Dropdown Bg + Content --}}
    <div id="dropdownContentBg" class="fixed hidden inset-0 bg-background-50/20 transition-colors duration-500"></div>
    <div id="dropdownContent"
        class="bg-primary-400 text-white absolute hidden top-28 right-24 rounded-2xl w-56 px-8 py-6 z-50">
        <div class="border-b-2 pb-1 border-primary-900 w-full">
            <p>Hi, </p>
            <p>{{ Auth::user()->nama_panggilan }}</p>
            <button id="closeDropdown" class="absolute top-6 right-8">
                <img src="{{ asset('icons/cross.svg') }}" alt="">
            </button>
        </div>
        <div class="flex flex-col gap-1 mt-1 pb-1 border-b-2 border-primary-900">
            @if (Auth::user()->role == 'admin')
                <a href="{{ route('admin') }}"
                    class="hover:bg-primary-500 hover:rounded hover:transition-all duration-500 py-1 px-2 flex gap-2">
                    <img src="{{ asset('icons/admin-icon.svg') }}" alt="">
                    <p>Admin</p>
                </a>
            @endif
            <a href="{{ route('showUserTransaction') }}"
                class="hover:bg-primary-500 hover:rounded hover:transition-all duration-500 py-1 px-2 flex gap-2">
                <img src="{{ asset('icons/receipt.svg') }}" alt="">
                <p>Transaksi</p>
            </a>
            <a href="{{ route('showUserTicket') }}"
                class="hover:bg-primary-500 hover:rounded hover:transition-all duration-500 py-1 px-2 flex gap-2">
                <img src="{{ asset('icons/ticket.svg') }}" alt="">
                <p>Ticket</p>
            </a>
        </div>
        <div class="flex flex-col gap-1 mt-1 pb-1 border-b-2 border-primary-900">
            <a href="{{ route('editProfile') }}"
                class="hover:bg-primary-500 hover:rounded hover:transition-all duration-500 py-1 px-2 flex gap-2">
                <img src="{{ asset('icons/profile-gear.svg') }}" alt="">
                <p>Ubah Profile</p>
            </a>
            <a href="{{ route('editPassword') }}"
                class="hover:bg-primary-500 hover:rounded hover:transition-all duration-500 py-1 px-2 flex gap-2">
                <img src="{{ asset('icons/password-icon.svg') }}" alt="">
                <p>Ubah Password</p>
            </a>
        </div>
        <a href="{{ route('logout') }}"
            class="hover:bg-primary-500 hover:rounded hover:transition-all duration-500 py-1 px-2 block mt-1">
            Logout
        </a>
    </div>
</nav>
