@extends('layouts.admin')

@section('content')
    <section class="bg-primary-800 flex justify-center items-center rounded-2xl py-36">
        <div class="w-2/5 flex flex-col gap-4">
            <h1 class="text-text-950 bg-secondary-400 p-2 rounded-lg text-center">Ubah Data Tiket {{ $ticket->ticket_type }}</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="px-3">
                <form action="{{ route('events.tickets.update', [$event->id, $ticket->id]) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-3">
                    @csrf
                    @method('PUT')
                    <x-form-group 
                        inputTag="input" 
                        id="ticket_type" 
                        name="ticket_type" 
                        type="text" 
                        placeholder="Masukkan Tipe Tiket" 
                        label="Tipe Tiket"
                        value="{{ $ticket->ticket_type }}"
                    />
                    <x-form-group 
                        inputTag="input"
                        id="price"
                        name="price"
                        type="text"
                        placeholder="Masukkan Harga Ticket Satuan"
                        label="Harga"
                        value="{{ $ticket->price }}"
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="quantity" 
                        name="quantity"
                        type="number"
                        min="1"
                        placeholder="Masukkan Jumlah Tiket" 
                        label="Kuantitas"
                        value="{{ $ticket->quantity }}"
                    />
                    <button type="submit" class="bg-primary-500 hover:bg-primary-400 hover:text-text-950 hover:scale-[1.01] transition-all duration-500 ease rounded-lg mt-3 p-2 w-full">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </section>
@endsection