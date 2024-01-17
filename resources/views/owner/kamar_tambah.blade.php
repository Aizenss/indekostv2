@extends('layout.mainowner')
@extends('layout.sidebar_owner')

@section('owner')
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4 my-10 mx-10">
        <div class="bg-white border border-gray-200 rounded-lg flex justify-center items-center shadow-lg transition ease-in-out delay-150 hover:translate-y-3 duration-500 hover:shadow-gray-500">
            <a href="{{ route('owner.kamar.tambah.detail', $kos) }}">
                <i class="fa-solid fa-plus text-[50px] font-semibold"></i>
            </a>
        </div>
        <div class="bg-white rounded-lg shadow-lg transition ease-in-out delay-150 hover:translate-y-3 duration-500 hover:shadow-gray-500">
            <img class="rounded-t-lg" src="{{ asset('foto/404.png') }}" height="50" alt="" />
            <div class="p-5 ">
                <div class="flex justify-between">
                    <div class="judul">
                        <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Nama Kamar</h5>
                    </div>
                    <div class="orang">
                        <h5 class="mb-2 text-base font-semibold tracking-tight text-gray-900"><i
                                class="fa-solid fa-bed me-2"></i>2 Orang</h5>
                    </div>
                </div>
                <span class="text-base font-semibold text-gray-900 text-start">Fasilitas</span>
                <div class="grid grid-cols-2 truncate my-2 text-center">
                    <div class="fsnya">
                        <span class="text-sm text-gray-700 font-medium"><i class="fa-solid fa-check me-2"></i>Kasur</span>
                    </div>
                    <div class="fsnya">
                        <span class="text-sm text-gray-700 font-medium"><i class="fa-solid fa-check me-2"></i>Kasur</span>
                    </div>
                    <div class="fsnya">
                        <span class="text-sm text-gray-700 font-medium"><i class="fa-solid fa-check me-2"></i>Kasur</span>
                    </div>
                    <div class="fsnya">
                        <span class="text-sm text-gray-700 font-medium"><i class="fa-solid fa-check me-2"></i>Kasur</span>
                    </div>
                </div>
                <span class="text-base font-semibold text-gray-900 text-start">Peraturan Kamar</span>
                <p class="text-sm font-medium text-gray-900">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel,
                    obcaecati!</p>
                <div class="my-3">
                    <span class="text-xl font-bold text-gray-700">Rp 300.000/Bulan</span>
                </div>
                <div class="flex justify-between">

                    <button data-popover-target="popover-click" data-popover-trigger="click" type="button"
                        class="text-gray-900 bg-transparent hover:bg-gray-900 hover:text-white duration-300 border border-gray-900 font-medium rounded-lg text-base px-5 py-2.5 text-center"><i
                            class="fa-solid fa-pen-to-square me-2"></i>Aksi</button>

                    <div data-popover id="popover-click" role="tooltip"
                        class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0">
                        <div
                            class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg flex items-center justify-between">
                            <h3 class="font-semibold text-gray-900">
                                <i class="fa-solid fa-pen-to-square me-2"></i>Aksi
                            </h3>
                            <button class="text-gray-500 hover:text-gray-700">
                                <i class="fa-solid fa-times"></i> <!-- Close button -->
                            </button>
                        </div>
                        <div class="flex justify-around px-3 py-2">
                            <button class="bg-[#B03E3E] border border-[#B03E3E] py-2 px-5 rounded-lg">
                                <span class="text-base font-medium text-white">
                                    <i class="fa-solid fa-trash-can me-2"></i>Hapus
                                </span>
                            </button>
                            <button class="bg-[#ECDE61] border border-[#ECDE61] py-2 px-5 rounded-lg">
                                <span class="text-base font-medium text-gray-900">
                                    <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                </span>
                            </button>
                        </div>
                        <div data-popper-arrow></div>
                    </div>


                    {{-- <button class="bg-[#4F6F52] border border-[#4F6F52] py-2 px-5 rounded-lg">
                        <span class="text-base font-medium text-white"><i class="fa-solid fa-square-check me-2"></i>Nyala</span>
                    </button> --}}
                    <button class="bg-[#B03E3E] border border-[#B03E3E] py-2 px-5 rounded-lg">
                        <span class="text-base font-medium text-white"><i
                                class="fa-solid fa-square-xmark me-2"></i>Mati</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
