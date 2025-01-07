@extends('layouts.admin')

@section('content')
    <section class="flex flex-col gap-4">
        <a href="{{ route('events.tickets.create', $event->id) }}" class="bg-primary-500 rounded-lg p-2 w-fit">Tambah Ticket</a>

        <article class="w-full">
            <div class="flex w-full px-4 py-2 font-bold">
                <p class="w-1/12">No</p>
                <p class="w-3/12">Tipe Tiket</p>
                <p class="w-3/12">Harga</p>
                <p class="w-2/12">Kuantitas</p>
                <p class="w-2/12">Terjual</p>
                <p class="w-1/12">Aksi</p>
            </div>

            <div class="flex flex-col gap-2">
                @foreach ($tickets as $index => $ticket)
                    <div class="flex items-center w-full px-4 py-2 bg-primary-800 rounded-2xl">
                        <p class="w-1/12">{{ $index + 1 }}</p>
                        <p class="w-3/12">{{ $ticket->ticket_type }}</p>
                        <p class="w-3/12">Rp {{ $ticket->price }}</p>
                        <p class="w-2/12">{{ $ticket->quantity }}</p>
                        <p class="w-2/12">{{ $ticket->sold_quantity }}</p>
                        <div class="flex items-center gap-2 w-1/12">
                            <a href="{{ route('events.tickets.edit', [$event->id, $ticket->id]) }}" class="bg-orange-500 rounded-lg p-1">
                                <img src="{{ asset('icons/Edit.svg') }}" alt="">
                            </a>
                            <form action="{{ route('events.tickets.destroy', [$event->id, $ticket->id]) }}" method="POST" class="flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 rounded-lg p-1">
                                    <img src="{{ asset('icons/Delete.svg') }}" alt="">
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>

    </section>
@endsection
