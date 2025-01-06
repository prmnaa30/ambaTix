@extends($layout)

@section('content')

    <div id="container" class="bg-primary-800 rounded-2xl grid grid-cols-2  py-8 px-10">
        <div id="eventPict" class="bg-primary-600 p-8 justify-items-center rounded-xl">
            <img src="{{ asset('images/diesteria-vol2.jpg') }}" alt="Event" style="width: 588px; height: 700px; object-fit: cover;" class="rounded-2xl ">
        </div>
        <div id="eventDetail" class="pl-4 rounded-xl">
            <div class="bg-primary-600 rounded-lg p-5 w-auto">
                <div class="font-bold text-lg mb-2 mx-4">
                    <p>Diesteria</p>
                </div>
                <div id="event Desc" class="font-normal text-base mb-2 mx-4">
                    <p class="text-justify">Diesteria Vol. II adalah konser musik yang diselenggarakan oleh Institut Bisnis dan Teknologi Indonesia (INSTIKI) pada Sabtu, 15 Juni 2024, di Taman Festival Bali, Padang Galak. Acara ini menghadirkan berbagai artis dan penampil berbakat, termasuk Meiska Adinda dan The Phase, yang membawakan pertunjukan musik pop untuk menghibur para penonton. Tiket presale tahap kedua dijual dengan harga Rp160.000 dan dapat dibeli melalui tautan yang tersedia di bio Instagram resmi @diesteria_instiki. Untuk informasi lebih lanjut, pembaruan, dan detail lainnya, para penggemar dapat mengikuti akun Instagram resmi acara tersebut. Diesteria Vol. II menjadi ajang yang dinanti untuk menikmati musik dan hiburan dalam suasana yang penuh semangat dan kreativitas.</p>
                </div>
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
