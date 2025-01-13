@extends($layout)

@section('content')

    <div id="container" class="bg-primary-800 rounded-2xl py-10 px-16 flex justify-center">
        <div class="w-2/3 p-8 rounded-lg bg-primary-950 items-center text-center">
            <p class="font-bold">Selesaikan Pembayaran dalam</p>
            <p id="countdown" class="text-3xl mt-4 text-yellow-500 font-bold"></p>

            <!-- Pembayaran menggunakan metode pilihan -->
            <div class="grid grid-cols-3 gap-4 mt-4 border-2 border-primary-400 rounded-xl p-4">
                <div class="col-span-2 border border-primary-400 mx-auto px-8 py-4 rounded-md w-full text-left text-gray-500 font-medium">

                    <div class="mb-4">
                        <p>Nomor Akun Virtual</p>
                        <div class="flex">
                            <p class="font-bold text-2xl text-black" id="virtual-account-number">8123456789012345</p>
                            <button id="copy-button" class="text-sm ml-4">Copy</button>
                        </div>
                    </div>

                    <div class="mb-4">
                        <p>Total</p>
                        <p class="font-bold text-2xl text-black">Rp. 0</p>
                    </div>

                    <div>
                        <p>Nomor Faktur</p>
                        <p class="font-bold text-2xl text-black">INV-20250101-1234</p>
                    </div>

                </div>
                <div class="col-span-1 border border-primary-400 rounded-md flex justify-center">
                    <img src="{{ asset('icons/bank-bni.svg') }}" alt="Logo BNI" class="rounded-md px-4 py-2">                 
                </div>
            </div>

            <p class="my-4 text-gray-500">Mengalami masalah dengan transaksi ini? <span><a href="" class="font-bold text-primary-400 hover:text-primary-600 transition-all duration-500">Hubungi Kami</a></span></p>

            <!-- Tutorial Bayar -->
            <div class="p-4 border rounded-lg text-left">
                <h3 class="text-lg font-bold mb-2">Cara Membayar</h3>

                <!-- Tab Navigation -->
                <div class="flex border-b mb-4">
                    <button class="px-4 py-2 text-blue-600 border-b-2 border-blue-600 focus:outline-none">MBanking</button>
                </div>

                <!-- MBanking Section -->
                <div>
                    <h4 class="text-md font-semibold mb-2">Masuk Ke Akun Anda</h4>
                    <ol class="list-decimal list-inside text-gray-700 space-y-2">
                        <li>Buka BNI Mobile Banking dari ponsel Anda.</li>
                        <li>Masukkan User ID dan Password Anda.</li>
                        <li>Pilih menu "Transfer".</li>
                    </ol>

                    <h4 class="text-md font-semibold mt-4 mb-2">Rincian Pembayaran</h4>
                    <ol class="list-decimal list-inside text-gray-700 space-y-2">
                        <li>Pilih menu "Tagihan Virtual Account" dan kemudian pilih akun debit.</li>
                        <li>
                            Masukkan Nomor Virtual Account Anda 
                            <span class="font-bold text-blue-600">8123456789012345</span> 
                            pada menu "Input Baru".
                        </li>
                        <li>Jumlah tagihan akan ditampilkan di layar.</li>
                        <li>Konfirmasi transaksi dan masukkan PIN Anda.</li>
                    </ol>

                    <h4 class="text-md font-semibold mt-4 mb-2">Transaksi Selesai</h4>
                    <p class="text-gray-700">
                        Setelah transaksi pembayaran selesai, faktur ini akan diperbarui secara otomatis.
                        Ini mungkin memerlukan waktu hingga 5 menit.
                    </p>
                </div>
            </div>

        </div>

    </div>

    <script>
        // Set waktu countdown (dalam detik)
        var waktuCountdown = 30 * 60; // 30 menit

        // Tampilkan waktu countdown
        var countdownElement = document.getElementById('countdown');
        countdownElement.innerHTML = formatWaktu(waktuCountdown);

        // Fungsi untuk memformat waktu
        function formatWaktu(waktu) {
            var menit = Math.floor(waktu / 60);
            var detik = waktu % 60;
            return `${menit.toString().padStart(2, '0')}:${detik.toString().padStart(2, '0')}`;
        }

        // Fungsi untuk mengupdate waktu countdown
        function updateCountdown() {
            waktuCountdown--;
            countdownElement.innerHTML = formatWaktu(waktuCountdown);

            // Jika waktu countdown habis, lakukan aksi
            if (waktuCountdown <= 0) {
                // Aksi ketika waktu countdown habis
                console.log('Waktu countdown habis!');
            } else {
                // Update waktu countdown setiap detik
                setTimeout(updateCountdown, 1000);
            }
        }

        // Mulai countdown
        updateCountdown();

        // Copy Nomor VA
        document.getElementById('copy-button').addEventListener('click', function() {
            var virtualAccountNumber = document.getElementById('virtual-account-number').textContent;
            navigator.clipboard.writeText(virtualAccountNumber).then(function() {
                console.log('Nomor akun virtual telah disalin');
                alert('Nomor akun virtual telah disalin');
            });
        });
    </script>
@endsection

