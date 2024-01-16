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
                @forelse (json_decode($kos->foto_tambahan) ?? [] as $tambahan)
                    <div>
                        <img src="{{ asset('kosts/' . $tambahan) }}" alt="">
                    </div>
                @empty
                @endforelse
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
                    Fasilitas Umum
                </div>
                <div class="grid grid-cols-4 gap-2">
                    @forelse (json_decode($kos->fasilitas_umum) ??[] as $kost)
                        <div class="fasilitas text-gray-700">
                            <i class="fa-solid fa-check me-2"></i><span
                                class="font-medium text-base">{{ $kost->value }}</span>
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
                            <i class="fa-solid fa-check me-2"></i><span
                                class="font-medium text-base">{{ $kos->fasilitas_kamar_mandi }}</span>
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
                        <i class="fa-solid fa-check me-2"></i><span
                            class="font-medium text-base">{{ $kos->fasilitas_tempat_parkir }}</span>
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
                @forelse ($kamars as $kamar)
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
            @empty
                Tidak Ada Kamar
            @endforelse
        </div>
        <div class="flex justify-center mt-4">
            {{ $kamars->links() }}
        </div>
        <hr>
        <div class="my-3">
            <span class="font-semibold text-lg">Review</span>
        </div>
        <style>
            .rating .fa-star {
                color: rgb(218, 218, 4);
                cursor: pointer;
            }

            .fa-star:hover {
                transform: scale(1.1);
            }
        </style>

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
            <span class="text-base font-medium">Dari {{ $numberOfRatings }} User</span>
        </div>
        <div class="flex flex-col gap-5">
            @forelse ($kos->ulasan as $rating)
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
            @empty
                Tidak ada Ulasan di Kos ini
            @endforelse
        </div>
    </section>
</div>
@endsection
