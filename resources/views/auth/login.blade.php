@extends('layout.mainauth')
@section('isi')
    <div class="flex h-screen bg-dark text-dark-700">
        <div class="ciba flex-1 flex items-center justify-center  bg-[#86A789]">
            <div class="w-full max-w-sm p-4 border border-gray-200 backdrop-blur-sm rounded-lg shadow-2xl sm:p-6 md:p-8 ">
                <form class="space-y-3" action="{{ route('login') }}" method="POST">
                    @csrf
                    <h5 class="text-2xl font-extrabold text-[#fff] text-center mb-4">Login</h5>
                    <div class="mb-2">
                        <label for="email" class="block text-sm font-medium text-white  mb-2">Email</label>
                        <div class="relative">
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 font-thin"
                                placeholder="Contoh@gmail.com" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="block text-sm font-medium text-white  mb-2">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="••••••••" value="{{ old('password') }}"
                                class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 font-thin block w-full p-2.5 ">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-[#4F6F52] hover:bg-[#3e5741] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-md transition-colors duration-300 ease-in-out ">Masuk</button>
                    <div class="flex justify-between mb-2">
                        <a href="{{ route('password.request') }}"
                            class="text-sm font-medium text-white hover:underline ">Lupa Password?</a>
                        <div class="text-sm font-medium text-gray-50"><a href="{{ route('flowas') }}"
                                class="text-[#3c4d3b] hover:underline ">Buat Akun</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <div class="coba flex-1">
            <img src="{{ asset('asset/login/loginn.png') }}" alt="" class="object-cover w-full h-full">
        </div>
    </div>
@endsection
