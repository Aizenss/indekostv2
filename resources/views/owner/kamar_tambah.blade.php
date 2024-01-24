@extends('layout.main')
@extends('layout.sidebar')

@section('isi')
    <div class="py-20 px-10 sm:ml-64">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 my-10 mx-10">
            <a href="{{ route('owner.kamar.tambah.detail', $kos) }}"
                class="bg-white border border-gray-200 rounded-lg flex justify-center items-center shadow-lg transition ease-in-out delay-150 hover:translate-y-3 duration-500 hover:shadow-gray-500 min-h-[300px]">
                <i class="fa-solid fa-plus text-[50px] font-semibold"></i>
            </a>
            @foreach ($kamars as $kamar)
                <div class="bg-white rounded-lg shadow-lg duration-300 hover:shadow-gray-500">
                    <div id="custom-controls-gallery" class="relative w-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-36 md:h-56 overflow-hidden rounded-t-lg">
                            <!-- Item 1 -->
                            @foreach (json_decode($kamar->foto_kamar) ?? [] as $foto)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <div class="max-w-full h-36 md:h-56 bg-cover rounded-t-lg">
                                        <img src="{{ asset('kamar/' . $foto) }}" class="w-full h-full object-cover"
                                            alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="p-5 ">
                        <div class="grid grid-cols-3 gap-2 items-center">
                            <div class="judul col-span-2">
                                <h6 class="mb-2 text-lg font-bold truncate text-gray-900">
                                    {{ $kamar->nama_kamar }}</h6>
                            </div>
                            <div class="orang text-end">
                                <h5 class="mb-2 text-base font-semibold truncate text-gray-900"><i
                                        class="fa-solid fa-users me-2"></i>{{ $kamar->kapasitas }}</h5>
                            </div>
                        </div>
                        <span class="text-base font-semibold text-gray-900 text-start">Fasilitas</span>
                        <style>
                            .sc-sm::-webkit-scrollbar {
                                width: 3px;
                            }
                        </style>
                        <div class="grid grid-cols-2 gap-3 my-2 text-center overflow-y-scroll sc-sm max-h-14">
                            @foreach (json_decode($kamar->fasilitas) ?? [] as $fasilitas)
                                <div class="fsnya flex">
                                    <i class="fa-solid fa-handshake me-2"></i>
                                    <span class="text-sm text-gray-700 font-medium truncate">{{ $fasilitas->value }}</span>
                                </div>
                            @endforeach
                        </div>
                        <span class="text-base font-semibold text-gray-900 text-start">Peraturan Kamar</span>
                        <div class="overflow-y-scroll sc-sm h-10">
                            <p class="text-sm font-medium text-gray-900">{{ $kamar->peraturan_kamar }}!</p>
                        </div>
                        <div class="my-3">
                            <span class="text-xl font-bold text-gray-700">Rp.
                                {{ number_format($kamar->harga, 0, ',', '.') }}/{{ $kamar->night }} Bulan</span>
                        </div>
                        <div class="flex justify-center gap-2">
                            <div>
                                <button data-modal-target="detail-kamar{{ $kamar->id }}"
                                    data-modal-toggle="detail-kamar{{ $kamar->id }}"
                                    class="border border-blue-500 text-blue-500 py-2 px-3 rounded-lg duration-300 hover:bg-blue-500 hover:text-white">
                                    <span class="text-base font-medium flex">
                                        <i class="fas fa-eye mt-1 me-1"></i> Lihat
                                    </span>
                                </button>

                            </div>
                            <form action="{{ route('owner.kamar.rubah.status', ['kamar' => $kamar->id]) }}" method="POST">
                                @method('patch')
                                @csrf
                                @if ($kamar->status == 'mati')
                                    <button
                                        class="bg-[#B03E3E] border border-[#B03E3E] hover:bg-[#983636] py-2 px-3 rounded-lg duration-300">
                                        <span class="text-base font-medium text-white flex items-center">
                                            <i class="fa-solid fa-toggle-off me-2"></i>
                                            Mati
                                        </span>
                                    </button>
                                @elseif ($kamar->status == 'kosong')
                                    <button
                                        class="bg-green-500 border border-green-500 hover:bg-green-600 py-2 px-3 rounded-lg duration-300">
                                        <span class="text-base font-medium text-white flex items-center">
                                            <i class="fa-solid fa-toggle-on me-2"></i>
                                            Hidup
                                        </span>
                                    </button>
                                @else
                                    <button disabled
                                        class="bg-[#9c9ea1] border border-[#9c9ea1] py-2 px-3 rounded-lg duration-300">
                                        <span class="text-base font-medium text-white flex"><i
                                                class="fa-solid fa-user-lock me-2"></i>Di sewa</span>
                                    </button>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @foreach ($kamars as $kamar)
        <div id="detail-kamar{{ $kamar->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between py-3 px-5 border-b rounded-t">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Detail kamar
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="detail-kamar{{ $kamar->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <div class="grid grid-cols-1 gap-2 h-[200px] overflow-y-scroll sc-sm">
                            @foreach (json_decode($kamar->foto_kamar) ?? [] as $foto)
                            <div class="mx-auto">
                                <img class="h-[400px] w-[400px] object-cover rounded"
                                    src="{{ asset('kamar/' . $foto) }}" alt="">
                            </div>
                        @endforeach
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="informasi-1">
                                <p>Nama Kamar: <span class="font-semibold">{{ $kamar->nama_kamar }}</span></p>
                                <p>Kapasitas: <span class="font-semibold">{{ $kamar->kapasitas }} <i class="fa-solid fa-users text-gray-900"></i></span></p>
                                <p>Harga: <span class="font-semibold">Rp. {{ number_format($kamar->harga, 0, ',', '.') }}/{{ $kamar->night }} Bulan</span></p>
                            </div>
                            <div class="informasi-2">
                                <div class="fsnya">
                                    <p class="font-semibold">fasilitas</p>
                                    <div class="grid grid-cols-3 gap-3 h-12 overflow-y-scroll sc-sm">
                                        @foreach (json_decode($kamar->fasilitas) ?? [] as $fasilitas)
                                            <span class="text-sm text-gray-700 font-medium"><i class="fa-solid fa-lock-open me-2"></i>{{ $fasilitas->value }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>Peraturan: <span class="text-sm font-semibold">{{ $kamar->peraturan_kamar }}</span></p>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center justify-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <!-- Edit Button Form -->
                        <form>
                            <button data-modal-hide="detail-kamar" type="button"
                                onclick="window.location.href='{{ route('owner.kamar.edit', ['kos' => $kos->id, 'kamar' => $kamar->id]) }}'"
                                class="flex items-center text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-500">
                                <i class="fas fa-pencil-alt mr-2"></i> ubah
                            </button>
                        </form>

                        <!-- Delete Button Form -->
                        <form action="{{ route('owner.kamar.hapus', ['kamar' => $kamar->id, 'kos' => $kos->id]) }}"
                            method="post" onsubmit="return confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button data-modal-hide="detail-kamar" type="submit"
                                class="flex items-center ms-3 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-sm font-medium px-5 py-2.5 hover:text-white focus:z-10 dark:bg-red-400 dark:hover:bg-red-500 dark:focus:ring-red-500">
                                <i class="fas fa-trash-alt mr-2"></i> Hapus
                            </button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    @endforeach
@endsection
