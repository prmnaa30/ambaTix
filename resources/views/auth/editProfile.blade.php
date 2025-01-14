@extends('layouts.app')

@section('content')

    <section class="bg-primary-800 text-text-100 flex justify-center items-center rounded-2xl py-24">
        <div class="w-2/6 flex flex-col gap-4">
            <h1 class="text-text-950 bg-secondary-400 p-2 rounded-lg text-center">Ubah Profil</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="flex flex-col gap-2 px-3">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('updateProfile') }}" method="POST" class="flex flex-col gap-3">
                    @csrf

                    <x-form-group 
                        inputTag="input"
                        id="nama_lengkap"
                        name="nama_lengkap"
                        type="name"
                        placeholder="Masukkan Nama Lengkap"
                        label="Nama Lengkap"
                        value="{{ $user->nama_lengkap }}"
                    />
                    <x-form-group 
                        inputTag="input"
                        id="nama_panggilan"
                        name="nama_panggilan"
                        type="text"
                        placeholder="Masukkan Nama Panggilan"
                        label="Nama Panggilan"
                        value="{{ $user->nama_panggilan }}"
                    />
                    <x-form-group 
                        inputTag="input"
                        id="phone"
                        name="phone"
                        type="text"
                        placeholder="Masukkan Nomor Telepon"
                        label="Nomor Telepon"
                        value="{{ $user->phone }}"
                    />
                    <x-form-group 
                        inputTag="input"
                        id="alamat"
                        name="alamat"
                        type="name"
                        placeholder="Masukkan Alamat"
                        label="Alamat"
                        value="{{ $user->alamat }}"
                    />
                    <button type="submit" class="bg-primary-400 rounded-lg px-4 py-2 mt-2 text-text-950 hover:bg-primary-300 transition-colors duration-500">Simpan</button>
                </form>
            </div>
        </div>
    </section>
@endsection

