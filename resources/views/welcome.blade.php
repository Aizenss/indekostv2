@extends('layout.main')

@extends('layout.sidenavbar')

@section('isi')
    <div class=" mb-20">
        <section class="section-hero bg-[#E8F1E3] pt-20" id="home">
            <div class="mx-[15px] md:mx-[140px] grid grid-cols-1  md:grid-cols-2 gap-4 items-center">
                <div class="textt">
                    <h1 class="text-4xl font-semibold text-[#537256]">Selamat Datang</h1>
                    <h2 class="text-4xl font-semibold text-black mt-3">Di Website In De Kost</h2>
                    <p class="mb-4 mt-3">Indekost adalah platform pencarian kost terkemuka yang didedikasikan untuk
                        menyediakan
                        solusi terbaik bagi para pencari tempat tinggal. Menyediakan informasi yang akurat, foto-foto
                        berkualitas, dan fitur pencarian yang canggih.</p>
                    @if (Auth::guest())
                    <a href="{{ url('/login') }}" class="bg-[#86A789] py-1 px-3 rounded-xl text-white">Mulai<i
                        class="fa-solid fa-arrow-right text-white ms-2"></i></a>
                    @endif
                </div>
                <div class="gambar-wellcome">
                    <img src="{{ asset('ilustrasi/hero-section.png') }}" alt="">
                </div>
            </div>
        </section>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#E8F1E3" fill-opacity="1"
                d="M0,128L17.1,160C34.3,192,69,256,103,250.7C137.1,245,171,171,206,165.3C240,160,274,224,309,224C342.9,224,377,160,411,138.7C445.7,117,480,139,514,138.7C548.6,139,583,117,617,117.3C651.4,117,686,139,720,128C754.3,117,789,75,823,96C857.1,117,891,203,926,234.7C960,267,994,245,1029,213.3C1062.9,181,1097,139,1131,112C1165.7,85,1200,75,1234,80C1268.6,85,1303,107,1337,117.3C1371.4,128,1406,128,1423,128L1440,128L1440,0L1422.9,0C1405.7,0,1371,0,1337,0C1302.9,0,1269,0,1234,0C1200,0,1166,0,1131,0C1097.1,0,1063,0,1029,0C994.3,0,960,0,926,0C891.4,0,857,0,823,0C788.6,0,754,0,720,0C685.7,0,651,0,617,0C582.9,0,549,0,514,0C480,0,446,0,411,0C377.1,0,343,0,309,0C274.3,0,240,0,206,0C171.4,0,137,0,103,0C68.6,0,34,0,17,0L0,0Z">
            </path>
        </svg>
        <section class="tantang-indekost" id="tentang">
            <div class="grid grid-rows-2 gap-4 mx-[15px] md:mx-[140px] my-14">
                <div class="grid grid-cols-2 gap-5 items-center">
                    <div class="apa-itu">
                        <h1 class="text-2xl text-[#537256] font-semibold">Apa Itu In De Kost?</h1>
                        <p class="text-[#252525] text-base font-medium mt-3">In De Kost adalah solusi canggih dari para
                            pengembang untuk memudahkan pencarian tempat kost, dengan menawarkan layanan pengecekan
                            ekstensif terhadap setiap properti yang terdaftar. Kami berkomitmen untuk memastikan bahwa
                            setiap kost yang terdaftar dijamin aman, nyaman, dan layak huni</p>
                    </div>
                    <div class="fapa-itu">
                        <img src="{{ asset('ilustrasi/apa-itu.png') }}" alt="" class="w-[500px]">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-5 items-center">
                    <div class="fapa-itu">
                        <img src="{{ asset('ilustrasi/benefit.png') }}" alt="" class="w-[500px]">
                    </div>
                    <div class="yang-didapatkan">
                        <h1 class="text-2xl text-[#537256] font-semibold">Keuntungan Memakai In De Kost</h1>
                        <p class="text-[#252525] text-base font-medium mt-3">Raih Pengalaman Hunian yang Luar Biasa dengan
                            In De
                            Kost! Berikut Keuntungan Yang Didapat</p>
                    </div>
                </div>
            </div>
            <div id="keuntungan"
                class="px-[15px] md:px-[140px] py-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 items-top bg-[#E8F1E3] text-center">
                <div class="keuntungan-1">
                    <div class="fapa-itu">
                        <img src="{{ asset('ilustrasi/waktu.png') }}" alt="" class="w-[300px]">
                    </div>
                    <div class="yang-didapatkan">
                        <h1 class="text-2xl text-[#537256] font-semibold">Menghemat waktu Dalam Mencari Kost</h1>
                        <p class="text-[#252525] text-base font-medium mt-3">Dengan In De Kost, hematkan waktu dan temukan
                            kost impianmu tanpa repot. Pilihan kost terbaik menanti, membebaskanmu untuk fokus pada
                            momen-momen berharga. Nikmati hidup dengan lebih banyak kebebasan bersama In De Kost!</p>
                    </div>
                </div>
                <div class="keuntungan-1">
                    <div class="fapa-itu">
                        <img src="{{ asset('ilustrasi/aman.png') }}" alt="" class="w-[300px]">
                    </div>
                    <div class="yang-didapatkan">
                        <h1 class="text-2xl text-[#537256] font-semibold">Keamanan dalam bayar berbayar</h1>
                        <p class="text-[#252525] text-base font-medium mt-3">Keamanan pembayaran Anda adalah prioritas utama
                            kami. Sistem pembayaran In De Kost diawasi secara cermat oleh tim admin terpercaya,
                            memberikan jaminan keamanan tak tertandingi.</p>
                    </div>
                </div>
                <div class="keuntungan-1">
                    <div class="fapa-itu">
                        <img src="{{ asset('ilustrasi/enjoy.png') }}" alt="" class="w-[300px]">
                    </div>
                    <div class="yang-didapatkan">
                        <h1 class="text-2xl text-[#537256] font-semibold">Kost dipastikan aman dan nyaman</h1>
                        <p class="text-[#252525] text-base font-medium mt-3">Kami mengutamakan keamanan dan kenyamanan di
                            setiap tempat kost yang terdaftar. Dengan fasilitas terjaga dan lingkungan yang aman, In De Kost
                            memberikan rasa nyaman sejak langkah pertama Anda</p>
                    </div>
                </div>
            </div>
        </section>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#E8F1E3" fill-opacity="1"
                d="M0,160L8,170.7C16,181,32,203,48,224C64,245,80,267,96,256C112,245,128,203,144,202.7C160,203,176,245,192,234.7C208,224,224,160,240,160C256,160,272,224,288,229.3C304,235,320,181,336,154.7C352,128,368,128,384,138.7C400,149,416,171,432,160C448,149,464,107,480,106.7C496,107,512,149,528,186.7C544,224,560,256,576,261.3C592,267,608,245,624,208C640,171,656,117,672,96C688,75,704,85,720,128C736,171,752,245,768,282.7C784,320,800,320,816,288C832,256,848,192,864,160C880,128,896,128,912,149.3C928,171,944,213,960,229.3C976,245,992,235,1008,229.3C1024,224,1040,224,1056,202.7C1072,181,1088,139,1104,112C1120,85,1136,75,1152,90.7C1168,107,1184,149,1200,181.3C1216,213,1232,235,1248,250.7C1264,267,1280,277,1296,250.7C1312,224,1328,160,1344,154.7C1360,149,1376,203,1392,202.7C1408,203,1424,149,1432,122.7L1440,96L1440,0L1432,0C1424,0,1408,0,1392,0C1376,0,1360,0,1344,0C1328,0,1312,0,1296,0C1280,0,1264,0,1248,0C1232,0,1216,0,1200,0C1184,0,1168,0,1152,0C1136,0,1120,0,1104,0C1088,0,1072,0,1056,0C1040,0,1024,0,1008,0C992,0,976,0,960,0C944,0,928,0,912,0C896,0,880,0,864,0C848,0,832,0,816,0C800,0,784,0,768,0C752,0,736,0,720,0C704,0,688,0,672,0C656,0,640,0,624,0C608,0,592,0,576,0C560,0,544,0,528,0C512,0,496,0,480,0C464,0,448,0,432,0C416,0,400,0,384,0C368,0,352,0,336,0C320,0,304,0,288,0C272,0,256,0,240,0C224,0,208,0,192,0C176,0,160,0,144,0C128,0,112,0,96,0C80,0,64,0,48,0C32,0,16,0,8,0L0,0Z">
            </path>
        </svg>
        <section class="kamarkami px-[8px] lg:px-[140px] py-8 " id="listkost">
            <div class="flex justify-between items-center">
                <div class="judul">
                    <h1 class="font-semibold text-2xl text-black text-center mt-3">Kost Tersedia</h1>
                </div>
                <div class="text-center">
                    <a href="{{ route('user.kamarkami') }}"
                        class="bg-[#86A789] text-white font-medium text-lg rounded-lg sm:text-sm p-2 shadow-lg hover:bg-[#4F6F52] hover:shadow-2xl hover:shadow-[#4F6F52] duration-300">Lihat
                        Selengkapnya</a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-8 mb-10">
                @forelse ($kost as $kos)
                    <a href="{{ route('user.detailkost', ['kos' => $kos->id]) }}" class="text-decoration-none">
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                            <img class="rounded-t-lg" src="{{ asset('kosts/' . $kos->foto_depan) }}" alt="" />
                            <div class="px-5 py-3">
                                <h5 class="text-xl font-bold tracking-tight text-gray-900 truncate">{{ $kos->nama_kost }}
                                </h5>
                                <p class="mb-1 text-sm font-normal text-gray-700 truncate">
                                    <i class="fa-solid fa-map-location-dot me-3"></i>{{ $kos->lokasi }}
                                </p>
                                <hr class="mb-2">
                                @php
                                    $kamartersedia = $kos->kamar->where('status', 'kosong')->count();
                                @endphp
                                @if ($kamartersedia > 0)
                                    <span class="text-base text-gray-700 font-semibold truncate">Tersedia
                                        {{ $kamartersedia }} Kamar</span>
                                @else
                                    <span class="text-xs text-gray-700 font-semibold truncate">Tidak ada kamar yang
                                        tersedia</span>
                                @endif

                                <hr class="mb-2">
                                <span class="text-lg font-semibold text-gray-700">Fasilitas</span>
                                <div class="grid grid-cols-2 gap-2">
                                    @if ($kos->fasilitas_umum == null)
                                    @else
                                        @foreach (json_decode($kos->fasilitas_umum) as $fasilitas)
                                            <span class="text-sm text-gray-700 font-medium truncate">
                                                <i class="fa-solid fa-check me-2"></i>{{ $fasilitas->value }}
                                            </span>
                                        @endforeach
                                    @endif
                                </div>
                                @php
                                    $totalRating = 0;
                                    $numberOfRatings = count($kos->ulasan);

                                    foreach ($kos->ulasan as $rating) {
                                        $totalRating += $rating->rating;
                                    }

                                    $averageRating = $numberOfRatings > 0 ? number_format(round($totalRating / $numberOfRatings, 2), 1, '.', ',') : 0;
                                @endphp

                                <div class="flex justify-between items-end gap-3">
                                    <div class="rate mb-1 font-semibold text-lg">
                                        <i class="fas fa-star text-yellow-300"> </i>{{ $averageRating }}/5
                                    </div>
                                    <div
                                        class="hover:bg-[#4F6F52] duration-300 bg-[#739072] py-1 px-2 font-semibold text-medium text-white rounded-lg text-center mt-5">
                                        Detail Kost
                                    </div>
                                </div>

                            </div>
                        </div>
                    </a>
                @empty
                    <div class=" flex justify-center align-middle">
                        <img src="{{ asset('ilustrasi/Empty-amico 1.png') }}" class="size-52" alt="">
                    </div>
                @endforelse
            </div>
        </section>
    </div>
@endsection
