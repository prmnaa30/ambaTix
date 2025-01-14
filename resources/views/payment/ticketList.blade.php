@extends('layouts.app')

@section('content')

    <div id="container" class="bg-primary-800 rounded-2xl grid grid-cols-2  py-8 px-10">
        <div id="eventTicket" class="bg-primary-600 p-5 rounded-xl">
            <p class="font-bold text-lg pl-4">Kategori Tiket</p>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            
            @forelse ($tickets as $ticket)
                <div class="flex pl-4 mx-4 border-2 border-primary-400 rounded-lg justify-between my-2">
                    <div class="m-3">
                        <p>{{ $ticket->ticket_type }}</p>
                        <p class="font-bold">Rp {{ $ticket->price }}</p>
                    </div>
                    <form action="{{ route('addTicket', request()->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                        <input type="hidden" name="price" id="price" value="{{ $ticket->price }}">
                        <input type="hidden" name="ticket_type" id="ticket_type" value="{{ $ticket->ticket_type }}">
                        <input type="number" name="quantity" id="quantity" min="1" max="{{ $ticket->quantity }}" value="1" class="bg-transparent border-2 border-primary-500 focus:outline-none focus:border-primary-400 transition-colors duration-500 ease rounded-lg p-1">
                        <button class="border-2 rounded-md p-3 m-3 {{ $ticket->quantity == 0 ? "border-primary-400 bg-primary-400" : "bg-primary-500 border-primary-500 hover:bg-primary-400/70 hover:border-primary-400/70 transition-all duration-500" }}" {{ $ticket->quantity == 0 ? 'disabled' : ''}}>{{ $ticket->quantity == 0 ? 'Habis' : 'Tambah' }}</button>
                    </form>
                </div>
            @empty
                <p class="pl-4">Tidak ada tiket</p>
            @endforelse
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

                    <div id="totalTiket" class="mt-4 border-b-2 border-primary-400 pb-4">
                        <table class="w-full text-left">
                            <thead>
                                <th>Tiket</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                    <tr>
                                        <td>{{ $item['ticket_type'] }}</td>
                                        <td>Rp {{ $item['price'] }}</td>
                                        <td>{{ $item['quantity'] }}</td>
                                        <td>
                                            <a href="{{ route('removeTicket', [request()->id, $item['ticket_id']]) }}" class="text-blue-700 hover:text-blue-400 transition-all duration-500">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div id="eventPrice" class="flex flex-col items-center bg-primary-600 rounded-lg w-auto mt-4">
                        <div class="flex justify-between items-center w-full text-lg font-bold mb-4 px-4">
                            <span>Total</span>
                            <span class="text-black">Rp {{ $totalPrice }}</span>
                        </div>
                        <a href="{{ route('clearCart', request()->id) }}" class="text-blue-700 hover:text-blue-400 transition-all duration-500">Hapus Semua</a>
                        <a href="{{ route('paymentDetail', $event->id) }}" class="w-full bg-primary-400 text-white text-xl font-extrabold py-2 rounded-full hover:bg-primary-500 transition-colors duration-300">
                            <button class="w-full">
                                Pesan
                            </button>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
