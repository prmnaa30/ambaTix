@extends($layout)

@section('content')
    <section class="flex flex-col gap-2">
        <div class="flex justify-between">
            <h1 class="font-bold text-lg">Hasil pencarian</h1>
            <div class="flex gap-4">
                <p class="font-semibold">Kategori: <span class="font-normal">{{ $category->name ?? 'Semua' }}</span></p>
                <a href="{{ route('search') }}" class="text-blue-600 font-semibold">Reset Filter</a>
            </div>
        </div>
        <div class="grid grid-cols-5 gap-4">
            @forelse ($events as $event)
                <a href="" class="relative group">
                    <img src="{{ $event->image_url }}" alt="Event" style="width: 294px; height: 350px; object-fit: cover;" class="rounded-2xl transition-all duration-500 hover:scale-95 hover:opacity-80">
                    <span class="absolute inset-0 flex items-center justify-center text-white text-2xl opacity-0 group-hover:opacity-100 hover:bg-black/50 rounded-2xl transition-opacity duration-500 ">{{ $event->name }}</span>
                </a>
            @empty
                <div class="col-span-5">
                    <p class="flex justify-center items-center h-60">Tidak ada event...</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection