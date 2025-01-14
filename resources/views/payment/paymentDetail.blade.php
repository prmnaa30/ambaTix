@extends('layouts.app')

@section('content')
    <div class="flex justify-center gap-4">
        
        <div class="flex">
            <img src="{{ asset('icons/one-400.svg') }}" alt="one" class="bg-primar-400">
            <p class="mt-1 text-primary-400 font-bold text-lg">Metode Pembayaran</p>
            <div class="w-8 h-1 bg-primary-500 ml-4 mt-4"></div>
            <div class="w-8 h-1 bg-black mt-4"></div>
        </div>
        
        <div class="flex">

            <img src="{{ asset('icons/two.svg') }}" alt="two">
            <p class="mt-1 font-bold text-lg">Pembayaran</p>
        </div>

    </div>

    <div id="container" class="bg-primary-800 rounded-2xl grid grid-cols-2  py-8 px-10">

        <div id="eventTicket" class="bg-primary-600 p-5 rounded-xl">
            <p class="font-bold text-lg pl-4">Detail Pembeli</p>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            <form class="border-2 border-primary-400 rounded-lg mt-2">
                <div class="p-4 pb-0">
                    <p>Email</p>
                    <input type="email" class="w-full p-2 rounded-lg border border-primary-400" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="p-4 pb-0">
                    <p>Nama Lengkap</p>
                    <input type="text" class="w-full p-2 rounded-lg border border-primary-400" value="{{ Auth::user()->nama_lengkap }}" disabled>
                </div>
                <div class="p-4 pb-0">
                    <p>Nomor Telpon</p>
                    <input type="text" class="w-full p-2 rounded-lg border border-primary-400" value="{{ Auth::user()->phone }}" disabled>
                </div>
                <div class="p-4">
                    <p>Alamat</p>
                    <input type="text" class="w-full p-2 rounded-lg border border-primary-400" value="{{ Auth::user()->alamat }}" disabled>
                </div>
            </form>
        </div>

        

        <div id="eventPayment" class="pl-4 rounded-xl">

            <div id="eventDetail" class="flex flex-col items-center bg-primary-600 rounded-lg p-5 w-auto">
                <div class="justify-between items-center w-full text-lg font-bold mb-4 px-4">
                    <span>Detail Pesanan</span>

                    <div class="flex mt-2 border-b-2 pb-4 border-primary-400">
                        <div>
                            <img src="{{ $event->image_url }}" alt="Event" style="width: 147px; height: 175px; object-fit: cover;" class="rounded-2xl ">
                        </div>

                        <div>
                            <p class="ml-4 text-lg">{{ $event->name }}</p>
                            <div class="flex mb-2 ml-4">
                                <img src="{{ asset('icons/calendar-2.svg') }}" alt="Logo Kalender" >
                                <p class="ml-2">{{ $event->date }}</p>
                            </div>
                            <div class="flex mb-2 ml-4">
                                <img src="{{ asset('icons/clock.svg') }}" alt="Logo Jam">
                                <p class="ml-2">{{ $event->time }}</p>
                            </div>
                            <div class="flex mb-2 ml-4">
                                <img src="{{ asset('icons/pinLocation.svg') }}" alt="Logo Lokasi">
                                <a href="" class="ml-2 text-blue-700 hover:text-blue-400 transition-all duration-500">{{ $event->location }}</a>
                            </div>
                        </div>

                    </div>

                    <div class="mt-4 border-b-2 border-primary-400 pb-4">
                        <span class="ml-4">{{ $ticketCount }} Tiket Dipesan</span>
                    </div>

                    <!-- <div id="payment" class="mt-4 border-b-2 border-primary-400 pb-4">
                        <button href="" class="">
                            <img src="{{ asset('icons/bank-bni.svg') }}" alt="Logo BNI">
                        </button>
                    </div> -->

                    <div id="payment" class="mt-4 border-b-2 border-primary-400 pb-8">
                        <p class="font-bold text-lg mb-2">Pilih Metode Pembayaran</p>
                        
                        <div class="grid grid-cols-4 mr-8">

                            @foreach ($paymentMethods as $method)
                                <label class="flex">
                                    <input type="radio" id="payment_method_radio" name="payment_method_radio" form="payment" value="{{ $method->id }}" required>
                                    <img src="{{ $method->method_image_url }}" alt="Logo {{ $method->name }}" class="ml-2 w-20 h-20">
                                </label>
                            @endforeach

                        </div>

                        <div id="eventPrice" class="flex flex-col items-center bg-primary-600 rounded-lg w-full mt-4">
                            <div class="flex justify-between items-center w-full text-lg font-bold mb-4 px-4">
                                <span>Total</span>
                                <span class="text-black">Rp {{ $totalPrice }}</span>
                            </div>
                            <form action="{{ route('createTransaction') }}" method="POST" id="payment" class="w-full">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="payment_method_id" id="payment_method_id">
                                <button type="submit" class="w-full bg-primary-400 text-white text-xl font-extrabold py-2 rounded-full hover:bg-primary-500 transition-colors duration-300">
                                    Bayar
                                </button>
                            </form>
                        </div>
                        <script>
                            const paymentMethodRadio = document.getElementById('payment_method_radio');
                            const paymentMethodId = document.getElementById('payment_method_id');

                            paymentMethodRadio.addEventListener('change', () => {
                                paymentMethodId.value = paymentMethodRadio.value;
                            });
                        </script>
                </div>
            </div>

        </div>
    </div>

@endsection
