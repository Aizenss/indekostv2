@extends('layout.main')


@section('css')
    <style>
        .scsm::-webkit-scrollbar {
            width: 10px;
            color: black;
        }

        .rating .fa-star {
            color: #FEC553;
            cursor: pointer;
            transition-duration: 300ms;
        }

        .scsm::scr .rating .fa-star {
            color: rgb(218, 218, 4);
            cursor: pointer;
        }

        .fa-star:hover {
            transform: scale(1.1);
        }
    </style>
@endsection

@section('isi')
    <div class="py-10 px-[140px]">
        <section class="image">
            <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{ asset('kosts/' . $kos->foto_depan) }}"
                            class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="{{ asset('kosts/' . $kos->foto_dalam) }}"
                            class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="">
                    </div>
                    @if (!empty(json_decode($kos->foto_tambahan)))
                        @foreach (json_decode($kos->foto_tambahan) as $item)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <div>
                                    <img src="{{ asset('kosts/' . $item) }}"
                                        class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                        alt="Additional Photo">
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>


        </section>
        <section class="informan my-5">
            <div class="flex justify-between items-center mx-3 my-2">
                <div class="judul">
                    <h1 class="text-3xl text-gray-900 font-semibold">{{ $kos->nama_kost }}</h1>
                </div>
                <div class="owner flex">
                    <span class="text-gray-900 text-base font-medium me-1">Dikelola Oleh {{ $kos->user->name }}</span>
                    <img src="{{ asset('profiles/' . $kos->user->foto) }}" alt="" class="w-7 h-7 rounded-full">
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Lokasi Kost
                </div>
                <div class="informasi">
                    {{ $kos->lokasi }}
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Peraturan Kost
                </div>
                <div class="informasi">
                    {{ $kos->peraturan }}
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Fasilitas Umum <button data-popover-target="popover-description" data-popover-placement="bottom-end"
                        type="button"><i class="fa-solid fa-circle-info text-base text-gray-900"></i></button>
                </div>
                <div data-popover id="popover-description" role="tooltip"
                    class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72">
                    <div class="p-3">
                        <p>Fasilitas ini bisa di geser ke bawah</p>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                        </svg></a>
                    </div>
                    <div data-popper-arrow></div>
                </div>
                <div class="grid grid-cols-4 gap-2 h-28 overflow-y-scroll scsm">
                    @forelse (json_decode($kos->fasilitas_umum) ??[] as $kost)
                        <div class="fasilitas text-gray-700 flex itmes-center">
                            <i class="fa-solid fa-users-rays me-2 text-2xl"></i><span
                                class="font-medium text-lg">{{ $kost->value }}</span>
                        </div>
                    @empty
                        -
                    @endforelse
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Fasilitas Kamar Mandi
                </div>
                <div class="grid grid-cols-4 gap-2">
                    <div class="fasilitas text-gray-700">
                        <i class="fa-solid fa-bath me-2 text-2xl"></i><span
                            class="font-medium text-lg">{{ $kos->fasilitas_kamar_mandi }}</span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Fasilitas Parkir
                </div>
                <div class="grid grid-cols-4 gap-2">
                    <div class="fasilitas text-gray-700">
                        <i class="fa-solid fa-square-parking me-2 text-2xl"></i><span
                            class="font-medium text-lg">{{ $kos->fasilitas_tempat_parkir }}</span>
                    </div>
                </div>
            </div>
            <hr class="mb-3">
            <span class="text-xl text-gray-900 font-semibold mx-3">
                Kamar Yang Tersedia
            </span>
            <div class="grid grid-cols-3 gap-3 my-3 mx-3">
                @forelse ($kamars as $kamar)
                    <div class="max-w-sm bg-gray-200 border border-gray-200 rounded-lg shadow ">
                        <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                @foreach (json_decode($kamar->foto_kamar) as $item)
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="{{ asset('kamar/' . $item) }}"
                                            class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                            alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between items-center">
                                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">{{ $kamar->nama_kamar }}
                                </h5>
                                <h5 class=" text-base font-semibold tracking-tight text-gray-900"><i
                                        class="fa-solid fa-users me-1"></i>2
                                    Orang</h5>
                            </div>
                            <span class="text-lg font-semibold text-gray-900">Fasilitas</span>
                            <div class="grid grid-cols-2 gap-2 h-24 overflow-y-scroll scsm">
                                @foreach (json_decode($kamar->fasilitas) as $fasilitas)
                                    <div class="flex flex-wrap">
                                        <span class="text-base font-medium text-gray-900">
                                            <i class="fa-solid fa-check me-1"></i>
                                            {{ $fasilitas->value }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                            <span class="text-lg font-semibold text-gray-900 text-balance">Peraturan Kamar</span>
                            <div class="h-20 overflow-y-scroll scsm">
                                <div class="flex flex-wrap">
                                    <span class="text-base font-medium text-gray-900">
                                        {{ $kamar->peraturan_kamar }}
                                    </span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="flex flex-wrap">
                                    <span class="text-base font-black  text-gray-900">
                                        Rp {{ number_format($kamar->harga, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex justify-between mt-3">
                                <div class="info">
                                    <button data-modal-target="default-modal{{ $kamar->id }}"
                                        data-modal-toggle="default-modal{{ $kamar->id }}"
                                        class="border border-[#4F6F52] py-1 px-3 rounded-lg text-gray-900">Info</button>
                                </div>
                                <div class="aju">
                                    <form
                                        action="{{ route('user.detailkost.payment', ['kos' => $kos, 'kamar' => $kamar]) }}"
                                        method="post">
                                        @csrf
                                        @if ($kamar->status == 'kosong')
                                            <button type="submit" class="py-1 px-3 rounded-lg text-white"
                                                style="background-color: #4F6F52;">Ajukan Sewa</button>
                                        @else
                                            <button type="button" disabled class="py-1 px-3 rounded-lg text-white"
                                                style="background-color: #4F6F52;">telah dipesan</button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="span-col-3 text-center">
                        <span class="font-semibold text-2xl text-gray-900">Data Kamar Kosong</span>
                    </div>
                @endforelse
            </div>
            <div class="flex justify-center mt-4">
                {{ $kamars->links() }}
            </div>
            <hr>
            <div class="my-3">
                <span class="font-semibold text-lg">Review</span>
            </div>
            <form action="{{ route('ratting.buat') }}" method="POST">
                @csrf
                <input type="hidden" name="kos_id" value="{{ $kos->id }}">
                <div class="rating mb-3">
                    <input type="number" name="rating" hidden>
                    <i class="far fa-star fa-lg"></i>
                    <i class="far fa-star fa-lg"></i>
                    <i class="far fa-star fa-lg"></i>
                    <i class="far fa-star fa-lg"></i>
                    <i class="far fa-star fa-lg"></i>
                </div>
                <textarea name="ulasan" class="rounded-lg" id="" cols="50" rows="2"
                    placeholder="Tulis Ulasan Anda Mengenai Kost Ini"></textarea><br>
                <button type="submit" class="bg-green-600 text-white py-1 px-3 rounded-lg my-3">Kirim</button>
            </form>

            <script>
                const allstr = document.querySelectorAll('.rating .fa-star');
                const ratingInput = document.querySelector('.rating input[name="rating"]');

                allstr.forEach((item, idx) => {
                    item.addEventListener('click', function() {
                        for (let i = 0; i < allstr.length; i++) {
                            if (i <= idx) {
                                allstr[i].classList.replace('far', 'fas');
                            } else {
                                allstr[i].classList.replace('fas', 'far');
                            }
                        }
                        ratingInput.value = idx + 1;
                    });
                });
            </script>
            <div class="flex items-center gap-4">
                <span class="font-bold text-[80px] ">{{ $averageRating }} <i
                        class="fas fa-star text-yellow-300"></i></span>
                <span class="text-base font-medium">Dari {{ $numberOfRatings }} User</span>
            </div>
            <div class="flex items-end justify-end mt-0 mb-20">
                <div class="flex">
                    <a href="{{ route('semuarating', ['kos' => $kos->id]) }}">Lihat semua </a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M16.15 13H5q-.425 0-.712-.288T4 12q0-.425.288-.712T5 11h11.15L13.3 8.15q-.3-.3-.288-.7t.288-.7q.3-.3.713-.312t.712.287L19.3 11.3q.15.15.213.325t.062.375q0 .2-.062.375t-.213.325l-4.575 4.575q-.3.3-.712.288t-.713-.313q-.275-.3-.288-.7t.288-.7z" />
                    </svg>
                </div>
            </div>
            <div class="flex flex-col gap-5">
                @forelse ($kos->ulasan as $rating)
                    <div class="py-3 px-15 rounded-lg mb-5">
                        <div class="flex gap-4">
                            <div class="profile">
                                <img src="{{ asset('profiles/' . $rating->user->foto) }}" alt="" width="50"
                                    class="rounded-full">
                            </div>
                            <div class="Informasinya flex-grow">
                                <div class="flex justify-between">
                                    <div>
                                        <h1 class="text-2xl font-semibold text-gray-900">{{ $rating->user->name }}</h1>
                                    </div>
                                    <div class="text-xs">
                                        {{ \Carbon\Carbon::parse($rating->created_at)->isoformat('dddd, D-MMMM-YYYY') }}
                                    </div>
                                </div>

                                <div class="flex items-center"> <!-- Updated this line -->
                                    <p class="text-balance rounded-md py-2 px-2 text-sm">{{ $rating->ulasan }}</p>

                                </div>

                                <div class="flex">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $rating->rating)
                                            <span>⭐</span>
                                        @else
                                            <span></span>
                                        @endif
                                    @endfor
                                </div>


                            </div>
                        </div>
                    </div>
                @empty
                    Tidak ada Ulasan di Kos ini
                @endforelse
            </div>
        </section>
    </div>

    @foreach ($kamars as $kamar)
        <!-- Main modal -->
        <div id="default-modal{{ $kamar->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-6xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold uppercase text-gray-900 dark:text-white">
                            {{ $kamar->nama_kamar }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal{{ $kamar->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <!-- Modal -->
                    <div class="modal">
                        <div class="grid grid-cols-3 gap-4 p-4">
                            <!-- Carousel in the first two columns -->
                            <div class="col-span-2 relative h-56 md:h-96 overflow-hidden rounded-lg">

                                <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
                                    <!-- Carousel wrapper -->
                                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                                        <!-- Item 1 -->
                                        @foreach (json_decode($kamar->foto_kamar) as $item)
                                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                <img src="{{ asset('kamar/' . $item) }}"
                                                    class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Text in the third column -->
                            <div class="col-span-1 gap-5 mb-4">
                                <h1 class="text-lg font-semibold text-gray-900">Informasi Kamar</h1>
                                <div class="flex items-center">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48">
                    <defs>
                      <mask id="ipTRulerOne0">
                        <g fill="none" stroke="#fff" stroke-linecap="round" stroke-width="4">
                          <path stroke-linejoin="round" d="M43 41H23" />
                          <path fill="#555" stroke-linejoin="round" d="M38.718 5H21L5 41h17.662z" />
                          <path stroke-linejoin="round" d="M9.959 29.882h8.028m-4.722-7.412h8.028m-4.519-7.87h8.029" />
                          <path d="M21 5L5 41" />
                        </g>
                      </mask>
                    </defs>
                    <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipTRulerOne0)" />
                  </svg> --}}
                                    {{-- <h1>Lebar : <span>{{ $kamar->kapasitas }}</span></h1> --}}

                                    <div class="flex items-center ml-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M17 15q-1.05 0-1.775-.725T14.5 12.5q0-1.05.725-1.775T17 10q1.05 0 1.775.725T19.5 12.5q0 1.05-.725 1.775T17 15m-4 5q-.425 0-.712-.288T12 19v-.4q0-.6.313-1.112t.887-.738q.9-.375 1.863-.562T17 16q.975 0 1.938.188t1.862.562q.575.225.888.738T22 18.6v.4q0 .425-.288.713T21 20zm-3-8q-1.65 0-2.825-1.175T6 8q0-1.65 1.175-2.825T10 4q1.65 0 2.825 1.175T14 8q0 1.65-1.175 2.825T10 12m-8 5.2q0-.85.425-1.562T3.6 14.55q1.5-.75 3.113-1.15T10 13q.875 0 1.75.15t1.75.35l-1.7 1.7q-.625.625-1.213 1.275T10 18v.975q0 .3.113.563t.362.462H4q-.825 0-1.412-.587T2 18z" />
                                        </svg>
                                        <div class="flex">
                                            <h1>{{ $kamar->kapasitas }}<span> orang</span></h1>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-5">
                                <h1 class="mt-4 mb-4 text-lg font-semibold text-gray-900">Fasilitas Kamar</h1>
                                <div class="grid grid-cols-2 gap-2 h-24 overflow-y-scroll scsm">
                                    @foreach (json_decode($kamar->fasilitas) as $fasilitas)
                                        <div class="flex flex-wrap">
                                            <span class="text-base font-medium text-gray-900">
                                                <i class="fa-solid fa-check me-1"></i>
                                                {{ $fasilitas->value }}
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                                <h1 class="text-lg font-semibold text-gray-900">Peraturan Kamar</h1>
                                <h1 class="mb-2">{{ $kamar->peraturan_kamar }}</h1>
                                <h1 class="text-xl font-black text-green-900"> Rp
                                    {{ number_format($kamar->harga, 0, ',', '.') }}
                                    @if ($kamar->night == '1')
                                        <span class="text-xl font-black text-green-900">/
                                            <span>Perbulan</span></span>
                                    @else
                                        <span class="text-xl font-black text-green-900">/{{ $kamar->night }}
                                            <span>bulan</span></span>
                                    @endif
                                </h1>
                                <form class="flex justify-between mt-3"
                                    action="{{ route('user.detailkost.payment', ['kos' => $kos, 'kamar' => $kamar]) }}"
                                    method="post">
                                    @csrf
                                    @if ($kamar->status == 'kosong')
                                        <button type="submit" class="py-1 px-3 rounded-lg text-white"
                                            style="background-color: #4F6F52;">Ajukan Sewa</button>
                                    @else
                                        <button type="button" disabled class="py-1 px-3 rounded-lg text-white"
                                            style="background-color: #4F6F52;">telah dipesan</button>
                                    @endif
                                </form>
                            </div>
                            <hr class=" mb-4">


                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                {{-- <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            <button data-modal-hide="default-modal{{ $kamar->id }}" type="button"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
              accept</button>
            <button data-modal-hide="default-modal{{ $kamar->id }}" type="button"
              class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
          </div> --}}
                <br>
            </div>
        </div>
        </div>
    @endforeach


@endsection
