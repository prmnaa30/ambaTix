@extends('layouts.admin')

@section('content')
    <section class="bg-primary-800 flex justify-center items-center rounded-2xl py-24">
        <div class="w-2/5 flex flex-col gap-4">
            <h1 class="text-text-950 bg-secondary-400 p-2 rounded-lg text-center">Ubah Data Metode Pembayaran</h1>
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
                <form action="{{ route('payment-method.update') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-3">
                    @csrf
                    @method('PUT')
                    <x-form-group 
                        inputTag="input" 
                        id="method_name" 
                        name="method_name" 
                        type="text" 
                        value="{{ $paymentMethod->method_name }}"
                        placeholder="Masukkan Nama Metode Pembayaran" 
                        label="Nama Metode Pembayaran"
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="account_number" 
                        name="account_number" 
                        type="text" 
                        value="{{ $paymentMethod->account_number }}"
                        placeholder="Masukkan Nomor Rekening/Akun" 
                        label="Nomor Rekening/Akun"
                    />
                    <x-form-group 
                        inputTag="input" 
                        id="method_image" 
                        name="method_image" 
                        type="file" 
                        placeholder="Masukkan Gambar/Logo Metode Pembayaran" 
                        accept="image/png, image/webp"
                        label="Gambar/Logo Metode Pembayaran"
                        class="file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:bg-primary-500 file:text-text-950 hover:file:bg-primary-400 file:transition-colors file:duration-500 file:ease file:cursor-pointer"
                    />
                    <button type="submit" class="bg-primary-500 hover:bg-primary-400 hover:text-text-950 hover:scale-[1.01] transition-all duration-500 ease rounded-lg mt-3 p-2 w-full">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </section>
@endsection