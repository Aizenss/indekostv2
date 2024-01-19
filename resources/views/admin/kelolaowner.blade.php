@extends('layout.main')

@extends('layout.sidebar_admin')

@section('isi')
    <div class="sm:ml-64">
        <h1 class="mb-4 mt-4 ml-4  text-3xl font-black text-gray-900 dark:text-white">Kelola Owner</h1>
        <br>
    </div>
    <div class="sm:ml-64 grid grid-cols-3 gap-4">
        @foreach ($owners as $owner)
        <div
            class=" ml-6 bg-gray-200 p-4 text-center w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-col items-center pb-10">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('asset/images/default/default.png') }}"
                        alt="Bonnie image" />
                    <br>
                    <h5 class="mb-1 text-2xl font-semibold text-gray-900 dark:text-white">{{ $owner->name }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $owner->email }}</span>
                    <div class="flex mt-4 md:mt-6">
                        <a href="{{ route('kelolaowner.delete', ['owner' => $owner->id]) }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white  bg-[#4F6F52] rounded-lg hover:bg[#000] focus:ring-4 focus:outline-none focus:ring-blue-300 ">Hapus</a>
                        {{-- <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">Message</a> --}}
                    </div>
                </div>
            </div>
            @endforeach
    </div>
    <br><br><br>
@endsection
