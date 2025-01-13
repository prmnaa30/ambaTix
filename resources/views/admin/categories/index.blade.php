@extends('layouts.admin')

@section('content')
    <section class="flex flex-col gap-4">
        <a href="{{ route('kategori.create') }}" class="bg-primary-500 rounded-lg p-2 w-fit">Tambah Kategori Event</a>

        <div class="grid grid-cols-5 gap-4">
            @foreach ($categories as $category)
                <div class="bg-primary-800 rounded-lg p-2 flex flex-col gap-2">
                    <table>
                        <tr>
                            <td>Kategori</td>
                            <td>: {{ $category->name }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Event</td>
                            <td>: {{ $category->events_count }}</td>
                        </tr>
                    </table>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('kategori.edit', $category->id) }}" class="bg-orange-500 rounded-lg p-1">
                            <img src="{{ asset('icons/Edit.svg') }}" alt="">
                        </a>
                        <form action="{{ route('kategori.destroy', $category->id) }}" method="POST" class="flex">
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
    </section>
@endsection
