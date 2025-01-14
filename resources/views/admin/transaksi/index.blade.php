@extends('layouts.admin')

@section('content')
    <section class="flex flex-col gap-4">
        <p class="bg-primary-500 rounded-lg p-2 w-fit">Transaksi</p>

        <p>Transaksi Pending</p>
        <div class="grid grid-cols-2 gap-4">
            @foreach ($transactionsPending as $transaction)
                <div class="flex justify-between items-center gap-4 bg-accent-400/50 rounded-lg p-2">
                    <p>{{ $transaction->transaction_code }}</p>
                    <form action="{{ route('transaksi.update', $transaction->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-primary-500 rounded-lg p-1 w-fit">Verifikasi</button>
                    </form>
                </div>
            @endforeach
        </div>

        <p>Transaksi Berhasil</p>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($transactionsSuccess as $transaction)
                <a href="{{ route('transaksi.show', $transaction->id) }}" class="bg-primary-500 rounded-lg p-2 w-full">
                    <table>
                        <tr>
                            <td>Kode Transaksi</td>
                            <td>: {{ $transaction->transaction_code }}</td>
                        </tr>
                        <tr>
                            <td>ID Pembeli</td>
                            <td>: {{ $transaction->user_id }}</td>
                        </tr>
                        <tr>
                            <td>Total Pembayaran</td>
                            <td>: {{ $transaction->total_price }}</td>
                        </tr>
                        <tr>
                            <td>Total Pembelian</td>
                            <td>: {{ $transaction->total_quantity }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: {{ $transaction->status }}</td>
                        </tr>
                    </table>
                </a>
            @endforeach
        </div>
    </section>
@endsection
