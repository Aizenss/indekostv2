@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 px-1">
        <section class="header mt-7 mb-4">
            <h1 class="text-center mb-5 font-semibold text-lg">Top Area Kost</h1>
            <div class="flex gap-4 mx-2 ">
                <div class="p-4">
                    <form>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Cari area...">
                            <button type="submit"
                                class="text-white absolute end-2.5 bottom-2.5 bg-green-500 hover:bg-green-800 duration-500 focus:ring-4 focus:outline-none focus:ring-lime-500 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                        </div>
                    </form>
                </div>
                <div class="tombol-modal py-5 mt-0.5 lg:mt-1">
                    <!-- Modal toggle -->
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                        class="block text-white bg-green-500 hover:bg-green-800 duration-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-5 text-center"
                        type="button">
                        <i class="fa-solid fa-filter fa-lg" style="color: #ffff;"></i>
                    </button>
                </div>
            </div>

            <!-- Main modal -->
            <div id="default-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Filter
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <form action="">
                                <span class="text-md font-semibold text-black">Jenis Kost</span>
                                <style>
                                    input[type="radio"]:checked {
                                        background-color: limegreen;
                                    }

                                    input[type="radio"]:focus {
                                        outline: none;
                                    }
                                </style>
                                <div class="flex gap-5 my-3">
                                    <div class="flex items-center px-4 border border-gray-200 rounded-xl">
                                        <input checked id="bordered-radio-1" type="radio" value="" name="jenis_kost"
                                            class="w-4 h-4 text-lime-600 bg-gray-100 border-gray-300">
                                        <label for="bordered-radio-1"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Cewek</label>
                                    </div>
                                    <div class="flex items-center px-4 border border-gray-200 rounded-xl">
                                        <input id="bordered-radio-2" type="radio" value="" name="jenis_kost"
                                            class="w-4 h-4 text-lime-600 bg-gray-100 border-gray-300">
                                        <label for="bordered-radio-2"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Cowok</label>
                                    </div>
                                    <div class="flex items-center px-4 border border-gray-200 rounded-xl">
                                        <input id="bordered-radio-3" type="radio" value="" name="jenis_kost"
                                            class="w-4 h-4 text-lime-600 bg-gray-100 border-gray-300">
                                        <label for="bordered-radio-3"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900">Campur</label>
                                    </div>
                                </div>
                                <span class="text-md font-semibold text-black">Harga</span>
                                <div class="flex gap-5 my-3 items-center">
                                    <input type="number" id="number-input" aria-describedby="helper-text-explanation" name="min"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Min Harga">
                                    -
                                    <input type="number" id="number-input" aria-describedby="helper-text-explanation" name="max"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Max Harga">
                                </div>
                                <span class="text-md font-semibold text-black">Rating</span>
                                <div class="flex gap-5 my-3">
                                    <div class="flex items-center px-4 border border-gray-200 rounded-xl">
                                        <input checked id="bordered-radio-1" type="radio" value="5" name="jenis_kost"
                                            class="w-4 h-4 text-lime-600 bg-gray-100 border-gray-300">
                                        <label for="bordered-radio-1"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</label>
                                    </div>
                                    <div class="flex items-center px-4 border border-gray-200 rounded-xl">
                                        <input id="bordered-radio-2" type="radio" value="4" name="jenis_kost"
                                            class="w-4 h-4 text-lime-600 bg-gray-100 border-gray-300">
                                        <label for="bordered-radio-2"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900">⭐⭐⭐⭐</label>
                                    </div>
                                    <div class="flex items-center px-4 border border-gray-200 rounded-xl">
                                        <input id="bordered-radio-3" type="radio" value="3" name="jenis_kost"
                                            class="w-4 h-4 text-lime-600 bg-gray-100 border-gray-300">
                                        <label for="bordered-radio-3"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900">⭐⭐⭐</label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                            <button data-modal-hide="default-modal" type="button"
                                class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Filter</button>
                            <button data-modal-hide="default-modal" type="button"
                                class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Keluar</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="body">
            <div class="bg-gray-100 p-8 mx-6 my-5 rounded-lg">
                <div class="grid grid-rows-4 gap-4">
                    <a href="{{ route('user.detailkost') }}" class="bg-gray-200 rounded-xl p-4">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                            <div class="foto-tempat">
                                <img src="{{ asset('foto/kontrakan.png') }}" alt=""
                                    class="w-[500px] h-[250px] bg-cover rounded-xl">
                            </div>
                            <div class="deskripsi-tempat my-1 pe-4">
                                <span class="bg-blue-500 rounded-full p-2 text-white font-md text-lg mt-4">Cowok</span>
                                <h4 class="text-black font-semibold text-2xl mt-4">Kontrakan Los Santos</h4>
                                <p class="text-gray-700 text-lg font-md">Blok KK15, Jl. Griya Permata Alam, Perun Gpa,
                                    Ngijo, Kec. Karang Ploso, Kabupaten Malang, Jawa Timur 65152</p>
                                <span class="text-gray-400 text-lg font-md">Semua ada kecuali kakbah</span>
                                <div class="grid grid-cols-2 gap-2 mt-7">
                                    <div class="rating ">
                                        <span class="text-xl font-semibold">⭐⭐⭐⭐⭐/5</span>
                                    </div>
                                    <div class="range-harga text-end">
                                        <p class="text-xl font-semibold"><span>Rp. 300.000</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="bg-gray-200 rounded-xl p-4">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                            <div class="foto-tempat">
                                <img src="{{ asset('foto/kontrakan.png') }}" alt=""
                                    class="w-[500px] h-[250px] bg-cover rounded-xl">
                            </div>
                            <div class="deskripsi-tempat my-1 pe-4">
                                <span class="bg-pink-500 rounded-full p-2 text-white font-md text-lg mt-4">Cewek</span>
                                <h4 class="text-black font-semibold text-2xl mt-4">Kontrakan Los Santos</h4>
                                <p class="text-gray-700 text-lg font-md">Blok KK15, Jl. Griya Permata Alam, Perun Gpa,
                                    Ngijo, Kec. Karang Ploso, Kabupaten Malang, Jawa Timur 65152</p>
                                <span class="text-gray-400 text-lg font-md">Semua ada kecuali kakbah</span>
                                <div class="grid grid-cols-2 gap-2 mt-7">
                                    <div class="rating ">
                                        <span class="text-xl font-semibold">⭐⭐⭐⭐⭐/5</span>
                                    </div>
                                    <div class="range-harga text-end">
                                        <p class="text-xl font-semibold"><span>Rp. 300.000</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="bg-gray-200 rounded-xl p-4">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                            <div class="foto-tempat">
                                <img src="{{ asset('foto/kontrakan.png') }}" alt=""
                                    class="w-[500px] h-[250px] bg-cover rounded-xl">
                            </div>
                            <div class="deskripsi-tempat my-1 pe-4">
                                <span class="bg-violet-500 rounded-full p-2 text-white font-md text-lg mt-4">Campur</span>
                                <h4 class="text-black font-semibold text-2xl mt-4">Kontrakan Los Santos</h4>
                                <p class="text-gray-700 text-lg font-md">Blok KK15, Jl. Griya Permata Alam, Perun Gpa,
                                    Ngijo, Kec. Karang Ploso, Kabupaten Malang, Jawa Timur 65152</p>
                                <span class="text-gray-400 text-lg font-md">Semua ada kecuali kakbah</span>
                                <div class="grid grid-cols-2 gap-2 mt-7">
                                    <div class="rating ">
                                        <span class="text-xl font-semibold">⭐⭐⭐⭐⭐/5</span>
                                    </div>
                                    <div class="range-harga text-end">
                                        <p class="text-xl font-semibold"><span>Rp. 300.000</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="bg-gray-200 rounded-xl p-4">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                            <div class="foto-tempat">
                                <img src="{{ asset('foto/kontrakan.png') }}" alt=""
                                    class="w-[500px] h-[250px] bg-cover rounded-xl">
                            </div>
                            <div class="deskripsi-tempat my-1 pe-4">
                                <span class="bg-violet-500 rounded-full p-2 text-white font-md text-lg mt-4">Campur</span>
                                <h4 class="text-black font-semibold text-2xl mt-4">Kontrakan Los Santos</h4>
                                <p class="text-gray-700 text-lg font-md">Blok KK15, Jl. Griya Permata Alam, Perun Gpa,
                                    Ngijo, Kec. Karang Ploso, Kabupaten Malang, Jawa Timur 65152</p>
                                <span class="text-gray-400 text-lg font-md">Semua ada kecuali kakbah</span>
                                <div class="grid grid-cols-2 gap-2 mt-7">
                                    <div class="rating ">
                                        <span class="text-xl font-semibold">⭐⭐⭐⭐⭐/5</span>
                                    </div>
                                    <div class="range-harga text-end">
                                        <p class="text-xl font-semibold"><span>Rp. 300.000</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </section>
    </div>
@endsection
