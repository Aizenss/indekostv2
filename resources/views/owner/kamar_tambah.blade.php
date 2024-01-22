@extends('layout.main')
@extends('layout.sidebar_owner')

@section('isi')
    <div class="sm:ml-64">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 my-10 mx-10">
            <div
                class="bg-white border border-gray-200 rounded-lg flex justify-center items-center shadow-lg transition ease-in-out delay-150 hover:translate-y-3 duration-500 hover:shadow-gray-500 min-h-[300px]">
                <a href="{{ route('owner.kamar.tambah.detail', $kos) }}">
                    <i class="fa-solid fa-plus text-[50px] font-semibold"></i>
                </a>
            </div>
            @foreach ($kamars as $kamar)
                <div class="bg-white rounded-lg shadow-lg duration-300 hover:shadow-gray-500">
                    @foreach (json_decode($kamar->foto_kamar) ?? [] as $foto)
                        <img class="rounded-t-lg" src="{{ asset('kamar/' . $foto) }}" height="50" alt="" />
                    @endforeach
                    <div class="p-5 ">
                        <div class="grid grid-cols-3 gap-2 items-center">
                            <div class="judul col-span-2">
                                <h5 class="mb-2 text-lg font-bold overflow-x-scroll sc-sm text-gray-900">
                                    {{ $kamar->nama_kamar }}</h5>
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
                                <div class="fsnya">
                                    <span class="text-sm text-gray-700 font-medium"><i
                                            class="fa-solid fa-check me-2"></i>{{ $fasilitas->value }}</span>
                                </div>
                            @endforeach
                        </div>
                        <span class="text-base font-semibold text-gray-900 text-start">Peraturan Kamar</span>
                        <div class="overflow-y-scroll sc-sm max-h-16">
                            <p class="text-sm font-medium text-gray-900">{{ $kamar->peraturan_kamar }}!</p>
                        </div>
                        <div class="my-3">
                            <span
                                class="text-xl font-bold text-gray-700">{{ $kamar->harga }}/{{ $kamar->night }}Bulan</span>
                        </div>
                        <div class="flex justify-between">
                            <div>
                                <button data-modal-target="detail-kamar{{ $kamar->id }}"
                                    data-modal-toggle="detail-kamar{{ $kamar->id }}"
                                    class="border border-blue-500 text-blue-500 py-2 px-5 rounded-lg duration-300 hover:bg-blue-500 hover:text-white">
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
                                        class="bg-[#B03E3E] border border-[#B03E3E] hover:bg-[#983636] py-2 px-5 rounded-lg duration-300">
                                        <span class="text-base font-medium text-white"><i
                                                class="fa-solid fa-square-xmark me-2"></i>Mati</span>
                                    </button>
                                @elseif ($kamar->status == 'kosong')
                                    <button
                                        class="bg-green-500 border border-green-500 hover:bg-green-600 py-2 px-5 rounded-lg duration-300">
                                        <span class="text-base font-medium text-white flex"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="15" class="mt-1 me-1"
                                                height="15" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="m10.6 13.4l-2.15-2.15q-.275-.275-.7-.275t-.7.275q-.275.275-.275.7t.275.7L9.9 15.5q.3.3.7.3t.7-.3l5.65-5.65q.275-.275.275-.7t-.275-.7q-.275-.275-.7-.275t-.7.275zM5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21z" />
                                            </svg>Hidup</span>
                                    </button>
                                @else
                                    <button disabled
                                        class="bg-[#9c9ea1] border border-[#9c9ea1] py-2 px-5 rounded-lg duration-300">
                                        <span class="text-base font-medium text-white flex"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="mt-1 me-1" width="15"
                                                height="15" viewBox="0 0 20 20">
                                                <path fill="currentColor"
                                                    d="M6.75 9a3.25 3.25 0 1 0 0-6.5a3.25 3.25 0 0 0 0 6.5M17 6.5a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0m-8 8c0-1.704.775-3.228 1.993-4.237A1.991 1.991 0 0 0 10 10H3.5a2 2 0 0 0-2 2s0 4 5.25 4c.953 0 1.733-.132 2.371-.347A5.522 5.522 0 0 1 9 14.5m10 0a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m-2.146-1.854a.5.5 0 0 0-.708 0L13.5 15.293l-.646-.647a.5.5 0 0 0-.708.708l1 1a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0 0-.708" />
                                            </svg>Di sewa</span>
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
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Detail kamar
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
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
                        @foreach (json_decode($kamar->foto_kamar) ?? [] as $foto)
                            <img class="rounded-t-lg" src="{{ asset('kamar/' . $foto) }}" height="50" alt="" />
                        @endforeach
                        <p>Nama Kamar: <span>{{ $kamar->nama_kamar }}</span></p>
                        <p>Kapasitas: <span>{{ $kamar->kapasitas }}</span></p>
                        <div class="fsnya">
                            <p>fasilitas</p>
                            @foreach (json_decode($kamar->fasilitas) ?? [] as $fasilitas)
                                <span class="text-sm text-gray-700 font-medium">
                                    <i class="fa-solid fa-check me-2"></i>{{ $fasilitas->value }}</span>
                                    @endforeach
                            </div>
                        <p>Peraturan: <span>{{ $kamar->peraturan_kamar }}</span></p>
                        <p>Harga: <span>{{ $kamar->harga }}/{{ $kamar->night }}Bulan</span></p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center justify-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <!-- Edit Button Form -->
                        <form>
                            <button data-modal-hide="detail-kamar" type="button" onclick="window.location.href='{{ route('owner.kamar.edit', ['kos' => $kos->id, 'kamar' => $kamar->id]) }}'"
                                class="flex items-center text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-500">
                                <i class="fas fa-pencil-alt mr-2"></i> ubah
                            </button>
                        </form>

                        <!-- Delete Button Form -->
                        <form action="{{ route('owner.kamar.hapus', ['kamar' => $kamar->id, 'kos' => $kos->id]) }}" method="post">
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
