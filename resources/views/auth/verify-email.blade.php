@extends('layout.mainauth')

@section('isi')
  <div class="relative flex justify-center items-center h-screen">
    <div class="absolute inset-0 bg-[url('foto/background.jpg')] bg-cover bg-center brightness-50"></div>

    <div class="relative block max-w-xl max-h-100 p-6 bg-[#739072] border border-gray-200 rounded-lg shadow text-center">
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <div class="justify-center">
          <div class="flex items-center justify-center mb-1">
            <img src="{{ asset('foto/inilogo.png') }}" alt="" width="150" class="mb-2">
          </div>

          <h3 class="mb-6 text-3xl font-xl text-gray-50 ">Resend Mail</h3>
          <p class="text-white mb-6 text-sm mr-10 ml-10">Kami telah mengirimkan email verifikasi sebelumnya untuk
            menyelesaikan registrasi Anda. Silakan periksa folder Spam jika tidak ditemukan. Klik "resend mail" dibawah
            ini untuk mengirim ulang email verifikasi Anda.</p>
        </div>
        <div class="flex justify-between mt-4 mr-10 ml-10">
          <a href="#"
            class="text-dark bg-[#D2E3C8] hover:bg-[#A0D084] focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        {{ __('Kembali') }}
          </a>
          <form action="{{ route('verification.send') }}" method="POST">
            @csrf
          <button type="submit"
            class="text-white bg-[#38543B] hover:bg-[#A0D084] focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            {{ __('Resend mail') }}
          </button>
        </form>
        </div>
      </form>

    </div>
  </div>
@endsection
