@extends('layout.mainauth')
@section('isi')
    <style>
        body {
            background-color: #ffffff;
        }
    </style>
    <div class="grid grid-cols-1 md:grid-cols-2 items-center">
        <div class="formnya bg-white flex justify-center items-center h-screen">
            <div class="flex flex-col gap-3">
                <form class="mx-auto bg-[#86A789] rounded-xl py-5 px-12 border border-white shadow-lg" method="POST"
                    action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="text-2xl font-extrabold text-white text-center mb-5">Register Pemilik Kost</h5>
                    <input type="text" class="hidden" name="role" value="owner">
                    <div class="mb-1">
                        <label for="name" class="block text-sm font-medium text-white mb-2">Nama</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4F6F52] focus:border-[#4F6F52] block w-full p-2.5 "
                            placeholder="User">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="email" class="block text-sm font-medium text-white mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4F6F52] focus:border-[#4F6F52] block w-full p-2.5 "
                            placeholder="user@gmail.com">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="password" class="block text-sm font-medium text-white mb-2">Sandi</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" value="{{ old('password') }}"
                            class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4F6F52] focus:border-[#4F6F52] block w-full p-2.5 ">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-1">
                        <label for="password_confirmation" class="block text-sm font-medium text-white mb-2">Konfirmasi
                            Kata Sandi</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                            placeholder="••••••••"
                            class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4F6F52] focus:border-[#4F6F52] block w-full p-2.5 ">
                        @error('password_confirmation')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="text" value="owner" name="role" hidden>
                    <button type="submit"
                        class="w-full mt-5 text-white bg-[#4F6F52] hover:bg-[#384F3A] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-md transition-colors duration-300 ease-in-out">Daftar</button>
                    <div class="text-sm font-medium text-white mt-2">
                        Sudah punya akun? <a href="{{ url('/login') }}" class="text-[#2a3a2b] hover:underline ">Masuk</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="fotoo flex justify-between items-center bg-[#87A789] pe-14 md:h-screen">
            <img src="{{ asset('ilustrasi/signowner.png') }}" alt=""
                class="hidden md:w-[530px] md:h-[530px] md:block">
        </div>
    </div>
@endsection
