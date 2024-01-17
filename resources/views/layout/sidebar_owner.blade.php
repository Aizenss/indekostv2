<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-200">
        <ul class="space-y-2 font-medium">
            <li>
                <div class="flex justify-center">
                    <img src="{{ asset('foto/inilogo.png') }}" alt="" width="150">
                </div>
            </li>
            <li>
                @auth
                @if(!empty($foto))
                    <a href="{{ route('profile.edit') }}" class="nama-user flex gap-3 items-center hover:bg-[#739072] py-2 px-4 rounded-xl border border-[#739072] hover:text-white text-black duration-300 hover:shadow-lg">
                        <img src="{{ asset('profiles/'. Auth::user()->foto) }}" alt="" width="40" class="rounded-full border border-[#3d4c3c]">
                        <span class="font-medium text-lg">Halo Wok</span>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                @else
                    <a href="{{ route('profile.edit') }}" class="nama-user flex gap-3 items-center hover:bg-[#739072] py-2 px-4 rounded-xl border border-[#739072] hover:text-white text-black duration-300 hover:shadow-lg">
                        <img src="{{ asset('profiles/'. Auth::user()->foto) }}" alt="" width="40" class="rounded-full border border-[#3d4c3c]">
                        <span class="font-medium text-lg">{{ ( Auth::user()->name) }}</span>
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                @endif
                @else
                    <div class="grid grid-cols-2 gap-1">
                        <div class="register">
                            <a href="/login"
                                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#739072] duration-300 hover:text-white border border-[#739072]">
                                <span class="ms-3"><i class="fa-solid fa-user fa-md me-2"></i>Login</span>
                            </a>
                        </div>
                        <div class="login">
                            <a href="/flowas"
                                class="flex items-center py-2 text-gray-900 rounded-lg hover:bg-[#739072] duration-300 hover:text-white border border-[#739072]">
                                <span class="ms-3"><i class="fa-solid fa-user-plus fa-md me-1"></i>Register</span>
                            </a>
                        </div>
                    </div>
                @endauth
            </li>
            <li>
                <a href="/dashboard/owner"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('dashboard/owner') ? 'bg-[#739072] text-white' : 'bg-gray-200' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256"><path fill="currentColor" d="m218.83 103.77l-80-75.48a1.14 1.14 0 0 1-.11-.11a16 16 0 0 0-21.53 0l-.11.11l-79.91 75.48A16 16 0 0 0 32 115.55V208a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-48h32v48a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-92.45a16 16 0 0 0-5.17-11.78M208 208h-48v-48a16 16 0 0 0-16-16h-32a16 16 0 0 0-16 16v48H48v-92.45l.11-.1L128 40l79.9 75.43l.11.1Z"/></svg>
                     <span class="ms-3">Beranda</span>
                </a>
            </li>
            <li>
                <a href="/approval/owner"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('approval/owner') ? 'bg-[#739072] text-white' : 'bg-gray-200' }}">
                    <img src="{{asset('icon/9191429_democracy_esteem_regard_accept_election_icon.png')}}" class="w-6 h-6" alt="">
                    <span class="ms-3">Persetujuan</span>
                </a>
            </li>
            <li>
                <a href="/kos/owner"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('kos/owner') ? 'bg-[#739072] text-white' : 'bg-gray-200' }}">
                    <img src="{{asset('icon/7088614_bit_byte_server_data_database_icon.png')}}" class="w-6 h-6" alt="">
                    <span class="ms-3">Kost</span>
                </a>
            </li>
            <li>
            <li>
                <a href="/kamar/owner"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('kamar/owner') ? 'bg-[#739072] text-white' : 'bg-gray-200' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" d="M1.5 18.5V4m0 14.5s0 3-1.5 3m1.5-3h21m0 0s0 3 1.5 3m-1.5-3V13A3.5 3.5 0 0 0 19 9.5h-8.5v4m-9 2h21m-14-4.1S7.5 13 6.25 13a1.75 1.75 0 0 1-1.75-1.75c0-.966.784-1.746 1.75-1.746C7.5 9.504 8.5 11.1 8.5 11.1z"/></svg>
                    <span class="ms-3">Kamar</span>
                </a>
            </li>
            <li>
                @auth
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                @endauth
            </li>
        </ul>
    </div>
</aside>
