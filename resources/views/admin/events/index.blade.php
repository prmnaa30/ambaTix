@extends('layouts.admin')

@section('content')
    <section class="flex flex-col gap-4">
        <a href="{{ route('events.create') }}" class="bg-primary-500 rounded-lg p-2 w-fit">Tambah Event</a>

        <div class="grid grid-cols-3 gap-4">
            @foreach ($events as $event)
                <div class="bg-primary-800 rounded-lg p-2 h-56 flex gap-2">
                    <img src="{{ $event->image_url }}" alt="{{ $event->name }}" class="object-cover h-full rounded">
                    <div class="w-full flex flex-col justify-between">
                        <h2 class="font-bold pb-1 border-b-2 border-primary-600 text-lg">{{ $event->name }}</h2>
                        <div class="flex flex-col gap-2 mt-2 pb-2 border-b-2 border-primary-600">
                            <p class="flex gap-2">
                                <img src="{{ asset('icons/profile.svg') }}" alt="">
                                {{ $event->organizer_name }}
                            </p>
                            <p class="flex gap-2">
                                <img src="{{ asset('icons/pinLocation.svg') }}" alt="">
                                {{ $event->location }}
                            </p>
                            <p class="flex gap-2">
                                <img src="{{ asset('icons/calendar-2.svg') }}" alt="">
                                {{ $event->date }}
                            </p>
                            <p class="flex gap-2">
                                <img src="{{ asset('icons/hashtag.svg') }}" alt="">
                                {{ $event->category }}
                            </p>
                        </div>
                        <div class="flex items-center gap-2 mt-2">
                            <a href="" class="bg-primary-400 rounded-lg px-2 py-1 text-sm text-text-950">Tickets</a>
                            <a href="{{ route('events.edit', $event->id) }}" class="bg-orange-500 rounded-lg p-1">
                                <img src="{{ asset('icons/Edit.svg') }}" alt="">
                            </a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 rounded-lg p-1">
                                    <img src="{{ asset('icons/Delete.svg') }}" alt="">
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
