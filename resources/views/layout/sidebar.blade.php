<style>
    .pnt{
        word-break: break-word;
    }
    .overvflow-y-scroll::-webkit-scrollbar{
        width: 3px;
    }
</style>
<nav class="fixed top-0 z-30     w-full bg-[#D2E3C8]">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200   ">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="" class="flex ms-2 md:me-24">
                    <img src="{{ asset('foto/inilogo.png') }}" class="h-8 me-3" alt="FlowBite Logo" />
                    <span class="self-center text-lg font-semibold sm:text-xl whitespace-nowrap ">In De Kost</span>
                </a>
            </div>
            <div class="flex items-center ms-3">
                @if (Auth::user()->role == 'owner')
                    <div class="flex gap-4">
                        <div class="notif">
                            <button type="button" class="flex text-sm rounded-full md:me-0" id="massage"
                                aria-expanded="false" data-dropdown-toggle="massage-dropdown"
                                data-dropdown-placement="bottom">
                                <i class="fa-solid fa-bell text-2xl text-gray-900 hover:text-gray-700 duration-200"></i>
                                @foreach (Auth::user()->notifikasi()->where('status', 'no read')->orderBy('created_at', 'desc')->get() as $notif)
                                    <div
                                        class="inline-flex items-center justify-center w-2 h-2 -mb-[10px] -ms-2 border border-white rounded-full bg-red-500">
                                    </div>
                                @endforeach
                            </button>
                            <div class="z-50 hidden my-4 text-base w-80 list-none bg-white divide-y divide-gray-100 rounded-lg shadow p-3"
                                id="massage-dropdown">
                                <div class="flex justify-between mx-3">
                                    <div class="note">
                                        <span class="text-xl text-gray-900 font-semibold">Notifikasi</span>
                                    </div>
                                    <div class="clear">
                                        <form action="{{route('notif')}}" method="post" class="inline-flex justify-end items-center">
                                            @csrf
                                            <button type="submit">Tandai Baca</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-3 px-4 py-3  overflow-y-scroll h-[200px]">
                                    {{-- nggen foreachmu lek ojo salah nggen --}}
                                    {{-- @dd(Auth::user()->notifikasiowner()->orderBy('created_at', 'desc')->get()); --}}
                                    @foreach (Auth::user()->notifikasiowner()->orderBy('created_at', 'desc')->get() as $notif)
                                        <div
                                            class="flex items-center p-2 transition duration-150 ease-in-out rounded-lg hover:bg-gray-200">
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $notif->owner->name }}
                                                </div>
                                                <div class="text-sm text-gray-700 text-wrap pnt">{{ $notif->pesan_owner }}</div>
                                                <div class="text-xs text-gray-500">
                                                    {{ $notif->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                    {{-- iki tutupe foreach --}}
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 "
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="{{ asset('profiles/' . Auth::user()->foto) }}"
                                    alt="user photo">
                            </button>
                        </div>
                    </div>
                @else
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 "
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ asset('profiles/' . Auth::user()->foto) }}"
                                alt="user photo">
                        </button>
                    </div>
                @endif
                <div class="z-50 hidden my-4 text-base list-none bg-gray-50 divide-y divide-gray-100 rounded shadow"
                    id="dropdown-user">
                    <div class="px-4 py-3" role="none">
                        <p class="text-base text-gray-900 " role="none">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="text-sm font-medium text-gray-400 truncate" role="none">
                            {{ Auth::user()->email }}
                        </p>
                    </div>
                    <ul class="py-1" role="none">
                        <li>
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem"><i
                                    class="fa-solid fa-gear me-3"></i>Pengaturan</a>
                        </li>
                        <li>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer"
                                    role="menuitem" onclick="event.preventDefault(); showLogoutAlert();">
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
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-20 w-64 h-screen pt-20 transition-transform -translate-x-full bg-[#D2E3C8] border-r border-gray-200 sm:translate-x-0 "
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-[#D2E3C8]">
        <ul class="space-y-2 font-medium">
            @if (Auth::user()->role == 'admin')
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#739072] hover:text-white duration-300 hover:shadow-xl {{ request()->RouteIs('admin.dashboard') ? 'bg-[#739072] text-white' : 'bg-[#D2E3C8]' }}">
                        <i class="fa-solid fa-house"></i>
                        <span class="ms-3">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.approvaladmin') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#739072] hover:text-white duration-300 hover:shadow-xl {{ request()->RouteIs('admin.approvaladmin') ? 'bg-[#739072] text-white' : 'bg-[#D2E3C8]' }}">
                        <i class="fa-solid fa-house-circle-check"></i>
                        <span class="ms-3">Approval Kost</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kelola-admin') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#739072] hover:text-white duration-300 hover:shadow-xl {{ request()->RouteIs('kelola-admin') ? 'bg-[#739072] text-white' : 'bg-[#D2E3C8]' }}">
                        <i class="fa-solid fa-people-arrows"></i>
                        <span class="ms-3">Kelola Owner</span>
                    </a>
                </li>
                <li>
                    <a href=""
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#739072] hover:text-white duration-300 hover:shadow-xl {{ request()->RouteIs('') ? 'bg-[#739072] text-white' : 'bg-[#D2E3C8]' }}">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <span class="ms-3">Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.transaksiowner') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#739072] hover:text-white duration-300 hover:shadow-xl {{ request()->RouteIs('admin.transaksiowner') ? 'bg-[#739072] text-white' : 'bg-[#D2E3C8]' }}">
                        <i class="fa-solid fa-arrows-down-to-line"></i>
                        <span class="ms-3">Footer</span>
                    </a>
                </li>
            @elseif (Auth::user()->role == 'owner')
                <li>
                    <a href="/dashboard/owner"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#739072] hover:text-white duration-300 hover:shadow-xl {{ request()->is('dashboard/owner') ? 'bg-[#739072] text-white' : 'bg-[#D2E3C8]' }}">
                        <i class="fa-solid fa-house"></i>
                        <span class="ms-3">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="/approval/owner"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#739072] hover:text-white duration-300 hover:shadow-xl {{ request()->is('approval/owner') ? 'bg-[#739072] text-white' : 'bg-[#D2E3C8]' }}">
                        <i class="fa-solid fa-handshake"></i>
                        <span class="ms-3">Persetujuan</span>
                    </a>
                </li>
                <li>
                    <a href="/kos/owner"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#739072] hover:text-white duration-300 hover:shadow-xl {{ request()->is('kos/owner') ? 'bg-[#739072] text-white' : 'bg-[#D2E3C8]' }}">
                        <i class="fa-solid fa-hotel"></i>
                        <span class="ms-3">Kost</span>
                    </a>
                </li>
                <li>
                    <a href="/kamar/owner"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#739072] hover:text-white duration-300 hover:shadow-xl {{ request()->is('kamar/owner') ? 'bg-[#739072] text-white' : 'bg-[#D2E3C8]' }}">
                        <i class="fa-solid fa-bed"></i>
                        <span class="ms-3">Kamar</span>
                    </a>
                </li>
                <li>
                    <a href="/tracking/owner"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-[#739072] hover:text-white duration-300 hover:shadow-xl {{ request()->is('tracking/owner') ? 'bg-[#739072] text-white' : 'bg-[#D2E3C8]' }}">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span class="ms-3">Tracking</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>
