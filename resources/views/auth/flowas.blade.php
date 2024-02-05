@extends('layout.mainauth')

@section('isi')
<style>
    body{
        background-color: #D9D9D9;
    }
</style>
        <div class="flex flex-col gap-10 h-full w-full justify-center items-center md:mt-[5%] p-10">
            <div class="judul">
                <h1 class="font-semibold text-xl text-[#252525]">Tampil sebagai siapa Anda saat mendaftar?</h1>
            </div>
            <div class="grid md:grid-cols-2 grid-cols-1 gap-12">
                <a href="/register-user" class="flex flex-col gap-3 bg-[#4F6F52] hover:bg-[#3B523D] hover:shadow-2xl duration-300 text-center items-center py-[40px] px-[60px] rounded-xl">
                    <img src="{{ asset('foto/user.png') }}" alt="" class="w-[120px]">
                    <span class="font-semibold text-xl text-white">Pencari Kost</span class="font-semibold text-xl text-white">
                </a>
                <a href="/register" class="flex flex-col gap-3 bg-[#4F6F52] hover:bg-[#3B523D] hover:shadow-2xl duration-300 text-center items-center py-[40px] px-[60px] rounded-xl">
                    <img src="{{ asset('foto/owner.png') }}" alt="" class="w-[120px]">
                    <span class="font-semibold text-xl text-white">Pemilik Kost</span class="font-semibold text-xl text-white">
                </a>
            </div>
            <a href="/" class="bg-[#4F6F52] hover:bg-[#3B523D] hover:shadow-2xl duration-300 py-3 px-7 text-xl font-semibold text-white rounded-xl">Kembali</a>
        </div>
@endsection