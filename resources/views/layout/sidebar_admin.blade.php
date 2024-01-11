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
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-[#739072] text-white' : 'bg-gray-200' }}">
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
                    <a href="{{ route('admin.approvaladmin') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->routeIs('admin.approvaladmin') ? 'bg-[#739072] text-white' : 'bg-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="m17.275 20.25l3.475-3.45l-1.05-1.05l-2.425 2.375l-.975-.975l-1.05 1.075zM6 9h12V7H6zm12 14q-2.075 0-3.537-1.463T13 18q0-2.075 1.463-3.537T18 13q2.075 0 3.538 1.463T23 18q0 2.075-1.463 3.538T18 23M3 22V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v6.675q-.7-.35-1.463-.513T18 11H6v2h7.1q-.425.425-.787.925T11.675 15H6v2h5.075q-.05.25-.062.488T11 18q0 1.05.288 2.013t.862 1.837L12 22l-1.5-1.5L9 22l-1.5-1.5L6 22l-1.5-1.5z"/></svg>
                        <span class="ms-3">Approval Kos</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kelola-admin') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->routeIs('kelola-admin') ? 'bg-[#739072] text-white' : 'bg-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ms-3">Kelola Owner</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.transaksiowner') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg {{ request()->routeIs('admin.transaksiowner') ? 'bg-[#739072] text-white' : 'bg-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 14 14"><path fill="currentColor" fill-rule="evenodd" d="M1.5 1A1.5 1.5 0 0 0 0 2.5v7A1.5 1.5 0 0 0 1.5 11h3.985l-.537 1.5H4A.75.75 0 0 0 4 14h6a.75.75 0 0 0 0-1.5h-.948L8.515 11H9a1 1 0 1 0 0-2H2V3h5a1 1 0 0 0 0-2zm10.083-1a.75.75 0 0 1 .75.75v.528a1.999 1.999 0 0 1 1.553 1.305a.75.75 0 0 1-1.414.5A.498.498 0 0 0 12 2.75h-.967a.366.366 0 0 0-.079.723l1.473.322a2 2 0 0 1-.094 3.927v.528a.75.75 0 0 1-1.5 0v-.528a2.003 2.003 0 0 1-1.552-1.305a.75.75 0 0 1 1.414-.5a.5.5 0 0 0 .472.333H12a.5.5 0 0 0 .107-.99l-1.473-.322a1.866 1.866 0 0 1 .2-3.677V.75a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd"/></svg>
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
