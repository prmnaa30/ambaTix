@extends('layouts.app')

@section('content')

    <div class="mx-auto mt-2 text-lg font-bold">
        <p>Tiket</p>
    </div>

    <div class="grid grid-cols-3 gap-6">

        @if (count($tickets) > 0)
            @foreach ($tickets as $ticket)
                <div class="flex items-center w-full px-4 py-2 bg-primary-800 rounded-2xl">
                    <img src="{{ $ticket['event_image_url'] }}" alt="Gambar Event" style="width: 147px; height: 175px; object-fit: cover;" class="rounded-2xl my-4">
                    <div class="ml-4 flex flex-col justify-between h-full">
                        <div class="pt-4">
                            <p class="font-bold text-lg">{{ $ticket['event_name'] }}</p>
                            <p>{{ $ticket['ticket_type'] }}</p>
                            <div class="text-sm text-black">
                                <table>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>:</td>
                                        <td>{{ $ticket['event_date'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jam</td>
                                        <td>:</td>
                                        <td>{{ $ticket['event_time'] }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>:</td>
                                        <td>{{ $ticket['event_location'] }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <p class="bg-primary-400 rounded-full px-auto text-center py-1 text-white mb-4">Harga Tiket : Rp {{ $ticket['price'] }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>Belum Ada Tiket Yang Dibeli</p>
        @endif
        
    </div>

@endsection
