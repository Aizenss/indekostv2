@extends('layout.main')
@extends('layout.sidebar_owner')

@section('style')
    <style></style>
@endsection

@section('isi')
    <div class="sm:ml-64">
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow my-2">
            <h1 class="text-xl">List Kamar</h1>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                    <thead class="text-xs text-white uppercase bg-[#4F6F52] ">
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
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 "><span class="text-lg mr-4 font-black">+</span>Kamar</a>
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
    </div>
@endsection
