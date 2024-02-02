@extends('layout.mainedit')

@section('isi')
<div class="py-10 px-10 bg-gray-50">
        <div class="flex justify-between items-center mx-4">
            <div class="text">
                <h1 class="text-3xl font-semibold mx-4 text-gray-900">Informasi Akun</h1>
            </div>
            <div class="button">
                <a @if (Auth::user()->role == 'user')
                    href="/"
                @elseif(Auth::user()->role == 'owner')
                    href="{{ route('owner.dashboard') }}"
                @else
                    href="{{ route('admin.dashboard') }}"
                @endif class="text-base font-medium bg-green-700 py-2 px-2 rounded-md text-white hover:bg-green-800 duration-300">
                    Kembali
                </a>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 ">
            <div class="bg-white p-3 rounded-lg shadow-md mt-6 ml-4">
                <div
                    class=" mt-8 p-3 relative w-full cursor-pointer h-40 mx-auto overflow-hidden flex justify-center items-center">
                    <div class="pp ">
                        <img src="{{ asset('profiles/' . Auth::user()->foto) }}" alt="Profile"
                            class="w-40 h-40 rounded-full object-cover">
                    </div>
                    <div class="absolute top-0 right-0 p-2 cursor-pointer">
                        <form id="foto" action="{{ route('profile.foto.upload') }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <label for="fileInput">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256"
                                    class="-ms-24 text-green-400">
                                    <path fill="currentColor"
                                        d="m232.49 55.51l-32-32a12 12 0 0 0-17 0l-96 96A12 12 0 0 0 84 128v32a12 12 0 0 0 12 12h32a12 12 0 0 0 8.49-3.51l96-96a12 12 0 0 0 0-16.98M192 49l15 15l-11 11l-15-15Zm-69 99h-15v-15l56-56l15 15Zm105-15.43V208a20 20 0 0 1-20 20H48a20 20 0 0 1-20-20V48a20 20 0 0 1 20-20h75.43a12 12 0 0 1 0 24H52v152h152v-71.43a12 12 0 0 1 24 0" />
                                </svg>
                            </label>
                            <input type="file" name="foto" id="fileInput" class="hidden">
                        </form>
                        <script>
                            document.getElementById('fileInput').addEventListener('change', function() {
                                document.getElementById('foto').submit();
                            });
                        </script>
                    </div>
                </div>


                <!-- User Information -->
                <div class="p-3 mt-4 text-center"> <!-- Adjusted margin-top to mt-6 -->
                    <h2 class="text-2xl font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-600">{{ Auth::user()->email }}</p>
                </div>
                {{-- <div class="p-3 mt-0 text-center"> <!-- Adjusted margin-top to mt-6 -->
                        <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Ganti</button>
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Upload</button>
                    </div> --}}
            </div>

            <div class=" col-span-2 bg-white rounded-md mt-6 px-[30px] py-[30px] shadow-md mr-4">
                <form method="post" action="{{ route('profile.update') }}">
                    @method('patch')
                    @csrf
                    <div class="mb-2 mt-6">
                        <div class="grid grid-cols-3">
                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                            <input type="text" id="nama" value="{{ Auth::user()->name }}" name="name"
                                class="col-span-2 bg-green-100 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="nama mu" >
                                @error('nama')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                 @enderror
                        </div>
                    </div>
                    <div class="mb-2 mt-6">
                        <div class="grid grid-cols-3">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="email" id="email" value="{{ Auth::user()->email }}" name="email"
                                class="col-span-2 bg-green-100 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="emailmu@gmail.com" >
                                @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                 @enderror
                        </div>
                    </div>
                    <div class="mb-2 mt-6">
                        <div class="grid grid-cols-3">
                            <label for="number" class="block mb-2 text-sm font-medium text-gray-900">Nomor
                                Handphone</label>
                            <input type="number" id="number" value="{{ Auth::user()->no_telp }}" name="no_telp"
                                class="col-span-2 bg-green-100 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                placeholder="08*********" >
                                @error('no_telp')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button
                            type="submit"class="mt-4  ml-2 mr-2 text-white bg-green-700 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="p-4 col-span-2 bg-white rounded-md  mt-4 shadow-md md:mr-4 md:ml-4">
            <h5 class="text-lg font-semibold text-gray-800 mb-4 text-center">Ubah Password</h5>
            <form method="post" action="{{ route('profile.password.update') }}">
                @method('patch')
                @csrf
                <div class="mb-2 mt-4">
                    <div class="grid grid-cols-3">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Password Lama</label>
                        <input type="password" id="nama" name="old_password" value="{{ old('old_password') }}"
                            class="col-span-2 bg-green-100 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Password lama" >
                            @error('old_password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 mt-4">
                    <div class="grid grid-cols-3">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Password Baru</label>
                        <input type="password" id="email" name="new_password"  value="{{ old('new_password') }}"
                            class="col-span-2 bg-green-100 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="password" >
                            @error('new_password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-2 mt-4">
                    <div class="grid grid-cols-3">
                        <label for="number" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi
                            Password</label>
                        <input type="password" id="number" name="new_password_confirm" value="{{ old('new_password_confirm') }}"
                            class="col-span-2 bg-green-100 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            placeholder="Masukan password baru" >
                            @error('new_password_confirm')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end">
                    <button
                        type="submit"class="mt-4  ml-2 mr-2 text-white  bg-green-700 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
