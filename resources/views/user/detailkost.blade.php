@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 p-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="galeri md:col-span-2">
                <div class="grid gap-4">
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('kosts/' . $kos->foto_depan) }}"
                            alt="">
                    </div>
                    <div class="grid grid-cols-5 gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="{{ asset('kosts/' . $kos->foto_dalam) }}"
                                alt="">
                        </div>
                        @if ($kos->foto_tambahan != null)
                            @foreach ($kos->foto_tambahan as $item)
                                <div>
                                    <img class="h-auto max-w-full rounded-lg"
                                        src="{{ asset('kosts/' . $kos->foto_tambahan) }}" alt="">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                {{-- Galeri --}}
                <div class="informasi-lanjut px-2">
                    <div class="grid grid-cols-3 gap-4 my-5">
                        <div class="nama-kost col-span-2">
                            <span class="font-semibold text-lg md:text-3xl mt-3 text-black">{{ $kos->nama_kost }}</span>
                        </div>
                        <div class="flex justify-center items-center">
                            <span class="py-1 px-2 mt-1 bg-blue-500 text-white rounded-xl">{{ $kos->ketentuan }}</span>
                        </div>
                    </div>
                    <div class="grid grid-rows-7 gap-3">
                        <div class="infomasi ms-2 border-b py-2">
                            <h1 class="font-semibold text-xl text-black">Kost Disewakan Oleh P. Andika</h1>
                            <span class="font-medium text-lg text-black"><i class="fa-solid fa-map-location-dot fa-lg"
                                    style="color: #000000;"></i> {{ $kos->lokasi }}</span>
                        </div>
                        <div class="infomasi ms-2 border-b py-2">
                            <h1 class="font-semibold text-xl text-black">Spesifikasi Kamar</h1>
                            <span class="font-medium text-lg text-black"><i class="fa-solid fa-map-location-dot fa-lg"
                                    style="color: #000000;"></i> {{ $kos->spesifikasi }}</span>
                        </div>
                        <div class="infomasi ms-2 border-b py-2">
                            <h1 class="font-semibold text-xl text-black">Fasilitas Kamar</h1>
                            <span class="font-medium text-lg text-black"><i class="fa-solid fa-map-location-dot fa-lg"
                                    style="color: #000000;"></i>
                                <input name="fasilitas_kamar" type="text" hidden value="{{ $kos->fasilitas_kamar }}"
                                    disabled>
                            </span>
                        </div>
                        <div class="infomasi ms-2 border-b py-2">
                            <h1 class="font-semibold text-xl text-black">Fasilitas Kamar Mandi</h1>
                            <span class="font-medium text-lg text-black"><i class="fa-solid fa-map-location-dot fa-lg"
                                    style="color: #000000;"></i> {{$kos->fasilitas_kamar_mandi}}</span>
                        </div>
                        <div class="infomasi ms-2 border-b py-2">
                            <h1 class="font-semibold text-xl text-black">Peraturan Khusus Kamar Ini</h1>
                            <span class="font-medium text-lg text-black"><i class="fa-solid fa-map-location-dot fa-lg"
                                    style="color: #000000;"></i> </span>
                        </div>
                        <div class="infomasi ms-2 border-b py-2">
                            <h1 class="font-semibold text-xl text-black">Fasilitas Umum</h1>
                            <span class="font-medium text-lg text-black"><i class="fa-solid fa-map-location-dot fa-lg"
                                    style="color: #000000;"></i> </span>
                        </div>
                        <div class="infomasi ms-2 border-b py-2">
                            <h1 class="font-semibold text-xl text-black">Fasilitas Parkir</h1>
                            <span class="font-medium text-lg text-black"><i class="fa-solid fa-map-location-dot fa-lg"
                                    style="color: #000000;"></i> {{$kos->fasilitas_tempat_parkir}}</span>
                        </div>
                    </div>
                    <div class="infomasi ms-2 border-b py-2">
                        <h1 class="font-semibold text-xl text-black">Ulasan Terhadap Kost</h1>
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
                    </div>
                </div>
            </div>
            <div class="formbayar">
                <div class="bg-gray-100 p-3 rounded-xl">
                    <span class="text-center text-xl font-medium text-black my-3">Informasi</span>
                    <hr>
                    <div class="informasi grid grid-cols-2 gap-2 my-4">
                        <div class="judul">
                            <ul class="">
                                <li>Nama Kost</li>
                                <li>Nama Pemilik</li>
                                <li>Harga</li>
                            </ul>
                        </div>
                        <div class="isi">
                            <ul class="">
                                <li>: Los Santos</li>
                                <li>: P. Andika</li>
                                <li>: Rp. 300.000</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <span class="text-center text-xl font-medium text-black my-3">Pengajuan Sewa</span>
                    <form action="">
                        <div class="pengajuan grid md:grid-cols-2 gap-2 my-4">
                            <div>
                                <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                    Awal</label>
                                <input type="date" id="tanggal"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            </div>
                            <div>
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Pilih
                                    Paket</label>
                                <select
                                    id="select-bulan"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option selected disabled>Paket</option>
                                    </option>
                                    <option value="1">1 Bulan</option>
                                    <option value="6">6 Bulan</option>
                                    </option>
                                    <option value="12">1 Tahun</option>
                                </select>
                            </div>
                        </div>
                        <div class="informasiv2">
                            <div class="flex gap-3 flex-col">
                                <div class="infoharga">
                                    <ul class="flex">
                                        <li>Jumlah Harga</li>
                                        <li>: Rp. 300.000</li>
                                    </ul>
                                </div>
                                <div class="biayaadmin">
                                    <ul class="flex">
                                        <li class="">Biaya Admin(5%)</li>
                                        <li>: Rp. 15.000</li>
                                    </ul>
                                </div>
                            </div>
                            <hr class="my-3">
                            <div class="total">
                                <ul class="flex">
                                    <li class="">Total</li>
                                    <li>: Rp. 315.000</li>
                                </ul>
                            </div>
                            <button type="submit"
                                class="mt-3 bg-gray-300 w-full p-3 border border-black rounded-xl hover:bg-gray-400 duration-300">Ajukan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script>
        var input = document.querySelector('input[name=fasilitas_kamar]');
        var tagify = new Tagify(input);

        tagify.on('change', function(e) {
            var fasilitas_kamar = e.detail.fasilitas_kamar.reduce(function(acc, tag) {
                acc.push(tag.value);
                return acc;
            }, []);
        });
    </script>

    {{-- <script>
        function kalkulator() {
            let pack = document.getElementById("select-bulan");
            let packselect = pack.value;

            let hargaSewa = 0;
            let biayaAdmin = 0;
            let total = 0;

            if (packselect == 1) {
                hargaSewa = parseInt("{{ $promo }}");
                biayaAdmin = 0.05 * hargaSewa;
                total = hargaSewa + biayaAdmin;
            } else if (packselect == 6) {
                hargaSewa = parseInt("{{ $promo }}") * 6;
                biayaAdmin = 0.05 * hargaSewa;
                total = hargaSewa + biayaAdmin;
            } else if (packselect == 12) {
                hargaSewa = parseInt("{{ $promo }}") * 12;
                biayaAdmin = 0.05 * hargaSewa;
                total = hargaSewa + biayaAdmin;
            } else {
                hargaSewa = 0;
                biayaAdmin = 0;
                total = 0;
            }

            document.getElementById("harga-sewa").innerText = " : Rp. " + hargaSewa.toLocaleString();
            document.getElementById("biaya-admin").innerText = " : Rp. " + biayaAdmin.toLocaleString();
            document.getElementById("total").innerText = " : Rp. " + total.toLocaleString();
        }

        // Pemanggilan fungsi kalkulator() saat ada perubahan pada elemen select-bulan
        document.getElementById("select-bulan").addEventListener("change", kalkulator);

        // Pemanggilan fungsi kalkulator() pada saat halaman dimuat
        kalkulator();
    </script> --}}
@endsection
