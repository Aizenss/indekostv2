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
                        @foreach ($kosts as $kost)
                            <tr class="bg-white dark:bg-gray-800 items-center">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$loop->iteration}}
                                </th>
                                <td class="px-6 py-4 text-xs">
                                    {{$kost->nama_kost}}
                                </td>
                                <td class="px-6 py-4 text-xs ellipsis">
                                    {{$kost->ketentuan}}
                                </td>
                                <td class="px-6 py-4 text-xs ellipsis">
                                    {{$kost->lokasi}}
                                </td>
                                <td class="px-6 py-4 text-xs ellipsis">
                                    Rp.{{number_format($kost->harga, 0, ',', '.')}}
                                </td>
                                <td class="px-6 py-4 text-xs flex items-center gap-3">
                                    <form action="#" method="post" class="my-auto">
                                        @method('patch')
                                        <button type="submit" class="text-blue-500 self-center">show</button>
                                    </form>
                                    <form action="#" method="post" class="my-auto">
                                        @method('patch')
                                        <button type="submit" class="text-yellow-500 self-center">edit</button>
                                    </form>
                                    <form action="#" method="post" class="my-auto">
                                        @method('patch')
                                        <button type="submit" class="text-red-500 self-center">delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
