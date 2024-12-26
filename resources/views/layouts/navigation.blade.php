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
    <button type="button" id="dropdownBtn" class="flex items-center justify-center bg-background-900 hover:bg-background-800 transition-colors duration-500 px-5 py-2 rounded-lg">
        <img src="{{ asset('images/profile.svg') }}" alt="" class="pr-1 border-r-2 border-text-100">
        <p class="pl-1 font-semibold">Profile</p>
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