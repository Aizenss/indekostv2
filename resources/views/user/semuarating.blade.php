@extends('layout.main')

@extends('layout.sidenavbar')

@section('isi')
  <div class="py-5 px-[90px] mt-20 flex justify-between">
    <div class="flex text-green-500 items-center justify-end">
        <button>
            <a href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                    <path fill="currentColor" d="m7.825 13l5.6 5.6L12 20l-8-8l8-8l1.425 1.4l-5.6 5.6H20v2z" />
                </svg>
            </a>
        </button>


    </div>
    <diV type="button">
        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="flex text-green-500 items-center justify-start cursor-pointer" type="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M11 20q-.425 0-.712-.288T10 19v-6L4.2 5.6q-.375-.5-.112-1.05T5 4h14q.65 0 .913.55T19.8 5.6L14 13v6q0 .425-.288.713T13 20z" />
            </svg>
          </button>

    </diV>
  </div>
{{-- Modal --}}
    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow ">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 ">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 text-center ">Filter Rating</h3>
                    <div style="display: flex; align-items: flex-start;">
                        <img src="{{ asset('asset/login/loginn.png') }}" alt="" class="w-24 h-24 mb-5 mr-2">
                        <h1 class="font-black text-md">Lorem ipsum dolor, sit amet consectetur adipisicing elit</h1>
                    </div>
                    <hr class="mb-3">
                    {{-- <h5 class="">Bintang</h5> --}}
                    <div class="rating mb-3 flex flex-col space-y-2 ">
                        <div>
                            <input type="radio" id="star5" name="rating" value="5" hidden>
                            <label for="star5">
                                <i class="far fa-star fa-lg "></i>
                                <i class="far fa-star fa-lg "></i>
                                <i class="far fa-star fa-lg "></i>
                                <i class="far fa-star fa-lg "></i>
                                <i class="far fa-star fa-lg "></i>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="star4" name="rating" value="4" hidden>
                            <label for="star4">
                                <i class="far fa-star fa-lg "></i>
                                <i class="far fa-star fa-lg "></i>
                                <i class="far fa-star fa-lg "></i>
                                <i class="far fa-star fa-lg "></i>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="star3" name="rating" value="3" hidden>
                            <label for="star3">
                                <i class="far fa-star fa-lg "></i>
                                <i class="far fa-star fa-lg "></i>
                                <i class="far fa-star fa-lg "></i>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="star2" name="rating" value="2" hidden>
                            <label for="star2">
                                <i class="far fa-star fa-lg "></i>
                                <i class="far fa-star fa-lg "></i>
                            </label>
                        </div>

                        <div>
                            <input type="radio" id="star1" name="rating" value="1" hidden>
                            <label for="star1">
                                <i class="far fa-star fa-lg "></i>
                            </label>
                        </div>
                    </div>


                   <div class="text-center">
                    <button data-modal-hide="popup-modal" type="button" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10  ">Kembali</button>
                    <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                       Ok
                    </button>
                   </div>
                </div>
            </div>
        </div>
    </div>

{{-- Akhir Modal --}}
  <div class="py-3 px-[90px] mt-3">

    @foreach ($ulasans as $ulasan)
      <div class="py-3 px-15 rounded-lg mb-5">
        <div class="flex gap-4">
          <div class="profile">
            <img src="{{ asset('profiles/' . $ulasan->user->foto) }}" alt="" width="50" class="rounded-full">
          </div>
          <div class="Informasinya flex-grow">
            <div class="flex justify-between">
              <div>
                <h1 class="text-2xl font-semibold text-gray-900">{{ $ulasan->user->name }}</h1>
              </div>
              <div class="text-xs">
                {{ \Carbon\Carbon::parse($ulasan->created_at)->isoformat('dddd, D-MMMM-YYYY') }}
              </div>
            </div>

            <div class="flex items-center"> <!-- Updated this line -->
              <p class="text-balance rounded-md py-2 px-2 text-sm">{{ $ulasan->ulasan }}</p>

            </div>

            <div class="flex">
              @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $ulasan->rating)
                  <span>⭐</span>
                @else
                  <span></span>
                @endif
              @endfor
            </div>


          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
