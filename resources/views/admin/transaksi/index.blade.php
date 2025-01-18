@extends('layouts.admin')

@section('content')
    <section class="flex flex-col gap-4">
        <p class="bg-primary-500 rounded-lg p-2 w-fit">Transaksi</p>

        <p>Transaksi Pending</p>
        <div class="grid grid-cols-2 gap-4">
            @forelse ($transactionsPending as $index => $transaction)
                <div class="flex justify-between items-center gap-4 bg-primary-800 rounded-lg p-2">
                    <p>{{ $index + 1 }}</p>
                    <p>{{ $transaction->transaction_code }}</p>
                    <p>{{ $transaction->created_at }}</p>
                    <div class="flex gap-2">
                        <form action="{{ route('admin.transaksi.update', $transaction->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="failed">
                            <button type="submit" class="bg-red-500 text-text-900 rounded-lg px-2 py-1 w-fit">Gagal</button>
                        </form>
                        <form action="{{ route('admin.transaksi.update', $transaction->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="success">
                            <button type="submit" class="bg-accent-200 text-text-900 rounded-lg px-2 py-1 w-fit">Sukses</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>-</p>
            @endforelse
        </div>

        <p>Transaksi Berhasil</p>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($transactionsSuccess as $transaction)
                <a href="{{ route('admin.transaksi.show', $transaction->id) }}" class="bg-primary-800 hover:bg-primary-600 transition-all duration-500 rounded-lg p-2 w-full">
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

        <p>Transaksi Gagal</p>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($transactionsFailed as $transaction)
                <a href="{{ route('admin.transaksi.show', $transaction->id) }}" class="bg-primary-800 hover:bg-primary-600 transition-all duration-500 rounded-lg p-2 w-full">
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
