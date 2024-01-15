@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 py-10 px-[140px]">
        <section class="image">
            <div class="grid grid-cols-4 gap-6">
                <div class="col-span-3 row-span-3">
                    <img src="{{ asset('kosts/' . $kos->foto_depan) }}" alt="" class="w-full h-full">
                </div>
                <div>
                    <img src="{{ asset('kosts/' . $kos->foto_dalam) }}" alt="">
                </div>
                @foreach (json_decode($kos->foto_tambahan) as $tambahan)
                    <div>
                        <img src="{{ asset('kosts/' . $tambahan) }}" alt="">
                    </div>
                @endforeach
            </div>
        </section>
        <section class="informan my-5">
            <div class="flex justify-between items-center mx-3">
                <div class="judul">
                    <h1 class="text-2xl text-gray-900 font-semibold">{{ $kos->nama_kost }}</h1>
                </div>
                <div class="owner flex">
                    <span class="text-gray-900 text-base font-medium me-1">Dikelola Oleh {{ $kos->user->name }}</span>
                    <img src="{{ asset('foto/dummy.jpeg') }}" alt="" class="w-7 h-7 rounded-full">
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
                    Fasilitas Kost
                </div>
                <div class="grid grid-cols-4 gap-2">
                    <div class="fasilitas text-gray-700">
                        @foreach (json_decode($kos->fasilitas_kamar) as $kost)
                            <i class="fa-solid fa-check me-2"></i><span
                                class="font-medium text-base">{{ $kost->value }}</span>
                        @endforeach
                    </div>
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
            <hr class="mb-3">
            <span class="text-xl text-gray-900 font-semibold mx-3">
                Kamar Yang Tersedia
            </span>
            <div class="grid grid-cols-3 gap-3 my-3 mx-3">
                @foreach ($kamars as $kamar)
                    <div class="max-w-sm bg-gray-200 border border-gray-200 rounded-lg shadow ">
                        @foreach (json_decode($kamar->foto_kamar) as $item)
                            <img class="rounded-t-lg" src="{{ asset('kamar/' . $item) }}" alt="" />
                        @break
                    @endforeach
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Nama Kamar</h5>
                            <h5 class=" text-base font-semibold tracking-tight text-gray-900"><i
                                    class="fa-solid fa-users me-1"></i>2 Orang</h5>
                        </div>
                        <span class="text-lg font-semibold text-gray-900">Fasilitas</span>
                        <div class="grid grid-cols-2 gap-2">
                            <span class="text-base font-medium text-gray-900"><i
                                    class="fa-solid fa-check me-1"></i>Kasur</span>
                        </div>
                        <span class="text-lg font-semibold text-gray-900 text-balance">Peraturan Kamar</span>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, tempore!</p>
                        <div class="flex justify-between mt-3">
                            <a href=""
                                class="border border-[#4F6F52] py-1 px-3 rounded-lg text-gray-900">Info</a>
                            <a href="" class="bg-[#4F6F52] py-1 px-3 rounded-lg text-white">Ajukan Sewa</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        paginate
        <hr>
        <div class="mt-3">
            <span class="font-semibold text-lg">Review</span>
        </div>
        @php
            $totalRating = 0;
            $numberOfRatings = count($kos->ulasan);

            foreach ($kos->ulasan as $rating) {
                $totalRating += $rating->rating;
            }

            $averageRating = $numberOfRatings > 0 ? number_format(round($totalRating / $numberOfRatings, 2), 1, '.', ',') : 0;
        @endphp
        <div class="flex items-center gap-4">
            <span class="font-bold text-[80px] ">{{ $averageRating }} <i
                    class="fas fa-star text-yellow-300"></i></span>
            <span class="text-base font-medium">Dari 400 User</span>
        </div>
        <div class="flex flex-col gap-5">
            @foreach ($kos->ulasan as $rating)
                <div class="bg-gray-50 py-3 px-5 rounded-lg border border-gray-900">
                    <div class="flex gap-4">
                        <div class="profile">
                            <img src="{{ asset('foto/dummy.jpeg') }}" alt="" width="250"
                                class="rounded-full">
                        </div>
                        <div class="Informasinya">
                            <h1 class="text-2xl font-semibold text-gray-900">Username</h1>
                            <div class="flex">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $rating->rating)
                                        <span>⭐</span>
                                    @else
                                        <span></span>
                                    @endif
                                @endfor
                                <span class="ms-3">{{ $rating->updated_at }}</span>
                            </div>
                            <p class="text-balance">{{ $rating->ulasan }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
