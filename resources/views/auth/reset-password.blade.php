@extends('layout.mainauth')

@section('isi')
    <div class="relative flex justify-center items-center h-screen">
        <div class="absolute inset-0 bg-[url('foto/background.jpg')] bg-cover bg-center brightness-50"></div>

        <div class="relative block max-w-xl max-h-100 p-6 bg-[#739072] border border-gray-200 rounded-lg shadow">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="justify-center">
                    <div class="flex items-center justify-center mb-1">
                        <img src="{{ asset('foto/inilogo.png') }}" alt="" width="150" class="mb-2">
                    </div>

                    <h3 class="mb-6 text-3xl font-xl text-gray-50 text-center">Buat Password Baru</h3>
                    <p class="text-white mb-6 text-sm mr-10 ml-10">Pastikan untuk menyimpan kata sandi baru Anda dengan aman dan tidak memberikannya kepada orang lain.</p>
                </div>
                {{-- <label for="email-address-icon" class=
                "block mb-2 text-sm font-medium text-gray-50 ">E-mail</label> --}}
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    </div>
                    <label for="password" class="text-white mb-10 ml-10">Password</label>
                    <input type="password" id="password" name="password"
                        class="mx-auto mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-10/12"
                        placeholder="****************">

                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    </div>
                    <label for="confirmPassword" class="text-white mb-10 ml-10">Konfirmasi Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword"
                        class="mx-auto mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-10/12"
                        placeholder="****************">
                </div>


                <div class="text-center mt-4 ">
                    <button type="submit"
                        class="text-white bg-[#38543B] hover:bg-[#A0D084] focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        {{ __('Simpan') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
