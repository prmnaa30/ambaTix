@extends($layout)

@section('content')
    <x-carousel>
        <div class="carousel-item flex-none h-96 w-full">
            <img src="{{ asset('images/carousel/image 1.webp') }}" alt=""
                class="h-full w-full object-cover rounded-2xl">
        </div>
        <div class="carousel-item flex-none h-96 w-full">
            <img src="{{ asset('images/carousel/image 2.webp') }}" alt=""
                class="h-full w-full object-cover rounded-2xl">
        </div>
        <div class="carousel-item flex-none h-96 w-full">
            <img src="{{ asset('images/carousel/image 3.webp') }}" alt=""
                class="h-full w-full object-cover rounded-2xl">
        </div>
    </x-carousel>

    <div>
        <div class="mb-4">
            <p class="text-2xl font-bold">
                Event Terbaru <a href="{{ route('search') }}" class="text-blue-600 ml-6 text-base ">Tampilkan Semua</a>
            </p>
        </div>

        <div class="grid grid-cols-4 gap-4 justify-items-center" id="all-events">
            @forelse ($events as $event)
                <a href="{{ route('detail-event', $event->id) }}">
                    <img src="{{ $event->image_url }}" alt="Event" style="width: 294px; height: 350px; object-fit: cover;" class="rounded-2xl transition-all duration-500 hover:scale-95 hover:opacity-80">
                </a>
            @empty
                <div class="col-span-4">
                    <p class="flex justify-center items-center h-60">Tidak ada event...</p>
                </div>
            @endforelse
        </div>
    </div>

    <div class="bg-primary-700 rounded-2xl p-8 px-auto mb-2 just">
        
        <p class="text-2xl font-bold text-center mb-8">Kategori Utama</p>
        
        <div class="grid grid-cols-3 justify-items-center mb-8">
            <a href="{{ route('search', ['id_kategori' => 3]) }}" class="relative group" id="konser">
                <img src="{{ asset('images/konser.jfif') }}" alt="Event" style="width: 248px; height: 296px; object-fit: cover;" class="rounded-2xl transition-all duration-500 hover:scale-95 hover:opacity-80">
                <span class="absolute inset-0 flex items-center justify-center text-white text-2xl opacity-0 group-hover:opacity-100 hover:bg-black/50 rounded-2xl transition-opacity duration-500 ">Konser</span>
            </a>
            <a href="{{ route('search', ['id_kategori' => 1])}}" class="relative group" id="seminar">
                <img src="{{ asset('images/seminar.jfif') }}" alt="Event" style="width: 248px; height: 296px; object-fit: cover;" class="rounded-2xl transition-all duration-500 hover:scale-95 hover:opacity-80">
                <span class="absolute inset-0 flex items-center justify-center text-white text-2xl opacity-0 group-hover:opacity-100 hover:bg-black/50 rounded-2xl transition-opacity duration-500">Seminar</span>
            </a>
            <a href="{{ route('search', ['id_kategori' => 2]) }}" class="relative group" id="workshop">
                <img src="{{ asset('images/workshop.jfif') }}" alt="Event" style="width: 248px; height: 296px; object-fit: cover;" class="rounded-2xl transition-all duration-500 hover:scale-95 hover:opacity-80">
                <span class="absolute inset-0 flex items-center justify-center text-white text-2xl opacity-0 group-hover:opacity-100 hover:bg-black/50 rounded-2xl transition-opacity duration-500">Workshop</span>
            </a>
            
        </div>

    </div>
@endsection
