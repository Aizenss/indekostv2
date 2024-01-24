@extends('layout.main')

@extends('layout.sidebar')

@section('isi')
    <div class="py-20 px-10 sm:ml-64 justify-center">
        <h1 class=" text-3xl font-black text-gray-900 dark:text-white">Transaksi</h1>
        <br>
        <div class="ml-8 mr-8 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-white">
                <thead class="text-xs text-white uppercase bg-[#4F6F52] ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-16 py-3">
                            {{-- <span class="sr-only">Image</span> --}}
                            Nama Owner
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Kos
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Keuntungan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $transaksi)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-semibold text-gray-900 ">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 ">
                                {{ $transaksi->kamar->kos->user->name }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 ">
                                {{ $transaksi->kamar->user->name }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 ">
                                {{ $transaksi->kamar->nama_kamar }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 ">
                                Rp.{{ number_format($transaksi->kamar->harga, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 ">
                                Rp.{{ number_format($transaksi->nominal_admin, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4">
                                <button data-modal-target="{{ $transaksi }}" data-modal-toggle="{{ $transaksi }}"
                                    type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5M12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5m0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal toggle -->

                        <!-- Main modal -->
                        <div id="{{ $transaksi }}" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold  ">
                                            Detail Transaksi
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="select-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            {{-- <span class="sr-only">Close modal</span> --}}
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5">
                                        <ul class="space-y-4 mb-4">
                                            <li>
                                                Nama Owner : <span
                                                    class="font-semibold text-gray-900">{{ $transaksi->kamar->kos->user->name }}</span>
                                            </li>
                                            <li> Nama User :<span
                                                    class="font-semibold text-gray-900">{{ $transaksi->kamar->user->name }}</span>
                                            </li>
                                            <li>
                                                Harga : <span
                                                    class="font-semibold text-gray-900">Rp.{{ number_format($transaksi->kamar->harga, 0, ',', '.') }}</span>
                                            </li>
                                            <li>
                                                Alamat : <span
                                                    class="font-semibold text-gray-900">{{ $transaksi->kamar->kos->lokasi }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center font-semibold text-gray-900">
                                <img src="{{ asset('foto/nodataadmin.png') }}" class="h-52 w-52 mx-auto" alt="">

                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
