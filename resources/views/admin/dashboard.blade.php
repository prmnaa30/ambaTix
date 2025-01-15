@extends('layouts.admin')

@section('content')
    <article class="grid grid-cols-6 gap-4">
        <div class="col-span-2 bg-primary-800 px-4 py-2 rounded-lg">
            <p>Total Event</p>
            <p class="text-2xl font-semibold p-4">{{ $eventTotal }}</p>
        </div>
        <div class="col-span-2 bg-primary-800 px-4 py-2 rounded-lg">
            <p>Jumlah Tiket Terjual</p>
            <p class="text-2xl font-semibold p-4">{{ $ticketSold }}</p>
        </div>
        <div class="col-span-2 bg-primary-800 px-4 py-2 rounded-lg">
            <p>Jumlah Transaksi Berhasil</p>
            <p class="text-2xl font-semibold p-4">{{ $transactionTotal }}</p>
        </div>
        <div class="col-span-6 bg-primary-800 px-4 py-2 rounded-lg">
            <div class="flex justify-between">
                <p>Tren Penjualan Tiket</p>
                <form class="flex gap-2" action="{{ route('admin') }}">
                    <select name="year" id="year" class="rounded-lg px-2 focus:outline-primary-500">
                        <option value="" selected>Tahun</option>
                        @for ($i = 2020; $i <= date('Y'); $i++)
                            <option value="{{ $i }}" {{ $i == $selectedYear ? 'selected' : '' }}>
                                {{ $i }}</option>
                        @endfor
                    </select>

                    <select name="month" id="month" class="rounded-lg px-2 focus:outline-primary-500">
                        <option value="" selected>Bulan</option>
                        @foreach ($monthNames as $index => $month)
                            <option value="{{ $index }}" {{ $index == $selectedMonth ? 'selected' : '' }}>
                                {{ $month }}</option>
                        @endforeach
                    </select>

                    <button class="bg-primary-500 hover:bg-primary-400 hover:text-text-950 transition-all duration-500 ease rounded-lg p-2" type="submit">Tampilkan</button>
                </form>
            </div>

            <canvas id="visualize"></canvas>

            <script>
                console.log('Labels:', @json($transactionTrends->pluck('date')));
                console.log('Data:', @json($transactionTrends->pluck('total')));
                const ctx = document.getElementById("visualize");
                const transactionTrends = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: @json(
                            $transactionTrends->isNotEmpty()
                                ? ($selectedYear && $selectedMonth
                                    ? $transactionTrends->pluck('date')
                                    : ($selectedYear
                                        ? $transactionTrends->pluck('month')->map(function ($month) use ($monthNames) {
                                            return $monthNames[$month];
                                        })
                                        : $transactionTrends->pluck('year')))
                                : []
                        ),
                        datasets: [{
                            label: 'Jumlah Tiket Terjual',
                            data: @json($transactionTrends->pluck('total')),
                            borderWidth: 1
                        }],
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

        </div>
        <div class="col-span-3 bg-primary-800 px-4 py-2 rounded-lg">
            <p>Total Pelanggan</p>
            <p class="text-2xl font-semibold p-4">{{ $userTotal }}</p>
        </div>
        <div class="col-span-3 bg-primary-800 px-4 py-2 rounded-lg">
            <p>Total Keuntungan</p>
            <p class="text-2xl font-semibold p-4">Rp. {{ $profit }}</p>
        </div>

    </article>
@endsection
