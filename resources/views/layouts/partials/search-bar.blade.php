<div class="flex items-center gap-8 w-full relative">
    <button type="button" id="kategoriDropdownButton" aria-haspopup="true" aria-expanded="false" class="text-text-900 font-semibold hover:underline">
        Kategori
    </button>
    <div aria-labelledby="kategoriDropdownButton" id="kategoriDropdown" class="flex hidden flex-col gap-2 absolute top-16 z-50 -left-2 p-2 w-40 bg-primary-400 rounded-lg">
        @foreach ($categories as $category)
            <a href="{{ route('search', ['id_kategori' => $category->id]) }}" class="text-text-900 hover:underline">{{ $category->name }}</a>
        @endforeach
    </div>
    <form action="{{ request()->routeIs('search.kategori') ? route('search.kategori', ['id_kategori' => $id_kategori ?? '']) : route('search') }}" class="bg-background-950 w-100 rounded-2xl flex items-center justify-center px-4 py-1 w-full">
        <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#5A6006" viewBox="0 0 256 256">
                <path
                    d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                </path>
            </svg>
        </button>
        <input type="text" id="search" name="search" placeholder="Cari Nama Event" class="bg-background-950 w-full rounded-lg px-4 py-3 placeholder:text-primary-200/50 text-primary-200 border-none focus:outline-none focus:ring-0" />
    </form>
</div>
<script>
    const kategoriDropdownButton = document.getElementById('kategoriDropdownButton');
    const kategoriDropdown = document.getElementById('kategoriDropdown');

    kategoriDropdownButton.addEventListener('click', () => {
        kategoriDropdown.classList.toggle('hidden');
    });
    document.addEventListener('scroll', () => {
        kategoriDropdown.classList.add('hidden');
    });
</script>