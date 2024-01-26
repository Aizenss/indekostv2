@if ( request()->is('/'))
<footer class="bg-[#E8F1E3] w-full">
@elseif (Auth::user()->role == 'user')
<footer class="bg-[#E8F1E3] w-full">
@else
<footer class="bg-[#E8F1E3] sm:ml-64">
@endif
    <div class="px-[15px] md:px-[80px] lg:px-[140px]  w-full py-6 lg:py-8" id="kontak">
        <a href="" class="flex items-center justify-center">
            <img src="{{ asset('foto/inilogo.png') }}" class="h-20 me-3" alt="logo" />
        </a>
        <div class="md:flex md:justify-between gap-4 mt-4">
            <div class="mb-6 md:mb-0 md:w-1/2">
                <p class="px-5 text-black">Kemudahan menemukan kost sesuai keinginan Anda! Gunakan Indekost untuk
                    menjelajahi tempat tinggal yang nyaman dan sesuai dengan anggaran Anda.</p>
                <br>
                <div class="px-5 flex text-white gap-5">
                    <div class="bg-[#4F6F52] flex justify-center items-center p-2 rounded w-10 h-10">
                        <i class="fa-brands fa-instagram text-2xl"></i>
                    </div>
                    <div class="bg-[#4F6F52] flex justify-center items-center p-2 rounded w-10 h-10">
                        <i class="fa-brands fa-twitter text-2xl"></i>
                    </div>
                    <div class="bg-[#4F6F52] flex justify-center items-center p-2 rounded w-10 h-10">
                        <i class="fa-brands fa-youtube text-2xl"></i>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2">
                <div class="">
                    <ul class="px-5 text-black font-medium">
                        <li class="mb-6">
                            <div class=" flex items-center gap-2">
                                <i class="fa-solid fa-location-dot ms-0.5 text-xl text-black"></i>
                                <p class="ml-2 hover:text-[#739072] duration-300 cursor-none">Malang <span class="font-semibold">Jawa Timur, Indonesia</span></p>
                            </div>
                        </li>
                        <li class="mb-6">
                            <div class=" flex items-center gap-2">
                                <i class="fa-solid fa-envelope text-xl text-black"></i>
                                <span class="ml-2 hover:text-[#739072] duration-300 cursor-none">indekost@gmail.com</span>
                            </div>
                        </li>
                        <li class="mb-6">
                            <div class=" flex items-center gap-2">
                                <i class="fa-brands fa-square-whatsapp ms-0.5 text-xl text-black"></i>
                                <span class="ml-2 hover:text-[#739072] duration-300">+62 813 6789 5433</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-2 border-gray-200  lg:my-4" />
        <div class="text-center">
            <span class="text-sm text-black sm:text-center ">© 2024 <a href=""
                    class="">INDEKOS™</a>. All Rights Reserved.
            </span>
        </div>
    </div>
</footer>
