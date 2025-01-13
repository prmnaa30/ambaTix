@extends($layout)

@section('content')

    <div id="container" class="bg-primary-800 rounded-2xl grid grid-cols-2  py-8 px-10">
        <div id="eventTicket" class="bg-primary-600 p-5 rounded-xl">
            <p class="font-bold text-lg pl-4">Kategori Tiket</p>
            
            <div class="flex pl-4 mx-4 border-2 border-primary-400 rounded-lg justify-between my-2">
                <div class="m-3">
                    <p>Early Bird</p>
                    <p class="font-bold">Rp 102.000</p>
                </div>
                <div class="border-2 border-primary-400 rounded-md p-3 m-3 bg-primary-400">
                    <button class="px-2" disabled>Habis</button>
                </div>
            </div>

            <div class="flex pl-4 mx-4 border-2 border-primary-400 rounded-lg justify-between my-2">
                <div class="m-3">
                    <p>Presale 1</p>
                    <p class="font-bold" >Rp 135.000</p>
                </div>
                <div class="border-2 border-primary-400 rounded-md p-3 m-3 bg-primary-500 hover:bg-primary-800 transition-all duration-500">
                    <button class="tambah-tiket" data-price="135000">Tambah</button>
                </div>
            </div>

            <div class="flex pl-4 mx-4 border-2 border-primary-400 rounded-lg justify-between my-2">
                <div class="m-3">
                    <p>Presale 2</p>
                    <p class="font-bold">Rp 160.000</p>
                </div>
                <div class="border-2 border-primary-400 rounded-md p-3 m-3 bg-primary-500 hover:bg-primary-800 transition-all duration-500">
                    <button class="tambah-tiket" data-price="160000">Tambah</button>
                </div>
            </div>

        </div>


        <div id="eventPayment" class="pl-4 rounded-xl">

            <div id="eventDetail" class="flex flex-col items-center bg-primary-600 rounded-lg p-5 w-auto">
                <div class="justify-between items-center w-full text-lg font-bold mb-4 px-4">
                    <span>Detail Pesanan</span>

                    <div class="flex mt-2 border-b-2 pb-4 border-primary-400">
                        <div>
                            <img src="{{ asset('images/diesteria-vol2.jpg') }}" alt="Event" style="width: 147px; height: 175px; object-fit: cover;" class="rounded-2xl ">
                        </div>

                        <div>
                            <p class="ml-4 text-lg">Diesteria</p>
                            <div class="flex mb-2 ml-4">
                                <img src="{{ asset('icons/calendar-2.svg') }}" alt="Logo Kalender" >
                                <p class="ml-2">15 Juni 2025</p>
                            </div>
                            <div class="flex mb-2 ml-4">
                                <img src="{{ asset('icons/clock.svg') }}" alt="Logo Jam">
                                <p class="ml-2">13:00 WITA - 23:00 WITA</p>
                            </div>
                            <div class="flex mb-2 ml-4">
                                <img src="{{ asset('icons/pinLocation.svg') }}" alt="Logo Lokasi">
                                <a href="" class="ml-2 text-blue-700 hover:text-blue-400 transition-all duration-500">Lapangan Puputan Renon</a>
                            </div>
                        </div>

                    </div>

                    <div id="totalTiket" class="mt-4 border-b-2 border-primary-400 pb-4">
                        <span class="ml-4">0 Tiket Dipesan</span>
                    </div>

                    <div id="eventPrice" class="flex flex-col items-center bg-primary-600 rounded-lg w-auto mt-4">
                        <div class="flex justify-between items-center w-full text-lg font-bold mb-4 px-4">
                            <span>Total</span>
                            <span class="text-black">Rp 0</span>
                        </div>
                        <a href="{{ route('paymentDetail') }}" class="w-full bg-primary-400 text-white text-xl font-extrabold py-2 rounded-full hover:bg-primary-500 transition-colors duration-300">
                            <button class="w-full">
                                Pesan
                            </button>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     const jumlahTiketElement = document.querySelector('#eventDetail .mt-4.border-b-2.pb-4 span');
        //     const totalHargaElement = document.querySelector('#eventPrice .text-black');

        //     let jumlahTiket = 0;
        //     let totalHarga = 0;

        //     // Event delegation untuk tombol "Tambah"
        //     document.getElementById('eventTicket').addEventListener('click', function(event) {
        //         if (event.target.classList.contains('tambah-tiket')) {
        //             // Ambil harga tiket dari atribut data-price
        //             const hargaTiket = parseInt(event.target.getAttribute('data-price'));

        //             // Tambah jumlah tiket dan hitung total harga
        //             jumlahTiket += 1;
        //             totalHarga += hargaTiket;

        //             // Update tampilan
        //             jumlahTiketElement.textContent = `${jumlahTiket} Tiket Dipesan`;
        //             totalHargaElement.textContent = `Rp ${totalHarga.toLocaleString()}`;
        //         }
        //     });
        // });

        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen-elemen yang diperlukan
            const jumlahTiketElement = document.querySelector('#totalTiket span');
            const totalHargaElement = document.querySelector('#eventPrice .text-black');

            // Inisialisasi variabel
            let jumlahTiket = 0;
            let totalHarga = 0;

            // Fungsi untuk menambah tiket
            function tambahTiket(harga) {
                jumlahTiket += 1; // Tambah jumlah tiket
                totalHarga += harga; // Tambah total harga

                // Update tampilan
                jumlahTiketElement.textContent = `${jumlahTiket} Tiket Dipesan`;
                totalHargaElement.textContent = `Rp ${totalHarga.toLocaleString()}`;
            }

            // Event delegation untuk tombol "Tambah"
            document.getElementById('eventTicket').addEventListener('click', function(event) {
                if (event.target.classList.contains('tambah-tiket')) {
                    // Ambil harga tiket dari atribut data-price
                    const hargaTiket = parseInt(event.target.getAttribute('data-price'));

                    // Panggil fungsi tambahTiket
                    tambahTiket(hargaTiket);
                }
            });
        });

    </script>

@endsection
