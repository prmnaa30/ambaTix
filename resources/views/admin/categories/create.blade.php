@extends('layouts.admin')

@section('content')
    <section class="bg-primary-800 flex justify-center items-center rounded-2xl py-24">
        <div class="w-2/5 flex flex-col gap-4">
            <h1 class="text-text-950 bg-secondary-400 p-2 rounded-lg text-center">Tambah Kategori Event</h1>
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
                <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-3 mt-24">
                    @csrf
                    @method('POST')
                    <x-form-group 
                        inputTag="input" 
                        id="name" 
                        name="name" 
                        type="text" 
                        placeholder="Masukkan Kategori Event" 
                        label="Kategori Event"
                        class="mb-24"
                    />
                    <button type="submit" class="bg-primary-500 hover:bg-primary-400 hover:text-text-950 hover:scale-[1.01] transition-all duration-500 ease rounded-lg mt-3 p-2 w-full">Tambah Kategori</button>
                </form>
            </div>
        </div>
    </section>
@endsection