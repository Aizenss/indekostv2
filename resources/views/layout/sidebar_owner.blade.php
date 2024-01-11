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
                <div class="grid grid-cols-2 gap-1">
                    @auth
                    @else
                        <div class="register">
                            <a href="/login" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="ms-3">Login</span>
                            </a>
                        </div>
                        <div class="login">
                            <a href="/register" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-300 ">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5">
                                    <path
                                        d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                                </svg>
                                <span class="ms-3">Register</span>
                            </a>
                        </div>
                    </div>
                @endauth
            </li>
            <li>
                <a href="/dashboard/owner"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('dashboard/owner') ? 'bg-lime-700 text-white' : 'bg-gray-200' }}">
                    <img src="{{asset('icon/8763858_home_house_menu_dashboard_homepage_icon.png')}}" class="w-6 h-6" alt="">
                    <span class="ms-3">Beranda</span>
                </a>
            </li>
            <li>
                <a href="/approval/owner"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('approval/owner') ? 'bg-lime-700 text-white' : 'bg-gray-200' }}">
                    <img src="{{asset('icon/9191429_democracy_esteem_regard_accept_election_icon.png')}}" class="w-6 h-6" alt="">
                    <span class="ms-3">Persetujuan</span>
                </a>
            </li>
            <li>
                <a href="/kos/owner"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('kos/owner') ? 'bg-lime-700 text-white' : 'bg-gray-200' }}">
                    <img src="{{asset('icon/7088614_bit_byte_server_data_database_icon.png')}}" class="w-6 h-6" alt="">
                    <span class="ms-3">Kost</span>
                </a>
            </li>
            <li>
            <li>
                <a href="/kamar/owner"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('kamar/owner') ? 'bg-lime-700 text-white' : 'bg-gray-200' }}">
                    <img src="{{asset('icon/7088614_bit_byte_server_data_database_icon.png')}}" class="w-6 h-6" alt="">
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
