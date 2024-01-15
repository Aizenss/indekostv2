@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 py-10 px-[140px]">
        <section class="image">
            <div class="grid grid-cols-4 gap-6">
                <div class="col-span-3 row-span-3">
                    <img src="{{ asset('foto/header1.jpeg') }}" alt="" class="w-full h-full">
                </div>
                <div>
                    <img src="{{ asset('foto/header1.jpeg') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('foto/header1.jpeg') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('foto/header1.jpeg') }}" alt="">
                </div>
            </div>
        </section>
        <section class="informan my-5">
            <div class="flex justify-between items-center mx-3">
                <div class="judul">
                    <h1 class="text-2xl text-gray-900 font-semibold">Nama Kost</h1>
                </div>
                <div class="owner flex">
                    <span class="text-gray-900 text-base font-medium me-1">Dikelola Oleh NamaOwner</span>
                    <img src="{{ asset('foto/dummy.jpeg') }}" alt="" class="w-7 h-7 rounded-full">
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Peraturan Kost
                </div>
                <div class="informasi">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem, ut. Dolorem omnis nihil incidunt,
                    vero maiores possimus sunt repellat fugit.
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Fasilitas Kost
                </div>
                <div class="grid grid-cols-4 gap-2">
                    <div class="fasilitas text-gray-700">
                        <i class="fa-solid fa-check me-2"></i><span class="font-medium text-base">Dapur Bersama</span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="flex flex-col gap-2 my-3 mx-3">
                <div class="judul text-xl text-gray-900 font-semibold ">
                    Lokasi Kost
                </div>
                <div class="informasi">
                    jl.giok blok kk no.15 perum griya permata alam, ngijo,karangploso,malang,jawatimur,789836262
                </div>
            </div>
            <hr class="mb-3">
            <span class="text-xl text-gray-900 font-semibold mx-3">
                Kamar Yang Tersedia
            </span>
            <div class="grid grid-cols-3 gap-3 my-3 mx-3">
                <div class="max-w-sm bg-gray-200 border border-gray-200 rounded-lg shadow ">
                    <img class="rounded-t-lg" src="{{ asset('foto/header2.jpeg') }}" alt="" />
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Nama Kamar</h5>
                            <h5 class=" text-base font-semibold tracking-tight text-gray-900"><i class="fa-solid fa-users me-1"></i>2 Orang</h5>
                        </div>
                        <span class="text-lg font-semibold text-gray-900">Fasilitas</span>
                        <div class="grid grid-cols-2 gap-2">
                            <span class="text-base font-medium text-gray-900"><i class="fa-solid fa-check me-1"></i>Kasur</span>
                        </div>
                        <span class="text-lg font-semibold text-gray-900 text-balance">Peraturan Kamar</span>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, tempore!</p>
                        <div class="flex justify-between mt-3">
                            <a href="" class="border border-[#4F6F52] py-1 px-3 rounded-lg text-gray-900">Info</a>
                            <a href="" class="bg-[#4F6F52] py-1 px-3 rounded-lg text-white">Ajukan Sewa</a>
                        </div>                        
                    </div>
                </div>
                <div class="max-w-sm bg-gray-200 border border-gray-200 rounded-lg shadow ">
                    <img class="rounded-t-lg" src="{{ asset('foto/header2.jpeg') }}" alt="" />
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Nama Kamar</h5>
                            <h5 class=" text-base font-semibold tracking-tight text-gray-900"><i class="fa-solid fa-users me-1"></i>2 Orang</h5>
                        </div>
                        <span class="text-lg font-semibold text-gray-900">Fasilitas</span>
                        <div class="grid grid-cols-2 gap-2">
                            <span class="text-base font-medium text-gray-900"><i class="fa-solid fa-check me-1"></i>Kasur</span>
                        </div>
                        <span class="text-lg font-semibold text-gray-900 text-balance">Peraturan Kamar</span>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, tempore!</p>
                        <div class="flex justify-between mt-3">
                            <a href="" class="border border-[#4F6F52] py-1 px-3 rounded-lg text-gray-900">Info</a>
                            <a href="" class="bg-[#4F6F52] py-1 px-3 rounded-lg text-white">Ajukan Sewa</a>
                        </div>                        
                    </div>
                </div>
                <div class="max-w-sm bg-gray-200 border border-gray-200 rounded-lg shadow ">
                    <img class="rounded-t-lg" src="{{ asset('foto/header2.jpeg') }}" alt="" />
                    <div class="p-5">
                        <div class="flex justify-between items-center">
                            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900">Nama Kamar</h5>
                            <h5 class=" text-base font-semibold tracking-tight text-gray-900"><i class="fa-solid fa-users me-1"></i>2 Orang</h5>
                        </div>
                        <span class="text-lg font-semibold text-gray-900">Fasilitas</span>
                        <div class="grid grid-cols-2 gap-2">
                            <span class="text-base font-medium text-gray-900"><i class="fa-solid fa-check me-1"></i>Kasur</span>
                        </div>
                        <span class="text-lg font-semibold text-gray-900 text-balance">Peraturan Kamar</span>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, tempore!</p>
                        <div class="flex justify-between mt-3">
                            <a href="" class="border border-[#4F6F52] py-1 px-3 rounded-lg text-gray-900">Info</a>
                            <a href="" class="bg-[#4F6F52] py-1 px-3 rounded-lg text-white">Ajukan Sewa</a>
                        </div>                        
                    </div>
                </div>
            </div>
            paginate
            <hr>
            <div class="mt-3">
                <span class="font-semibold text-lg">Review</span>
            </div>
            <div class="flex items-center gap-4">
                <span class="font-bold text-[80px] ">4.5⭐</span>
                <span class="text-base font-medium">Dari 400 User</span>
            </div>
            <div class="flex flex-col gap-5">
                <div class="bg-gray-50 py-3 px-5 rounded-lg border border-gray-900">
                    <div class="flex gap-4">
                        <div class="profile">
                            <img src="{{ asset('foto/dummy.jpeg') }}" alt="" width="250" class="rounded-full">
                        </div>
                        <div class="Informasinya">
                            <h1 class="text-2xl font-semibold text-gray-900">Username</h1>
                            <div class="flex">
                                <span>⭐⭐⭐⭐</span>
                                <span class="ms-3">15-Januari-2024</span>
                            </div>
                            <p class="text-balance">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nihil voluptates ipsa repellat ullam? Odio voluptatibus, rerum possimus assumenda dolor suscipit fugiat, maxime accusantium necessitatibus tempore quia deleniti! Delectus dolore similique reiciendis sed maiores quis minus accusamus iste, quaerat aliquid, saepe quae, quam possimus quasi quo. Ipsum distinctio eaque consectetur.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 py-3 px-5 rounded-lg border border-gray-900">
                    <div class="flex gap-4">
                        <div class="profile">
                            <img src="{{ asset('foto/dummy.jpeg') }}" alt="" width="250" class="rounded-full">
                        </div>
                        <div class="Informasinya">
                            <h1 class="text-2xl font-semibold text-gray-900">Username</h1>
                            <div class="flex">
                                <span>⭐⭐⭐⭐</span>
                                <span class="ms-3">15-Januari-2024</span>
                            </div>
                            <p class="text-balance">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nihil voluptates ipsa repellat ullam? Odio voluptatibus, rerum possimus assumenda dolor suscipit fugiat, maxime accusantium necessitatibus tempore quia deleniti! Delectus dolore similique reiciendis sed maiores quis minus accusamus iste, quaerat aliquid, saepe quae, quam possimus quasi quo. Ipsum distinctio eaque consectetur.</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 py-3 px-5 rounded-lg border border-gray-900">
                    <div class="flex gap-4">
                        <div class="profile">
                            <img src="{{ asset('foto/dummy.jpeg') }}" alt="" width="250" class="rounded-full">
                        </div>
                        <div class="Informasinya">
                            <h1 class="text-2xl font-semibold text-gray-900">Username</h1>
                            <div class="flex">
                                <span>⭐⭐⭐⭐</span>
                                <span class="ms-3">15-Januari-2024</span>
                            </div>
                            <p class="text-balance">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus nihil voluptates ipsa repellat ullam? Odio voluptatibus, rerum possimus assumenda dolor suscipit fugiat, maxime accusantium necessitatibus tempore quia deleniti! Delectus dolore similique reiciendis sed maiores quis minus accusamus iste, quaerat aliquid, saepe quae, quam possimus quasi quo. Ipsum distinctio eaque consectetur.</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
    </div>
@endsection
