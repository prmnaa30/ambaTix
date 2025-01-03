@extends('layouts.admin')

@section('content')
    <section class="bg-primary-800 flex justify-center items-center rounded-2xl py-10">
        <div class="w-2/5 flex flex-col gap-4">
            <h1 class="text-text-950 bg-secondary-400 p-2 rounded-lg text-center">Edit Event</h1>
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
                <form action="{{ route('events.update', $event->id) }}') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-3">
                    @csrf
                    @method('PUT')
                    <x-form-group 
                        inputTag="input" 
                        id="name" 
                        name="name" 
                        type="text"
                        value="{{ $event->name }}"
                        placeholder="Masukkan Nama Event" 
                        label="Nama Event" 
                    />
                    <x-form-group 
                        inputTag="textarea"
                        id="description"
                        name="description"
                        value="{{ $event->description }}"
                        placeholder="Masukkan Deskripsi Event"
                        label="Deskripsi Event" 
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="location" 
                        name="location" 
                        type="text"
                        value="{{ $event->location }}"
                        placeholder="Masukkan Lokasi Event" 
                        label="Lokasi Event" 
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="date" 
                        name="date" 
                        type="date"
                        value="{{ $event->date }}"
                        placeholder="Masukkan Tanggal Event" 
                        label="Tanggal Event" 
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="category" 
                        name="category" 
                        type="text"
                        value="{{ $event->category }}"
                        placeholder="Masukkan Kategori Event" 
                        label="Kategori Event" 
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="organizer_name"
                        name="organizer_name" 
                        type="text"
                        value="{{ $event->organizer_name }}"
                        placeholder="Masukkan Penyelenggara Event" 
                        label="Penyelenggara Event" 
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="imageInput" 
                        name="imageInput" 
                        type="file"
                        placeholder="Masukkan Poster Event" 
                        accept="image/png, image/webp"
                        label="Poster Event"
                        class="file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:bg-primary-500 file:text-text-950 hover:file:bg-primary-400 file:transition-colors file:duration-500 file:ease file:cursor-pointer"
                    />
    
                    <button type="submit" class="bg-primary-500 hover:bg-primary-400 hover:text-text-950 hover:scale-[1.01] transition-all duration-500 ease rounded-lg mt-3 p-2 w-full">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </section>
@endsection