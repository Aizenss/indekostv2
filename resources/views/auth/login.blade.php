@extends('layout.mainauth')
@section('isi')
<div class="flex h-screen bg-dark text-dark-700">
    <div class="ciba flex-1 flex items-center justify-center  bg-[#86A789]">
        <div class="w-full max-w-sm p-4 border border-gray-200 rounded-lg shadow-2xl sm:p-6 md:p-8 ">
            <form class="space-y-6" action="{{route('login')}}" method="POST">
                @csrf
                <h5 class="text-2xl font-extrabold text-[#fff] text-center mb-4">Login</h5>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-white  mb-2">Email</label>
                    <div class="relative">
                        <input type="email" name="email" id="email" class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="YourEmail@gmail.com">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-white  mb-2">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="••••••••" class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                </div>
                <div class="flex items-start mb-2">
                    <a href="{{ url('/forgotpassword') }}" class="text-sm text-white hover:underline dark:text-blue-500">Lupa Password?</a>
                </div>
                <button type="submit" class="w-full text-white bg-[#4F6F52] hover:bg-[#000] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-md transition-colors duration-300 ease-in-out ">Masuk</button>
                <div class="text-sm font-medium text-gray-700">
                    Belum register? <a href="{{ url('/flowas') }}" class="text-white hover:underline ">Buat Akun</a>
                </div>
            </form>
        </div>
    </div>
    <div class="coba flex-1">
        <img src="{{ asset('asset/login/loginn.png') }}" alt="" class="object-cover w-full h-full">
    </div>
</div>
@endsection
