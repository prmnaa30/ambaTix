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
@endsection
