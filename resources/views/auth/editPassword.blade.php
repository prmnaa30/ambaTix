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
                <form action="{{ route('updatePassword') }}" method="POST" class="flex flex-col gap-3">
                    @csrf

                    <x-form-group 
                        inputTag="input" 
                        id="old_password" 
                        name="old_password" 
                        type="password" 
                        placeholder="Masukkan Password Lama" 
                        label="Password Lama"
                        minlenght="8"
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="password" 
                        name="password" 
                        type="password" 
                        placeholder="Masukkan Password" 
                        label="Password"
                        minlength="8"
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        placeholder="Masukkan Password" 
                        label="Konfirmasi Password" 
                    />
                    
                    <button type="submit" class="bg-primary-400 rounded-lg px-4 py-2 mt-2 text-text-950 hover:bg-primary-300 transition-colors duration-500">Simpan</button>
                </form>
            </div>
        </div>
    </section>
@endsection

