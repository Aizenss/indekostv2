    <nav class="bg-[#D2E3C8] border-gray-400 w-full fixed z-10">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('foto/inilogo.png') }}" class="h-10" alt="Flowbite Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap">In De Kost</span>
            </a>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium items-center p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-5 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">
                    @auth
                        @if (Auth::user()->role == 'user')
                            <li>
                                <a href="/"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0">Beranda</a>
                            </li>
                            <li>
                                <a href="/list-kos"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0">List
                                    Kost</a>
                            </li>
                            <li>
                                <a href="/payment"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0">Pembayaran</a>
                            </li>
                            <li>
                                <a href="/history"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0">History</a>
                            </li>
                            <li>
                                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                                    <button type="button"
                                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300"
                                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                        data-dropdown-placement="bottom">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="w-8 h-8 rounded-full" src="{{ asset('foto/dummy.jpeg') }}"
                                            alt="user photo">
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                                        id="user-dropdown">
                                        <div class="px-4 py-3">
                                            <span
                                                class="block text-base font-semibold text-gray-900">{{ Auth::user()->name }}</span>
                                            <span class="block text-sm text-gray-500 max-w-32">{{Auth::user()->email}}</span>
                                        </div>
                                        <ul class="py-2" aria-labelledby="user-menu-button">
                                            <li>
                                                <a href="{{ route('profile.edit') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                            </li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a :href="route('logout')"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer"
                                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                                        Log Out
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                    <button data-collapse-toggle="navbar-user" type="button"
                                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                                        aria-controls="navbar-user" aria-expanded="false">
                                        <span class="sr-only">Open main menu</span>
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 17 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                                        </svg>
                                    </button>
                                </div>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="#home"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0">Beranda</a>
                        </li>
                        @auth
                        <li>
                            <a href="#tentang"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0">Tentang</a>
                        </li>
                        <li>
                            <a href="#keuntungan"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0">Keuntungan</a>
                        </li>
                        <li>
                            <a href="#listkost"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0">List
                                Kost</a>
                        </li>
                        <li>
                            <a href="#kontak"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0">Kontak</a>
                        </li>
                        @endauth
                        <li class="mx-2">
                            |
                        </li>
                        <li>
                            <a href="/pilih-role"
                                class="block py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0">Daftar</a>
                        </li>
                        <li>
                            <a href="/login"
                                class="block py-2 px-1 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0">Masuk</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
