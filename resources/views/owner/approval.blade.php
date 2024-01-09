@extends('layout.mainowner')
@include('layout.sidebar_owner')

@section('owner')
    <h1 class="text-xl my-5">Persetujuan Pembayaran</h1>

    <div
        class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
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
                            Nama User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            IDR
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jangka Waktu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white dark:bg-gray-800 items-center">
                        <th scope="row" class="px-6 py-4 font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                            1
                        </th>
                        <td class="px-6 py-4 text-xs">
                            Kontrakan Kuning
                        </td>
                        <td class="px-6 py-4 text-xs">
                            Deka
                        </td>
                        <td class="px-6 py-4 text-xs">
                            Rp.300.000
                        </td>
                        <td class="px-6 py-4 text-xs">
                            1 bulan
                        </td>
                        <td class="px-6 py-4 text-xs flex items-center gap-3">
                            <form action="#" method="post" class="my-auto">
                                @method('patch')
                                <button type="submit" class="text-red-600 self-center">Tolak</button>
                            </form>
                            <form action="#" method="post" class="my-auto">
                                @method('patch')
                                <button type="submit" class="text-green-600 self-center">Terima</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
