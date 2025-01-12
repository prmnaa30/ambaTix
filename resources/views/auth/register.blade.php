@extends('layouts.guest')

@section('content')
    <section class="bg-primary-800 text-text-100 flex justify-center items-center rounded-2xl py-24">
        <div class="w-2/6 flex flex-col gap-4">
            <h1 class="text-text-950 bg-secondary-400 p-2 rounded-lg text-center">Daftar Akun Ambatix</h1>
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
                <form action="" method="POST" class="flex flex-col gap-3">
                    @csrf
                    @method('POST')
                    <x-form-group 
                        inputTag="input" 
                        id="email" 
                        name="email" 
                        type="email" 
                        placeholder="Masukkan Email" 
                        label="Email"
                        value="{{ old('email') }}"
                    />
                    <x-form-group 
                        inputTag="input"
                        id="nama_lengkap"
                        name="nama_lengkap"
                        type="name"
                        placeholder="Masukkan Nama Lengkap"
                        label="Nama Lengkap"
                        value="{{ old('nama_lengkap') }}"
                    />
                    <x-form-group 
                        inputTag="input"
                        id="nama_panggilan"
                        name="nama_panggilan"
                        type="text"
                        placeholder="Masukkan Nama Panggilan"
                        label="Nama Panggilan"
                        value="{{ old('nama_panggilan') }}"
                    />
                    <x-form-group 
                        inputTag="input"
                        id="phone"
                        name="phone"
                        type="text"
                        placeholder="Masukkan Nomor Telepon"
                        label="Nomor Telepon"
                        value="{{ old('phone') }}"
                    />
                    <x-form-group 
                        inputTag="input"
                        id="alamat"
                        name="alamat"
                        type="name"
                        placeholder="Masukkan Alamat"
                        label="Alamat"
                        value="{{ old('alamat') }}"
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="password" 
                        name="password" 
                        type="password" 
                        placeholder="Masukkan Password" 
                        label="Password"
                        minlengh="8"
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        placeholder="Masukkan Password" 
                        label="Konfirmasi Password" 
                    />
                    <button type="submit" class="bg-primary-400 rounded-lg px-4 py-2 mt-2 text-text-950 hover:bg-primary-300 transition-colors duration-500">Daftar</button>
                </form>
                <p class="text-center text-text-300 text-sm">
                    Sudah punya akun ambaTix?
                    <a href="{{ route('login') }}" class="font-semibold text-text-200 hover:underline transition-all duration-500">Masuk</a>
                </p>
            </div>
        </div>
    </section>
@endsection
