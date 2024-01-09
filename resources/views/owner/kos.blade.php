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
    <div
        class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h1 class="text-xl">List Kos Saya</h1>
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
                        <tr class="bg-white dark:bg-gray-800 items-center">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                                1
                            </th>
                            <td class="px-6 py-4 text-xs">
                                Kontrakan Kuning 
                            </td>
                            <td class="px-6 py-4 text-xs ellipsis">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, distinctio neque. Sit,
                                consequatur! Doloremque exercitationem fugit illum. Quasi nihil nemo pariatur rem ab ea
                                porro enim, est, minus harum ex.
                            </td>
                            <td class="px-6 py-4 text-xs ellipsis">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos minus hic vero ullam. Quam
                                labore quidem explicabo molestias libero repudiandae ducimus fuga totam commodi atque id,
                                molestiae expedita doloribus voluptate.
                            </td>
                            <td class="px-6 py-4 text-xs ellipsis">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate accusantium vero
                                corporis distinctio, dicta placeat optio eveniet quos explicabo porro quisquam eum delectus
                                magni in aspernatur rem quia dolores nihil.
                            </td>
                            <td class="px-6 py-4 text-xs flex items-center gap-3">
                                <form action="#" method="post" class="my-auto">
                                    @method('patch')
                                    <button type="submit" class="text-blue-600 self-center">show</button>
                                </form>
                                <form action="#" method="post" class="my-auto">
                                    @method('patch')
                                    <button type="submit" class="text-yellow-500 self-center">edit</button>
                                </form>
                                <form action="#" method="post" class="my-auto">
                                    @method('patch')
                                    <button type="submit" class="text-red-600 self-center">delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
