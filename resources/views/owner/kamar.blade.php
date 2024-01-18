@extends('layout.mainowner')
@extends('layout.sidebar_owner')

@section('style')
    <style></style>
@endsection

@section('owner')
    <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow">
        <h1 class="text-xl">List Kamar</h1>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Kos
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Kamar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($kosts as $kost)
                            <tr class="bg-white dark:bg-gray-800 items-center">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $kost->nama_kost }}
                                </td>
                                @php
                                    $total = count($kost->kamar);
                                @endphp
                                <td class="px-6 py-4">
                                    {{ $total }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('owner.kamar.tambah', $kost->id) }}"
                                        class="text-blue-600 hover:underline dark:text-blue-500">Tambah Kamar</a>
                                </td>
                            </tr>
                    @empty
                        <tr class="bg-white dark:bg-gray-800 items-center">
                            <tr scope="row" colspan="8"
                                class="px-6 flex items-center justify-center py-4 font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">

                            </tr>
                            <td></td>
                            <td></td>
                            <td><img src="{{ asset('ilustrasi/Empty-amico 1.png') }}" class="size-52" alt=""></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
