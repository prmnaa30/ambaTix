@extends($layout)

@section('content')

    <div id="container" class="bg-primary-800 rounded-2xl grid grid-cols-2  py-8 px-10">
        <div id="eventPict" class="bg-primary-600 p-8 justify-items-center rounded-xl">
            <img src="{{ asset('images/diesteria-vol2.jpg') }}" alt="Event" style="width: 588px; height: 700px; object-fit: cover;" class="rounded-2xl ">
        </div>
        <div id="eventPayment" class="pl-4 rounded-xl">
            
            <div class="bg-primary-600 rounded-lg p-5 w-auto">
                <div class="font-bold text-lg mb-2 mx-4">
                    <p>Metode Pembayaran</p>
                </div>
            </div>

            <div id="eventPrice" class="flex flex-col items-center bg-primary-600 rounded-lg p-5 w-auto mt-4">
                <div class="flex justify-between items-center w-full text-lg font-bold mb-4 px-4">
                    <span>Harga</span>
                    <span class="text-black">Rp 165.000</span>
                </div>
                <button class="w-full bg-primary-400 text-white text-xl font-extrabold py-2 rounded-full hover:bg-primary-500 transition-colors duration-300">
                    Beli Sekarang!
                </button>
            </div>

        </div>
    </div>

@endsection
