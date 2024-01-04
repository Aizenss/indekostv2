@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="p-4 sm:ml-64">
        <section class="corausel">
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('foto/header1.jpeg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('foto/header2.jpeg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('foto/header3.jpeg') }}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                </div>
            </div>
        </section>
        <section class="tentang my-10">
            <div class="text-center">
                <h1 class="font-semibold text-3xl text-gray-900">Tentang Kami</h1>
                <span class="font-medium text-xl text-gray-900">Indekost adalah platform pencarian kost terkemuka yang
                    didedikasikan untuk menyediakan solusi terbaik bagi para pencari tempat tinggal. Kami berkomitmen untuk
                    memudahkan proses pencarian kost dengan menyediakan informasi yang akurat, foto-foto berkualitas, dan
                    fitur pencarian yang canggih.</span>
            </div>
            <div class="benefit text-center mt-5">
                <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Keuntungan ketika mencari lewat <span class="text-lime-700">IN DE KOST</span></h5>
                
            </div>
        </section>
    </div>
@endsection
