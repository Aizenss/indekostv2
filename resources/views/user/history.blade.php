@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 py-12">
        @foreach ($historys as $history)
            <div class="bg-white rounded-lg shadow-lg duration-300 hover:shadow-gray-500">
                @foreach (json_decode($history->kamar->foto_kamar) ?? [] as $foto)
                    <img class="rounded-t-lg" src="{{ asset('kamar/' . $foto) }}" height="50" alt="" />
                @endforeach
                <div class="p-5 ">
                    <div class="grid grid-cols-3 gap-2 items-center">
                        <div class="judul col-span-2">
                            <h5 class="mb-2 text-lg font-bold overflow-x-scroll sc-sm text-gray-900">
                                {{ $history->kamar->nama_kamar }}
                            </h5>
                        </div>
                        <div class="orang text-end">
                            <h5 class="mb-2 text-base font-semibold truncate text-gray-900"><i
                                    class="fa-solid fa-users me-2"></i>2</h5>
                        </div>
                    </div>
                    <span class="text-base font-semibold text-gray-900 text-start">Fasilitas</span>
                    <style>
                        .sc-sm::-webkit-scrollbar {
                            width: 3px;
                        }
                    </style>
                    <div class="grid grid-cols-2 gap-3 my-2 text-center overflow-y-scroll sc-sm max-h-14">
                        @foreach (json_decode($history->kamar->fasilitas) ?? [] as $fasilitas)
                            <div class="fsnya">
                                <span class="text-sm text-gray-700 font-medium"><i
                                        class="fa-solid fa-check me-2"></i>{{ $fasilitas->value }}</span>
                            </div>
                        @endforeach
                    </div>
                    <span class="text-base font-semibold text-gray-900 text-start">Peraturan Kamar</span>
                    <div class="overflow-y-scroll sc-sm max-h-16">
                        <p class="text-sm font-medium text-gray-900">Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Sit accusantium at illum officiis voluptatibus consequatur velit ex ullam aspernatur
                            nihil, pariatur nam laudantium, veniam, sequi animi vel! Quaerat esse corporis officiis cum eum
                            autem, debitis modi iste iusto, maiores libero quis consequatur sunt porro? Doloribus commodi
                            fugiat autem assumenda quasi!</p>
                    </div>
                    <div class="my-3">
                        <span
                            class="text-xl font-bold text-gray-700">{{ $history->kamar->harga }}/{{ $history->kamar->night }}Bulan</span>
                    </div>
                    <div class="flex justify-between">

                        <p>checkin{{ $history->checkin }}</p>
                        <p>checkout{{ $history->checkout }}</p>
                        <span>Durasi: {{ Carbon\Carbon::parse($history->checkin)->diffInDays(Carbon\Carbon::parse($history->checkout)) }} hari</span>

                        {{-- <button class="bg-[#4F6F52] border border-[#4F6F52] hover:bg-[#384f3a] py-2 px-5 rounded-lg duration-300">
                        <span class="text-base font-medium text-white"><i class="fa-solid fa-square-check me-2"></i>Nyala</span>
                    </button> --}}
                        <button
                            class="bg-[#B03E3E] border border-[#B03E3E] hover:bg-[#983636] py-2 px-5 rounded-lg duration-300">
                            <span class="text-base font-medium text-white"><i
                                    class="fa-solid fa-square-xmark me-2"></i>Mati</span>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
