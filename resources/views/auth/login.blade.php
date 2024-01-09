@extends('layout.mainauth')
@section('isi')
<div class="flex h-screen bg-dark text-dark-700">
    <div class="ciba flex-1 flex items-center justify-center">
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 md:p-8 dark:bg-dark dark:border-gray-700">
            <form class="space-y-6" action="{{route('login')}}" method="POST">
                @csrf
                <h5 class="text-2xl font-extrabold text-gray-900 dark:text-dark text-center mb-4">Login</h5>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-900 dark:text-dark mb-2">Email</label>
                    <div class="relative">
                        <input type="email" name="email" id="email" class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10" placeholder="YourEmail@gmail.com">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg class="h-6 w-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-900 dark:text-dark mb-2">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="••••••••" class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pl-10">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg class="h-6 w-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="flex items-start mb-2">
                    <a href="{{ url('/forgotpassword') }}" class="text-sm text-blue-700 hover:underline dark:text-blue-500">Lupa Password?</a>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-md transition-colors duration-300 ease-in-out dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300 mt-2">
                    Belum register? <a href="{{ url('/register') }}" class="text-blue-700 hover:underline dark:text-blue-500">Buat Akun</a>
                </div>
            </form>
        </div>
    </div>
    <div class="coba flex-1">
        <img src="{{ asset('foto/login1.jpg') }}" alt="" class="object-cover w-full h-full">
    </div>
</div>
@endsection
