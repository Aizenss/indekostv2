@extends('layout.mainauth')
@section('isi')
<div class="flex h-screen bg-dark text-dark-700">
    <div class="ciba flex-1 flex items-center justify-center">
        <div class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 md:p-8 dark:bg-dark dark:border-gray-700">
            <form class="space-y-1 mx-auto" action="#">
                <h5 class="text-2xl font-extrabold text-gray-900 dark:text-dark text-center mb-4">Register</h5>

                <form class="max-w-lg mx-auto">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-dark" for="user_avatar">Upload file</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none "
                        aria-describedby="user_avatar_help" id="user_avatar" type="file">
                </form>
                <br>
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-900 dark:text-dark mb-2">Username</label>
                    <input type="text" name="name" id="name" pattern="[0-9]{10,15}"
                        class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="ur username">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-900 dark:text-dark mb-2">Email</label>
                    <input type="email" name="email" id="email"
                        class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        placeholder="user@gmail.com">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-900 dark:text-dark mb-2">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>
                <div class="mb-4">
                    <label for="confirm_password" class="block text-sm font-medium text-gray-900 dark:text-dark mb-2">Konfirmasi
                        Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="••••••••"
                        class="shadow-md bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        required>
                </div>
                <br>
                <button type="submit"
                    class="w-full text-dark bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-md transition-colors duration-300 ease-in-out dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300 mt-2">
                    Sudah punya akun? <a href="{{ url('/login') }}" class="text-blue-700 hover:underline dark:text-blue-500">Masuk</a>
                </div>
            </form>
        </div>
    </div>
    <div class="coba flex-1">
        <img src="{{ asset('foto/login2.jpg') }}" alt="" class="object-cover w-full h-full">
    </div>
</div>
@endsection
