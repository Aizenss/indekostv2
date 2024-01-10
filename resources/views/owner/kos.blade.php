@extends('layout.mainowner')
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

@section('owner')
    <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow">
        <h1 class="text-xl">List Kos Saya</h1>
        <div class="flex justify-end my-3">
            <a href="{{ route('owner.kos.create') }}" class="bg-green-500 px-4 rounded-md py-1 text-white">+</a>
        </div>
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                Alamat
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
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
                                        class="px-6 py-4 font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
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
                                        Rp.{{ number_format($kost->harga, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-xs flex items-center gap-3">
                                        <button data-modal-target="show{{ $kost->id }}"
                                            data-modal-toggle="show{{ $kost->id }}" class="text-blue-500 self-center"
                                            type="button">
                                            show
                                        </button>
                                        <form action="{{ route('owner.kos.edit', ['id' => $kost->id]) }}" method="post"
                                            class="my-auto">
                                            @method('get')
                                            <button type="submit" class="text-yellow-500 self-center">edit</button>
                                        </form>
                                        <form action="{{ route('owner.kos.hapus', ['id' => $kost->id]) }}" method="post"
                                            class="my-auto">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="text-red-500 self-center">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            {{-- @endif --}}
                        @empty
                            data kosong
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
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            {{ $item->nama_kost }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="show{{ $item->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="p-4 md:p-5 space-y-4">
                        <img src="{{ asset('kosts/' . $item->foto_depan) }}" alt="">
                        <h1>Peraturan:<span class="text-">{{ $item->peraturan }}</span></h1>
                        <h1>Spesifikasi:<span class="text-">{{ $item->spesifikasi }}</span></h1>

                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
