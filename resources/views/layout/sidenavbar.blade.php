    <nav class="bg-[#D2E3C8] border-gray-400 w-full fixed z-50">
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
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52]   md:p-0 {{ request()->is('/') ? 'underline underline-offset-4' : '' }}">Beranda</a>
                            </li>
                            <li>
                                <a href="/list-kos"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0 {{ request()->is('list-kos') ? 'underline underline-offset-4' : '' }} ">List
                                    Kost</a>
                            </li>
                            <li>
                                <a href="/payment"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0 {{ request()->is('payment') ? 'underline underline-offset-4' : '' }}">Pembayaran</a>
                            </li>
                            <li>
                                <a href="/history"
                                    class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0 {{ request()->is('history') ? 'underline underline-offset-4' : '' }}">History</a>
                            </li>
                            <li class="mx-2">
                                |
                            </li>
                            <li>
                                <button type="button" class="flex text-sm rounded-full md:me-0" id="massage"
                                    aria-expanded="false" data-dropdown-toggle="massage-dropdown"
                                    data-dropdown-placement="bottom">
                                    <i class="fa-solid fa-bell text-2xl text-gray-900 hover:text-gray-700 duration-200"></i>
                                    {{-- iki indikator lak enek pesan anyar --}}
                                    @foreach (Auth::user()->notifikasi()->where('is_indicator', true)->orderBy('created_at', 'desc')->get() as $notif)
                                        <div
                                            class="inline-flex items-center justify-center w-2 h-2 -mb-[10px] -ms-2 border border-white rounded-full bg-red-500">
                                        </div>
                                        @php
                                            $notif->is_indicator = false;
                                            $notif->save();
                                        @endphp
                                    @endforeach
                                    {{-- oke wo --}}
                                </button>
                                <div class="z-50 hidden my-4 text-base w-80 list-none bg-white divide-y divide-gray-100 rounded-lg shadow p-3"
                                    id="massage-dropdown">
                                    <span class="text-xl text-gray-900 font-semibold ms-3">Notifikasi</span>
                                    <div class="flex flex-col gap-3 px-4 py-3">
                                        {{-- @dd(Auth::user()->notifikasi()->orderBy('created_at', 'desc')->get()); --}}
                                        @foreach (Auth::user()->notifikasi()->orderBy('created_at', 'desc')->get() as $notif)
                                            <div
                                                class="flex items-center p-2 transition duration-150 ease-in-out rounded-lg hover:bg-gray-200">
                                                <div class="">
                                                    <div class="text-sm font-medium text-gray-900">{{ $notif->user->name }}
                                                    </div>
                                                    <div class="text-sm text-gray-700">{{ $notif->pesan_user }}</div>
                                                    <div class="text-xs text-gray-500">
                                                        {{ $notif->created_at->diffForHumans() }}</div>
                                                </div>
                                            </div>
                                            <hr>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                                    <button type="button"
                                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300"
                                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                        data-dropdown-placement="bottom">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="w-8 h-8 rounded-full"
                                            src="{{ asset('profiles/' . Auth::user()->foto) }}" alt="user photo">
                                    </button>
                                    <!-- Dropdown menu -->
                                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow"
                                        id="user-dropdown">
                                        <div class="px-4 py-3">
                                            <span
                                                class="block text-base font-semibold text-gray-900">{{ Auth::user()->name }}</span>
                                            <span
                                                class="block text-sm text-gray-500 max-w-32">{{ Auth::user()->email }}</span>
                                        </div>
                                        <ul class="py-1" role="none">
                                            <li>
                                                <a href="{{ route('profile.edit') }}"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                    role="menuitem"><i class="fa-solid fa-gear me-3"></i>Pengaturan</a>
                                            </li>
                                            <li>
                                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a href="#"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer"
                                                        role="menuitem"
                                                        onclick="event.preventDefault(); showLogoutAlert();">
                                                        <i class="fa-solid fa-arrow-right-from-bracket me-3"></i>Keluar
                                                    </a>
                                                </form>

                                                <script>
                                                    function showLogoutAlert() {
                                                        Swal.fire({
                                                            title: 'Konfirmasi',
                                                            text: 'Anda yakin ingin keluar?',
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonText: 'Ya, Keluar',
                                                            cancelButtonText: 'Batal',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('logout-form').submit();
                                                            }
                                                        });
                                                    }
                                                </script>
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
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#4F6F52] md:p-0 {{ request()->is('/') ? 'underline underline-offset-4' : '' }}">Beranda</a>
                        </li>
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
