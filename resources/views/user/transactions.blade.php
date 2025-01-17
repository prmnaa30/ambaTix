@extends('layouts.app')

@section('content')

    <div class="mx-auto mt-2 text-lg font-bold">
        <p>Transaksi</p>
    </div>
    <!-- Transaksi Grid -->
    <div class="grid grid-cols-3 gap-6">
        @forelse($transactions as $item)
        <div class="gap-4">
            <table class="bg-primary-800 rounded-lg mx-auto w-full">
                <tr">
                    <td class="pt-12 pl-8">Kode Transaksi</td>
                    <td class="pt-12 pl-8">: {{ $item->transaction_code }}</td>
                </tr>
                <tr>
                    <td class="pl-8">ID Pembeli</td>
                    <td class="pl-8">: {{ $item->user_id }}</td>
                </tr>
                <tr>
                    <td class="pl-8">Total Pembelian</td>
                    <td class="pl-8">: {{ $item->total_quantity }}</td>
                </tr>
                <tr>
                    <td class="pl-8">Total Pembayaran</td>
                    <td class="pl-8">: {{ $item->total_price }}</td>
                </tr>
                <tr>
                    <td class="pb-12 pt-4 pl-8">Status</td>
                    <td class="pb-12 pt-4 pl-8">
                        : @if($item->status == 'pending')
                            <span class="px-2 ml-2 pt-1 pb-2 rounded-full bg-yellow-400 text-yellow-700">{{ $item->status }}</span>
                        @elseif($item->status == 'success')
                            <span class="px-2 ml-2 pt-1 pb-2 rounded-full bg-primary-400 text-white">{{ $item->status }}</span>
                        @else
                            <span class="px-2 ml-2 pt-1 pb-2 rounded-full bg-red-400 text-white">{{ $item->status }}</span>
                        @endif
                    </td>
                </tr>
            </table>
            
        </div>  
        @empty
            <div class="col-span-1 md:col-span-3 text-center text-gray-500">
                Belum ada transaksi yang dilakukan.
            </div>
        @endforelse
    </div>

@endsection
