@extends('layouts.guest')

@section('content')
    <section class="bg-primary-800 text-text-100 flex justify-center items-center rounded-2xl py-36">
        <div class="w-2/6 flex flex-col gap-4">
            <h1 class="text-text-950 bg-secondary-400 p-2 rounded-lg text-center">Masuk ke Akun Anda</h1>
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
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="password" 
                        name="password" 
                        type="password" 
                        placeholder="Masukkan Password" 
                        label="Password" 
                    />
                    <button type="submit" class="bg-primary-400 rounded-lg px-2 py-1 mt-2 text-text-950 hover:bg-primary-300 transition-colors duration-500">Masuk</button>
                </form>
                <p class="text-center text-sm">atau</p>
                <a href="{{ route('register') }}" class="text-center border-2 border-primary-400 rounded-lg px-2 py-1 hover:bg-primary-400 hover:text-text-950 transition-colors duration-500">Daftar Akun Ambatix</a>
            </div>
        </div>
    </section>
@endsection
