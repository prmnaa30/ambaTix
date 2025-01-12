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
                    <p class="font-bold">Rp 135.000</p>
                </div>
                <div class="border-2 border-primary-400 rounded-md p-3 m-3 bg-primary-500 hover:bg-primary-800 transition-all duration-500">
                    <button>Tambah</button>
                </div>
            </div>

            <div class="flex pl-4 mx-4 border-2 border-primary-400 rounded-lg justify-between my-2">
                <div class="m-3">
                    <p>Presale 2</p>
                    <p class="font-bold">Rp 160.000</p>
                </div>
                <div class="border-2 border-primary-400 rounded-md p-3 m-3 bg-primary-500 hover:bg-primary-800 transition-all duration-500">
                    <button>Tambah</button>
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

                    <div class="mt-4 border-b-2 border-primary-400 pb-4">
                        <span class="ml-4">0 Tiket Dipesan</span>
                    </div>

                    <div id="eventPrice" class="flex flex-col items-center bg-primary-600 rounded-lg w-auto mt-4">
                        <div class="flex justify-between items-center w-full text-lg font-bold mb-4 px-4">
                            <span>Total</span>
                            <span class="text-black">Rp 0</span>
                        </div>
                        <button class="w-full bg-primary-400 text-white text-xl font-extrabold py-2 rounded-full hover:bg-primary-500 transition-colors duration-300">
                            Pesan
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
