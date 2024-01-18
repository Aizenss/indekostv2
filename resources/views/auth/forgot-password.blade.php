@extends('layout.mainauth')

@section('isi')
    <div class="relative flex justify-center items-center h-screen">
        <div class="absolute inset-0 bg-[url('foto/background.jpg')] bg-cover bg-center brightness-50"></div>

        <div class="relative block max-w-xl max-h-100 p-6 bg-[#739072] border border-gray-200 rounded-lg shadow text-center">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="justify-center">
                    <div class="flex items-center justify-center mb-1">
                        <img src="{{ asset('foto/inilogo.png') }}" alt="" width="150" class="mb-2">
                    </div>

                    <h3 class="mb-6 text-3xl font-xl text-gray-50 ">Lupa Password</h3>
                    <p class="text-white mb-6 text-sm mr-10 ml-10">Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami
                        alamat
                        email Anda dan kami akan mengirimkan tautan pengaturan ulang kata sandi melalui email yang
                        memungkinkan Anda
                        memilih kata sandi baru.</p>
                </div>
                {{-- <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-50 ">E-mail</label> --}}
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    </div>
                    <input type="text" id="email-address-icon" name="email"
                        class="mx-auto mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-10/12  "
                        placeholder="emailmu@gmail.com">
                </div>

                <div class="flex justify-between mt-4 mr-10 ml-10">
                    <a href="{{ route('login') }}"
                        class="text-dark bg-[#D2E3C8] hover:bg-[#A0D084] focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        {{ __('Kembali') }}
                    </a>

                    <button type="submit"
                        class="text-white bg-[#38543B] hover:bg-[#A0D084] focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        {{ __('Send to Mail') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
