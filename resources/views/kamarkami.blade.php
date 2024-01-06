@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
<div class="sm:ml-64">
    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="grid grid-cols-2">
            <div class="col-span-2 p-5 flex items-center">
                <img class="rounded-t-lg w-40% md:w-50% h-40 md:h-48 lg:h-60 xl:h-42 object-cover" src="{{ asset('foto/header1.jpeg') }}" alt="" />
                <div class="ml-2 md:ml-4">
                    <button class="bg-red-200 rounded-2xl p-2">Cewe</button>
                    <br><br><br>
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Arumba</h1>
                    <br>
                    <p class="text-xl text-gray-500 dark:text-gray-400">Jl.Ngijo KarangPloso Malang</p>
                    <p class="text-md text-gray-500 dark:text-gray-400">Luas Kamar 12 meter persegi</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="grid grid-cols-2">
            <div class="col-span-2 p-5 flex items-center">
                <img class="rounded-t-lg w-40% md:w-50% h-40 md:h-48 lg:h-60 xl:h-42 object-cover" src="{{ asset('foto/header1.jpeg') }}" alt="" />
                <div class="ml-2 md:ml-4">
                    <button class="bg-red-200 rounded-2xl p-2">Cewe</button>
                    <br><br><br>
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Arumba</h1>
                    <br>
                    <p class="text-xl text-gray-500 dark:text-gray-400">Jl.Ngijo KarangPloso Malang</p>
                    <p class="text-md text-gray-500 dark:text-gray-700">Luas Kamar 12 meter persegi</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <div class="grid grid-cols-2">
            <div class="col-span-2 p-5 flex items-center">
                <img class="rounded-t-lg w-40% md:w-50% h-40 md:h-48 lg:h-60 xl:h-42 object-cover" src="{{ asset('foto/header1.jpeg') }}" alt="" />
                <div class="ml-2 md:ml-4">
                    <button class="bg-red-200 rounded-2xl p-2">Cewe</button>
                    <br><br><br>
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900 dark:text-white">Arumba</h1>
                    <br>
                    <p class="text-xl text-gray-500 dark:text-gray-400">Jl.Ngijo KarangPloso Malang</p>
                    <p class="text-md text-gray-500 dark:text-gray-400">Luas Kamar 12 meter persegi</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
