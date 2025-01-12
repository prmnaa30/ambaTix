@extends('layouts.admin')

@section('content')
    <section class="bg-primary-800 flex justify-center items-center rounded-2xl py-36">
        <div class="w-2/5 flex flex-col gap-4">
            <h1 class="text-text-950 bg-secondary-400 p-2 rounded-lg text-center">Tambah Ticket untuk Event {{ $event->name }}</h1>
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
                <form action="{{ route('events.tickets.store', $event->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-3">
                    @csrf
                    @method('POST')
                    <x-form-group 
                        inputTag="input" 
                        id="ticket_type" 
                        name="ticket_type" 
                        type="text" 
                        placeholder="Masukkan Tipe Tiket" 
                        label="Tipe Tiket" 
                    />
                    <x-form-group 
                        inputTag="input"
                        id="price"
                        name="price"
                        type="text"
                        placeholder="Masukkan Harga Ticket Satuan"
                        label="Harga" 
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="quantity" 
                        name="quantity"
                        type="number"
                        min="1"
                        placeholder="Masukkan Jumlah Tiket" 
                        label="Kuantitas" 
                    />
                    <button type="submit" class="bg-primary-500 hover:bg-primary-400 hover:text-text-950 hover:scale-[1.01] transition-all duration-500 ease rounded-lg mt-3 p-2 w-full">Tambah Tiket</button>
                </form>
            </div>
        </div>
    </section>
@endsection