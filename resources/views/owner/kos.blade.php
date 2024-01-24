@extends('layout.main')
@extends('layout.sidebar_owner')

<style>
    body>div>div>div>div>table>tbody>tr>td.ellipsis {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    body>div>div>div>div>table>tbody>tr>td:nth-child(2) {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>

@section('isi')
    <div class="sm:ml-64">
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow">
            <h1 class="text-xl">List Kos Saya</h1>
            <div class="flex justify-end my-3">
                <a href="{{ route('owner.kos.create') }}" class="bg-[#4F6F52] px-4 rounded-md py-1 text-white">+</a>
            </div>
            <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                        <thead class="text-xs text-white uppercase bg-[#4F6F52] ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Kost
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kententuan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alamatz
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($kosts as $kost)
                                {{-- @if ($kost->status != 'pending') --}}
                                <tr class="bg-white dark:bg-gray-800 items-center">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-xs text-gray-900 whitespace-nowrap ">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-4 text-xs">
                                        {{ $kost->nama_kost }}
                                    </td>
                                    <td class="px-6 py-4 text-xs ellipsis">
                                        {{ $kost->ketentuan }}
                                    </td>
                                    <td class="px-6 py-4 text-xs ellipsis">
                                        {{ $kost->lokasi }}
                                    </td>
                                    <td class="px-6 py-4 text-xs ellipsis">
                                        {{ $kost->status }}
                                    </td>
                                    <td class="px-4 py-4 text-xs flex items-center gap-1">
                                        @if ($kost->status == 'pending')
                                            -
                                        @else
                                            <button data-modal-target="show{{ $kost->id }}"
                                                data-modal-toggle="show{{ $kost->id }}"
                                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 self-center"
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M12 6.5a9.77 9.77 0 0 1 8.82 5.5c-1.65 3.37-5.02 5.5-8.82 5.5S4.83 15.37 3.18 12A9.77 9.77 0 0 1 12 6.5m0-2C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5m0 5a2.5 2.5 0 0 1 0 5a2.5 2.5 0 0 1 0-5m0-2c-2.48 0-4.5 2.02-4.5 4.5s2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5s-2.02-4.5-4.5-4.5" />
                                                </svg>
                                            </button>
                                            <form action="{{ route('owner.kos.edit', ['id' => $kost->id]) }}" method="post"
                                                class="my-auto focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2 ">
                                                @method('get')
                                                <button type="submit" class="text-white self-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h8.925l-2 2H5v14h14v-6.95l2-2V19q0 .825-.587 1.413T19 21zm4-7v-2.425q0-.4.15-.763t.425-.637l8.6-8.6q.3-.3.675-.45t.75-.15q.4 0 .763.15t.662.45L22.425 3q.275.3.425.663T23 4.4q0 .375-.137.738t-.438.662l-8.6 8.6q-.275.275-.637.438t-.763.162H10q-.425 0-.712-.288T9 14m12.025-9.6l-1.4-1.4zM11 13h1.4l5.8-5.8l-.7-.7l-.725-.7L11 11.575zm6.5-6.5l-.725-.7zl.7.7z" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <form action="{{ route('owner.kos.hapus', ['id' => $kost->id]) }}"
                                                method="post"
                                                class="my-auto focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1 me-2 mb-2">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="text-white self-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </td>

                                </tr>
                                {{-- @endif --}}
                            @empty
                                <tr class="bg-white dark:bg-gray-800 items-center">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-xs text-gray-900 whitespace-nowrap ">
                                    </th>
                                    <td></td>
                                    <td></td>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset('ilustrasi/Empty-amico 1.png') }}" class="size-52"
                                            alt="">
                                    </td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Main modal -->
        @foreach ($kosts as $item)
            <div id="show{{ $item->id }}" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full  max-w-md max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 ">
                                {{ $item->nama_kost }}
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="show{{ $item->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="p-4 md:p-5 space-y-4">
                            <img src="{{ asset('kosts/' . $item->foto_depan) }}" alt="Foto Kost">
                            <h1 class="text-lg font-normal text-gray-900">Ketentuan: <span
                                    class="text-sm font-extralight">{{ $item->ketentuan }}</span></h1>
                            <h1 class="text-lg font-normal text-gray-900">Alamat: <span
                                    class="text-sm font-extralight">{{ $item->lokasi }}</span></h1>
                            <h1 class="text-lg font-normal text-gray-900">Peraturan: <span
                                    class="text-sm font-extralight">{{ $item->peraturan }}</span></h1>
                            <h1 class="text-lg font-normal text-gray-900">Spesifikasi: <span
                                    class="text-sm font-extralight">{{ $item->spesifikasi }}</span></h1>
                        </div>

                        <!-- Modal footer -->
                        <div class="flex items-center justify-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                            <button type="button"
                                class="px-3 py-1.5 text-sm font-semibold text-gray-600 hover:text-gray-900 "
                                data-modal-hide="show{{ $item->id }}">
                                Oke
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
@endsection
