<nav class="py-2 px-3 md:hidden bg-[#D2E3C8]">
    <ul class="flex justify-between items-center">
        <li>
            <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar"
                aria-controls="default-sidebar" type="button"
                class="inline-flex items-center p-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-[#739072] duration-300 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                    </path>
                </svg>
            </button>
        </li>
        <li>
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <button type="button"
                    class="px-2 py-1 text-sm font-medium text-gray-900 bg-white border border-[#739072] rounded-s-lg hover:bg-[#739072] hover:text-white duration-300">
                    Login
                </button>
                <button type="button"
                    class="px-2 py-1 text-sm font-medium text-gray-900 bg-white border border-[#739072] rounded-e-lg hover:bg-[#739072] hover:text-white duration-300">
                    Daftar
                </button>
            </div>
        </li>
    </ul>
</nav>

<aside id="default-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-[#D2E3C8]">
        <ul class="space-y-2 font-medium">
            <li>
                <div class="flex justify-center">
                    <img src="{{ asset('foto/inilogo.png') }}" alt="" width="150">
                </div>
            </li>

            <li>
                <a href="/admin-dashboardadmin"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('/admin-dashboardadmin') ? 'bg-[#739072] text-white' : 'bg-gray-200' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                        <path
                            d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            @auth
                <li>
                    <a href="/approvaladmin"
                        class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('/approvaladmin') ? 'bg-lime-700 text-white' : 'bg-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" class="w-6 h-6 d="M20 16v-6h2v6a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V4c0-1.11.89-2 2-2h8v2H8v12zm-9.09-8.92L14 10.17l6.59-6.59L22 5l-8 8l-4.5-4.5zM16 20v2H4a2 2 0 0 1-2-2V7h2v13z"/></svg>
                        <span class="ms-3">Approval Kos</span>
                    </a>
                </li>
                <li>
                    <a href="/admin-kelolaowner"
                        class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('/admin-kelolaowner') ? 'bg-lime-700 text-white' : 'bg-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Kelola Owner</span>
                    </a>
                </li>
                <li>
                    <a href="/transaksiowner"
                        class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->is('/transaksiowner') ? 'bg-lime-700 text-white' : 'bg-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Transaksi</span>
                    </a>
                </li>
                    <li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a :href="route('logout')" class="flex items-center p-2 text-gray-900 rounded-lg"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa-solid fa-right-from-bracket fa-lg ms-0.5" style="color: #000000;"></i>
                                <span class="ms-3">Log Out</span>
                            </a>
                        </form>
                    @endauth
                </li>
        </ul>
    </div>
</aside>
