@extends('layouts.admin')

@section('content')
    <section class="flex flex-col gap-4">
        <a href="{{ route('payment-method.create') }}" class="bg-primary-500 rounded-lg p-2 w-fit">Tambah Metode Pembayaran</a>

        <div class="grid grid-cols-3 gap-4">
            @foreach ($paymentMethods as $method)
                <div class="bg-primary-800 rounded-lg p-2 flex gap-2">
                    <div class="bg-accent-400/50 rounded">
                        <img src="{{ $method->method_image_url }}" alt="" class="w-28 h-28 object-cover rounded">
                    </div>

                    <div class="flex flex-col justify-between">
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>: {{ $method->method_name }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Akun</td>
                                <td>: {{ $method->account_number }}</td>
                            </tr>
                        </table>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('payment-method.edit', $method->id) }}" class="bg-orange-500 rounded-lg p-1">
                                <img src="{{ asset('icons/Edit.svg') }}" alt="">
                            </a>
                            <form action="{{ route('payment-method.destroy', $method->id) }}" method="POST" class="flex">
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
