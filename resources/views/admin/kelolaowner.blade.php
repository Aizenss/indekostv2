@extends('layout.main')

@extends('layout.sidebar')

@section('isi')
    <div class="py-20 px-10 sm:ml-64">
        <h1 class="mb-4 mt-4 ml-4 text-3xl font-black text-gray-900">Kelola Owner</h1>
        <div class="grid grid-cols-4 gap-4 mx-auto">
            @foreach ($owners as $owner)
                <div class="ml-4 mr-4 bg-gray-200 p-4 text-center w-full max-w-72 border border-gray-200 rounded-lg shadow">
                    <div class="flex flex-col items-center pb-3">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                            src="{{ asset('asset/images/default/default.png') }}" alt="Bonnie image" />
                        <h5 class="mb-1 text-2xl font-semibold text-gray-900 truncate">{{ $owner->name }}</h5>
                        <span class="text-sm text-gray-500 truncate">{{ $owner->email }}</span>
                        <div class="flex mt-4 md:mt-6 gap-2">
                            <a href="{{ route('kelolaowner.delete', ['owner' => $owner->id]) }}"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 me-2 mb-2 ">Hapus</a>
                            <a href="#" data-modal-target="popup-modal{{ $owner->id }}"
                                data-modal-toggle="popup-modal{{ $owner->id }}"
                                class="inline-flex items-center font-medium text-center text-white bg-[#4F6F52] focus:ring-4 focus:ring-gray-300 rounded-lg text-sm px-3 py-1.5 me-2 mb-2"
                                role="button">
                                Info
                            </a>

                        </div>
                        <div id="popup-modal{{ $owner->id }}" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50  items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <input type="hidden" name="owner" value="{{ $owner->id }}">
                                <div class="relative bg-white rounded-lg shadow py-6">
                                    <button type="button"
                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                        data-modal-hide="popup-modal{{ $owner->id }}">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="flex items-center justify-center ">
                                        <img class="w-24 h-24 mt-8 mb-4  rounded-full shadow-lg"
                                            src="{{ asset('asset/images/default/default.png') }}" alt="Profil" />
                                        <div class="ml-4">
                                            <h1 class="text-3xl font-semibold  text-gray-900 mr-4 truncate">
                                                {{ $owner->name }}</h1>
                                            <h5 class="text-gray-500 text-base font-semibold truncate">{{ $owner->email }}
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="flex flex-col ms-20 gap-4">
                                        <div class="kost flex items-center">
                                            <div
                                                class="bg-[#4F6F52] p-2 w-10 h-10 me-4 flex items-center justify-center text-lg rounded">
                                                <i class="fa-solid fa-house text-white"></i>
                                            </div>
                                            <span class="font-semibold text-lg text-gray-900 truncate">Memiliki
                                                {{ $owner->kos->count() }} Tempat
                                                Kost</span>
                                        </div>
                                        <div class="kost flex items-center">
                                            @php
                                                $totalKamarCount = 0;
                                            @endphp
                                            @foreach ($owner->kos as $kos)
                                                @php
                                                    $totalKamarCount += $kos->kamar->count();
                                                @endphp
                                            @endforeach
                                            <div
                                                class="bg-[#4F6F52] p-2 w-10 h-10 me-4 flex items-center justify-center text-lg rounded">
                                                <i class="fa-solid fa-house text-white"></i>
                                            </div>
                                            <span class="font-semibold text-lg text-gray-900 truncate">Memiliki
                                                {{ $totalKamarCount }}
                                                Kamar</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
