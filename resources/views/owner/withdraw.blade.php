@extends('layout.main')

@extends('layout.sidebar')

@section('isi')
    <div class="sm:ml-64 px-10 py-20">
        <div class="bg-[#4F6F52] py-5 px-20 w-full rounded-lg">
            <div class="flex justify-between items-center">
                <div class="informasi flex flex-col">
                    <span class="text-xl text-gray-300 font-semibold">Total Saldo Anda</span>
                    <span class="text-3xl text-gray-300 font-semibold ms-3 mt-3">Rp. 300.000.000</span>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-wallet text-[100px] text-gray-100/50"></i>
                </div>
            </div>
        </div>
        <form action="" class="my-12">
            <div class="grid grid-cols-2 gap-8">
                <div class="metode">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Metode Pembayaran</label>
                    <select id="countries"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected disabled>Metode Pembayaran</option>
                        <option value="BRI">Bank Bri</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="norek" class="block mb-2 text-sm font-medium text-gray-900">No Rekening</label>
                    <input type="text" id="norek" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>
            </div>
            <div class="mb-6">
                <label for="nominal class=" class="block mb-2 text-sm font-medium text-gray-900">Nominal</label>
                <input type="text" id="nominal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="w-full flex justify-center items-center">
                <button type="submit" class="py-2 px-8 text-white text-lg font-semibold rounded-lg" style="background-color: #4F6F52;">Tarik</button>
            </div>
        </form>
        <div class="history">
            <div class="flex justify-between px-20">
                <div class="title">
                    <span class="text-xl text-[#4F6F52] ">Riwayat</span>
                </div>
                <div class="indikator flex items-center gap-5">
                    <div class="masuk flex items-center gap-2">
                        <div class="bg-[#739072] rounded-full w-3 h-3"></div>
                        <span class="text-lg text-gray-900">Dana Masuk</span>
                    </div>
                    <div class="masuk flex items-center gap-2">
                        <div class="bg-[#ce6262] rounded-full w-3 h-3"></div>
                        <span class="text-lg text-gray-900">Dana Keluar</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-5 my-10 px-24">
                {{-- perulangan --}}

                {{-- History masuk --}}
                <div class="grid grid-cols-2 items-center">
                    <div class="informasinya flex items-center gap-5">
                        <div class="bg-[#739072] rounded-full w-4 h-4"></div>
                        <div class="text">
                            <span class="text-xl font-medium text-gray-900">Transfer dari 3673838382947270</span>
                            <div class="flex gap-8 items-center">
                                <span class="text-sm text-gray-900">5 Hari Lalu</span>
                                <span class="text-xs text-gray-900">Senin, 29 Januari 2024</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-xl text-[#739072] text-end">
                        + Rp. 3.000.000
                    </div>
                </div>
                {{-- History masuk --}}

                {{-- History Tarik --}}
                <div class="grid grid-cols-2 items-center">
                    <div class="informasinya flex items-center gap-5">
                        <div class="bg-[#ce6262] rounded-full w-4 h-4"></div>
                        <div class="text">
                            <span class="text-xl font-medium text-gray-900">Berhasil melakukan penarikan tunai</span>
                            <div class="flex gap-8 items-center">
                                <span class="text-sm text-gray-900">8 Hari Lalu</span>
                                <span class="text-xs text-gray-900">Senin, 22 Januari 2024</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-xl text-[#ce6262] text-end">
                        - Rp. 3.000.000
                    </div>
                </div>
                {{-- History Tarik --}}

                {{-- perulangan --}}
            </div>
        </div>
    </div>
@endsection
