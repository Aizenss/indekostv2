@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 py-12">
        <div class="filterasi flex justify-center items-center ">
            <div class="bg-[#739072] flex px-10 space-x-4 rounded-xl pt-4">
                {{-- search --}}
                <div>
                    <form method="GET" class="flex items-center" action="{{ route('user.kamarkami') }}">
                        <div class="relative w-full">
                            <input type="text" id="simple-search" name="cari" value="{{ $keyword }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#86A789] focus:border-[#86A789] block w-full p-2.5"
                                placeholder="Cari Kost...">
                        </div>
                        <button type="submit"
                            class="p-2.5 ms-2 text-sm font-medium text-white bg-[#E8F1E3] rounded-lg border border-[#4F6F52] hover:bg-[#4F6F52] focus:ring-4 focus:outline-none focus:ring-[#4F6F52] duration-300">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </button>
                    </form>
                </div>
                <div>
                    <form id="filter" action="{{ route('user.kamarkami') }}" method="GET" class="space-x-4 flex">
                        <select id="dibuat" name="dibuat"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#86A789] focus:border-[#86A789] block w-full p-2.5 text-center">
                            <option selected value="">dibuat</option>
                            <option value="desc" {{ $dibuat == 'desc' ? 'selected' : '' }}>Terbaru-Terlama</option>
                            <option value="asc" {{ $dibuat == 'asc' ? 'selected' : '' }}>Terlama-Terbaru</option>
                        </select>
                        <select id="Rating" name="rating"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#86A789] focus:border-[#86A789] block w-full p-2.5 ">
                            <option value="" selected>Rating</option>
                            <option value="5" {{ $rating == '5' ? 'selected' : '' }}>⭐⭐⭐⭐⭐</option>
                            <option value="4" {{ $rating == '4' ? 'selected' : '' }}>⭐⭐⭐⭐</option>
                            <option value="3" {{ $rating == '3' ? 'selected' : '' }}>⭐⭐⭐</option>
                        </select>
                    </form>
                    <script>
                        document.getElementById('dibuat').addEventListener('change', function() {
                            document.getElementById('filter').submit();
                        });
                        document.getElementById('Rating').addEventListener('change', function() {
                            document.getElementById('filter').submit();
                        });
                    </script>
                </div>
                {{-- search --}}
            </div>
        </div>
        <section class="list py-10 px-[140px]">
            <div class="mb-3">
                <span class="text-xl font-semibold text-gray-900">List Kost</span>
            </div>
            <div class="grid grid-cols-3 gap-3">
                @forelse ($kost as $kos)
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                            <img class="rounded-t-lg" src="{{ asset('kosts/' . $kos->foto_depan) }}" alt="" />
                            <div class="px-5 py-3">
                                <h5 class="text-xl font-bold tracking-tight text-gray-900 truncate">{{ $kos->nama_kost }}
                                </h5>
                                <style>
                                    .sc-sm::-webkit-scrollbar{
                                        width: 0px;
                                    }
                                </style>
                                <div class="overflow-y-scroll sc-sm max-h-16 max-w-40">
                                    <p class="mb-1 text-sm font-normal text-gray-700">
                                        gvtuiyouabepifvqapvoieq    volhqpe;ivhnqelvkojpihougbivhyugtctvyiuohipjoihuvhyigctugviuhipjoihugvyicgtu
                                    </p>
                                </div>
                                <hr class="mb-2">
                                @php
                                    $kamartersedia = $kos->kamar->where('status', 'kosong')->count();
                                @endphp
                                @if ($kamartersedia > 0)
                                    <p class="text-base text-gray-700 font-semibold truncate">Tersedia
                                        {{ $kamartersedia }} Kamar</p>
                                @else
                                    <p class="text-xs text-gray-700 font-semibold truncate">Tidak Ada Kamar Tersedia</p>
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
                                    <div class="rate mb-1 font-semibold text-sm">
                                        <i class="fas fa-star text-yellow-300"> </i>{{ $averageRating }}/5
                                    </div>
                                    <a href="{{ route('user.detailkost', ['kos' => $kos->id]) }}"
                                        class="hover:bg-[#4F6F52] duration-300 bg-[#739072] py-1 px-2 font-medium text-sm text-white rounded-lg text-center mt-5">
                                        Detail Kost
                                    </a>
                                </div>

                            </div>
                        </div>
                    @empty
                    <div class=" flex justify-center align-middle">
                        <img src="{{ asset('ilustrasi/Empty-amico 1.png') }}" class="size-52" alt="">
                    </div>
                @endforelse

            </div>
        </section>
        <div class="flex justify-center mt-4">
            {{ $kost->links() }}
        </div>
    </div>
@endsection
