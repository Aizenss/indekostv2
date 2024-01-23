@extends('layout.main')

@extends('layout.sidebar_admin')

@section('isi')
  <div class="sm:ml-64">
    <h1 class="mb-8 mt-8 ml-8  text-3xl font-black text-gray-900 dark:text-white">Kelola Owner</h1>
    <br>
  </div>
  <div class="sm:ml-64 grid grid-cols-3 gap-4 mx-auto">
    @foreach ($owners as $owner)
      <div class="ml-4 mr-4 bg-gray-200 p-4 text-center w-full max-w-72 bg-white border border-gray-200 rounded-lg shadow">
        <div class="flex flex-col items-center pb-10">
          <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('asset/images/default/default.png') }}"
            alt="Bonnie image" />
          <h5 class="mb-1 text-2xl font-semibold text-gray-900 dark:text-white">{{ $owner->name }}</h5>
          <span class="text-sm text-gray-500 ">{{ $owner->email }}</span>
          <div class="flex mt-4 md:mt-6 gap-2">
            <a href="{{ route('kelolaowner.delete', ['owner' => $owner->id]) }}"
              class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 me-2 mb-2 ">Hapus</a>
            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
              class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white  bg-green-500 hover:bg[#000] focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 me-2 mb-2"
              type="button">
              Info
            </button>
          </div>



          <div id="popup-modal" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50  items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
              <div class="relative bg-white rounded-lg shadow ">
                <button type="button"
                  class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                  data-modal-hide="popup-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
                <div class="flex items-center justify-center ">
                  <img class="w-24 h-24 mt-8 mb-4  rounded-full shadow-lg"
                    src="{{ asset('asset/images/default/default.png') }}" alt="Bonnie image" />
                  <div class="ml-4">
                    <h1 class="text-lg font-semibold text-lg font-black text-gray-900 mr-4">{{ $owner->name }}</h1>
                    <h5>{{ $owner->email }}</h5>
                  </div>
                </div>
                <!-- Bagian tombol -->
                <div class="bawahnya flex flex-col items-center mt-4">
                    <h2 class="mb-4 font-bold">Informasi tentang owner</h2>
                    <div class="flex flex-col justify-start items-center gap-2">
                      <div class="inline-flex items-center gap-2">
                        <button class="px-4 py-2 text-sm font-medium text-white bg-green-900 hover:bg-[#000] focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 mb-2" type="button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M5 20V9.5l7-5.288L19 9.5V20h-5.192v-6.385h-3.616V20z" />
                          </svg>
                        </button>
                        <span>Memiliki 25 kos</span>
                      </div>
                      <div class="inline-flex items-center gap-2">
                        <button class="px-4 py-2 text-sm font-medium text-white bg-green-900 hover:bg-[#000] focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-1.5 mb-2" type="button">
                          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                            <path d="M168.7 264.5c29 0 52.4-22.9 52.4-51.2s-23.4-51.2-52.4-51.2-52.4 22.9-52.4 51.2 23.5 51.2 52.4 51.2zm209.5-102.4H238.5v119.5H98.9V128H64v256h34.9v-51.2h314.2V384H448V230.4c0-37.7-31.2-68.3-69.8-68.3z" fill="currentColor" />
                          </svg>
                        </button>
                        <span>Memiliki 300 kamar</span>
                      </div>
                    </div>
                    <br><br>
                  </div>




              </div>
            </div>
          </div>

        </div>
      </div>
    @endforeach
  </div>
  <br>
@endsection
