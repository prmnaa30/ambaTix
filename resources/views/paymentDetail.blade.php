@extends($layout)

@section('content')
    <div class="flex justify-center gap-4">
        
        <div class="flex">
            <img src="{{ asset('icons/one-400.svg') }}" alt="one" class="bg-primar-400">
            <p class="mt-1 text-primary-400 font-bold text-lg">Detail Pembeli</p>
            <div class="w-8 h-1 bg-primary-500 ml-4 mt-4"></div>
            <div class="w-8 h-1 bg-black mt-4"></div>
        </div>
        
        <div class="flex">

            <img src="{{ asset('icons/two.svg') }}" alt="two">
            <p class="mt-1 font-bold text-lg">Pembayaran</p>
        </div>

    </div>

    <div id="container" class="bg-primary-800 rounded-2xl grid grid-cols-2  py-8 px-10">

        <div id="eventTicket" class="bg-primary-600 p-5 rounded-xl">
            <p class="font-bold text-lg pl-4">Detail Pembeli</p>
            
            <form class="border-2 border-primary-400 rounded-lg mt-2">
                <div class="p-4 pb-0">
                    <p>Email</p>
                    <input type="email" class="w-full p-2 rounded-lg border border-primary-400" placeholder="Masukkan email">
                </div>
                <div class="p-4 pb-0">
                    <p>Nama Lengkap</p>
                    <input type="text" class="w-full p-2 rounded-lg border border-primary-400" placeholder="Masukkan nama lengkap">
                </div>
                <div class="p-4 pb-0">
                    <p>Tanggal Lahir</p>
                    <input type="date" class="w-full p-2 rounded-lg border border-primary-400">
                </div>
                <div class="p-4">
                    <p>Jenis Kelamin</p>
                    <select class="w-full p-2 rounded-lg border border-primary-400">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
            </form>

            <p class="font-bold text-lg pl-4 mt-4">Pengunjung 1</p>
            
            <form class="border-2 border-primary-400 rounded-lg mt-2">
                <div class="p-2 m-4 bg-primary-400 rounded-lg">
                    <p>Kategori Tiket</p>
                    <p class="font-bold text-lg">Presale 2</p>
                </div>

                <div class="px-4 pb-0">
                    <p>Email</p>
                    <input type="email" class="w-full p-2 rounded-lg border border-primary-400" placeholder="Masukkan email">
                </div>
                <div class="p-4 pb-0">
                    <p>Nama Lengkap</p>
                    <input type="text" class="w-full p-2 rounded-lg border border-primary-400" placeholder="Masukkan nama lengkap">
                </div>
                <div class="p-4 pb-0">
                    <p>Tanggal Lahir</p>
                    <input type="date" class="w-full p-2 rounded-lg border border-primary-400">
                </div>
                <div class="p-4">
                    <p>Jenis Kelamin</p>
                    <select class="w-full p-2 rounded-lg border border-primary-400">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
            </form>

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

                    <div class="mt-4 border-b-2 border-primary-400 pb-4">
                        <span class="ml-4">0 Tiket Dipesan</span>
                    </div>

                    <!-- <div id="payment" class="mt-4 border-b-2 border-primary-400 pb-4">
                        <button href="" class="">
                            <img src="{{ asset('icons/bank-bni.svg') }}" alt="Logo BNI">
                        </button>
                    </div> -->

                    <div id="payment" class="mt-4 border-b-2 border-primary-400 pb-4">
                        <p class="font-bold text-lg mb-2">Pilih Metode Pembayaran</p>
                        
                        <!-- Tombol untuk memilih BNI -->
                        <button class="flex items-center p-2 border-2 border-primary-400 rounded-lg hover:bg-primary-400 transition-colors duration-300">
                            <img src="{{ asset('icons/bank-bni.svg') }}" alt="Logo BNI" class="w-12 h-12">
                            <span class="ml-2 pr-8">Bank BNI</span>
                        </button>

                        <!-- Opsi lain untuk metode pembayaran -->
                        <button class="flex items-center p-2 border-2 border-primary-400 rounded-lg mt-2 hover:bg-primary-400 transition-colors duration-300">
                            <img src="{{ asset('icons/logo-mandiri.svg') }}" alt="Logo Mandiri" class="w-12 h-12">
                            <span class="ml-2">Bank Mandiri</span>
                        </button>

                        <!-- Tambahkan opsi lain sesuai kebutuhan -->
                    </div>

                    <div id="eventPrice" class="flex flex-col items-center bg-primary-600 rounded-lg w-auto mt-4">
                        <div class="flex justify-between items-center w-full text-lg font-bold mb-4 px-4">
                            <span>Total</span>
                            <span class="text-black">Rp 0</span>
                        </div>
                        <button class="w-full bg-primary-400 text-white text-xl font-extrabold py-2 rounded-full hover:bg-primary-500 transition-colors duration-300">
                            Bayar
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
