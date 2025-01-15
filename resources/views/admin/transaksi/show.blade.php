@extends('layouts.admin')

@section('content')
    <section class="flex flex-col gap-4">
        <h1 class="bg-primary-500 rounded-lg p-2 w-fit">Detail Transaksi</h1>

        <div class="grid grid-cols-2 gap-12">
            {{-- Pembeli dan Pembayaran --}}
            <div class="flex flex-col gap-8">
                <div>
                    <h2 class="font-semibold pb-2 border-b-2">Detail Pembeli</h2>
                    <table>
                        <tr>
                            <td class="w-40">Nama Lengkap</td>
                            <td>: {{ $transaction->user->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {{ $transaction->user->email }}</td>
                        </tr>
                        <tr>
                            <td>No Telp</td>
                            <td>: {{ $transaction->user->phone }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: {{ $transaction->user->alamat }}</td>
                        </tr>
                    </table>
                </div>
                <div>
                    <h2 class="font-semibold pb-2 border-b-2">Metode Pembayaran</h2>
                    <table>
                        <tr>
                            <td>
                                <img src="{{ $paymentMethod->method_image_url ?? '' }}" alt="" class="w-28 h-28">
                            </td>
                            {{-- <td>{{ $paymentMethod->method_name ?? 'Tidak ada metode pembayaran' }}</td> --}}
                        </tr>
                    </table>
                </div>
            </div>

            {{-- Pembelian --}}
            <div>
                <h2 class="font-semibold pb-2 border-b-2">Detail Pembelian</h2>
                <table>
                    <tr>
                        <td class="w-40">Kode Transaksi</td>
                        <td>: {{ $transaction->transaction_code }}</td>
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
                        <td>Tanggal Pembelian</td>
                        <td>: {{ $transaction->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Tiket yang Dibeli</td>
                        <td></td>
                    </tr>
                    @foreach ($transaction->transactionDetails as $detail)
                        <tr>
                            <td> - {{ $detail->ticket->ticket_type }}</td>
                            <td>: {{ $detail->quantity }}x</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Status</td>
                        <td>: {{ $transaction->status }}</td>
                    </tr>
                </table>
            </div>

        </div>
    </section>
@endsection
