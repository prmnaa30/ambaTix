@extends('layouts.admin')

@section('content')
    <section class="flex flex-col gap-4">
        <a href="{{ route('events.create') }}" class="bg-primary-500 rounded-lg p-2 w-fit">Tambah Event</a>

        <form action="{{ route('events.index') }}" method="GET" class="flex gap-2">
            <select name="sort_method" id="sort_method" class="rounded-lg px-2 py-1 bg-primary-800 focus:outline-primary-400">
                <option value="" {{ $sortMethod == '' ? 'selected' : '' }}>Urut Berdasarkan</option>
                <option value="category" {{ $sortMethod == 'category' ? 'selected' : '' }}>Kategori</option>
                <option value="date" {{ $sortMethod == 'date' ? 'selected' : '' }}>Tanggal</option>
            </select>

            <select name="sort_order" id="sort_order" style="display: none"
                class="rounded-lg px-2 py-1 bg-primary-800 focus:outline-primary-400">
                <option value="desc" {{ $sortMethod == 'date' && $sortByDateOrder == 'desc' ? 'selected' : '' }}>Menurun
                </option>
                <option value="asc" {{ $sortMethod == 'date' && $sortByDateOrder == 'asc' ? 'selected' : '' }}>Menaik
                </option>
            </select>

            <select name="sort_category" id="sort_category" style="display: none"
                class="rounded-lg px-2 py-1 bg-primary-800 focus:outline-primary-400">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $sortMethod == 'category' && $sortByCategoryId == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>

            <button
                class="bg-primary-700 hover:bg-primary-600 hover:text-text-950 transition-all duration-500 ease rounded-lg p-2"
                type="submit">Tampilkan</button>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const sortMethodSelect = document.getElementById('sort_method');
                    const sortOrderSelect = document.getElementById('sort_order');
                    const sortCategorySelect = document.getElementById('sort_category');

                    if (sortMethodSelect.value === 'category') {
                        sortCategorySelect.style.display = 'block';
                        sortOrderSelect.style.display = 'none';
                    } else if (sortMethodSelect.value === 'date') {
                        sortCategorySelect.style.display = 'none';
                        sortOrderSelect.style.display = 'block';
                    } else {
                        sortCategorySelect.style.display = 'none';
                        sortOrderSelect.style.display = 'none';
                    }

                    sortMethodSelect.addEventListener('change', () => {
                        if (sortMethodSelect.value === 'category') {
                            sortCategorySelect.style.display = 'block';
                            sortOrderSelect.style.display = 'none';
                        } else if (sortMethodSelect.value === 'date') {
                            sortCategorySelect.style.display = 'none';
                            sortOrderSelect.style.display = 'block';
                        } else {
                            sortCategorySelect.style.display = 'none';
                            sortOrderSelect.style.display = 'none';
                        }
                    });
                });
            </script>
        </form>

        <div class="grid grid-cols-2 gap-4">
            @foreach ($events as $event)
                <div class="bg-primary-800 rounded-lg p-2 h-56 flex gap-2">
                    <img src="{{ $event->image_url }}" alt="{{ $event->name }}" class="object-cover h-full rounded">
                    <div class="w-full flex flex-col justify-between">
                        <div>
                            <h2 class="font-bold text-lg pb-1">{{ $event->name }}</h2>
                            <div class="flex flex-col gap-2 py-2 border-y-2 border-primary-600">
                                <table>
                                    <tr>
                                        <td class="w-1/3">Penyelenggara</td>
                                        <td>: {{ $event->organizer_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lokasi</td>
                                        <td>: {{ $event->location }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>: {{ $event->date }}</td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>: {{ $event->time }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kategori</td>
                                        <td>: {{ $event->category->name }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('events.tickets.index', ['eventId' => $event->id]) }}"
                                class="bg-primary-400 rounded-lg px-2 py-1 text-sm text-text-950">Daftar Tiket</a>
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
