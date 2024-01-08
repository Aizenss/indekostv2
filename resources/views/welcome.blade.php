@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
<div class="sm:ml-64 ">
        <section class="corausel bg-lime-700 p-4">
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
                <span class="font-medium text-sm lg:text-xl text-gray-900 mt-3">Indekost adalah platform pencarian kost terkemuka yang
                    didedikasikan untuk menyediakan solusi terbaik bagi para pencari tempat tinggal. Kami berkomitmen untuk
                    memudahkan proses pencarian kost dengan menyediakan informasi yang akurat, foto-foto berkualitas, dan
                    fitur pencarian yang canggih.</span>
            </div>
            <div class="benefit text-center my-10">
                <h5 class="mb-2 text-3xl font-bold text-gray-900">Keuntungan ketika mencari lewat <span
                        class="text-lime-700">IN DE KOST</span></h5>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-12 ">
                    <div class="mempermudah ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-24 h-24 mx-auto sm:w-8 sm:h-8 md:w-14 md:h-14 lg:w-18 lg:h-18 xl:w-24 xl:h-24">
                            <path fill-rule="evenodd"
                                d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-semibold text-gray-900 text-sm lg:text-xl">Mempercepat dan mempermudah anda dalam mencari
                            kost</span>
                    </div>
                    <div class="aman">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-24 h-24 mx-auto sm:w-8 sm:h-8 md:w-14 md:h-14 lg:w-18 lg:h-18 xl:w-24 xl:h-24">
                            <path
                                d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
                        </svg>
                        <span class="font-semibold text-gray-900 text-sm lg:text-xl">Dijamin tempat yang sudah terdaftar aman dan
                            nyaman</span>
                    </div>
                    <div class="aman">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="w-24 h-24 mx-auto sm:w-8 sm:h-8 md:w-14 md:h-14 lg:w-18 lg:h-18 xl:w-24 xl:h-24">
                            <path fill-rule="evenodd"
                                d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="font-semibold text-gray-900 text-sm lg:text-xl">Pembayaran dijamin aman karena telah di kelola
                            oleh admin yang terpercaya</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="kamarkami bg-lime-700 p-8">
            <h1 class="font-semibold text-2xl text-gray-900 text-white text-center mt-3">Kamar Tersedia</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 my-8">
                <a href="">
                    <div class="max-w-sm bg-white rounded-lg shadow-xl">
                        <img class="rounded-t-lg" src="{{ asset('foto/header1.jpeg') }}" alt="" />
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Nama Kost</h5>
                            <p class="mb-3 font-normal text-gray-700">Here are the biggest enterprise
                                technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="max-w-sm bg-white rounded-lg shadow-xl">
                    <img class="rounded-t-lg" src="{{ asset('foto/header1.jpeg') }}" alt="" />
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Nama Kost</h5>
                        <p class="mb-3 font-normal text-gray-700">Here are the biggest enterprise
                            technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
                </div>
            </a>
                <a href="">
                    <div class="max-w-sm bg-white rounded-lg shadow-xl">
                        <img class="rounded-t-lg" src="{{ asset('foto/header1.jpeg') }}" alt="" />
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Nama Kost</h5>
                            <p class="mb-3 font-normal text-gray-700">Here are the biggest enterprise
                                technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="max-w-sm bg-white rounded-lg shadow-xl">
                        <img class="rounded-t-lg" src="{{ asset('foto/header1.jpeg') }}" alt="" />
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Nama Kost</h5>
                            <p class="mb-3 font-normal text-gray-700">Here are the biggest enterprise
                                technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="max-w-sm bg-white rounded-lg shadow-xl">
                        <img class="rounded-t-lg" src="{{ asset('foto/header1.jpeg') }}" alt="" />
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Nama Kost</h5>
                            <p class="mb-3 font-normal text-gray-700">Here are the biggest enterprise
                                technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="max-w-sm bg-white rounded-lg shadow-xl">
                        <img class="rounded-t-lg" src="{{ asset('foto/header1.jpeg') }}" alt="" />
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Nama Kost</h5>
                            <p class="mb-3 font-normal text-gray-700">Here are the biggest enterprise
                                technology acquisitions of 2021 so far, in reverse chronological order.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="text-center">
                <a href="" class="bg-lime-800 text-white font-medium text-lg rounded-lg sm:text-sm p-4">Lihat Selengkapnya</a>
            </div>
        </section>
    </div>
    @endsection
