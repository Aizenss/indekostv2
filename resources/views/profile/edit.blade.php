@extends('layout.main')

@if (Auth::user()->role == 'user')
  @extends('layout.sidebar_user')
@elseif (Auth::user()->role == 'owner')
  @extends('layout.sidebar_owner')
@else
  @extends('layout.sidebar_admin')
@endif

@section('isi')
  <div class="sm:ml-64 bg-[#E8F1E3]">
    <div class="grid grid-cols-3 gap-5 ">
                <div class="bg-white p-3 rounded-lg shadow-md mt-6 ml-4">
                    <!-- Profile Image -->
                    <div class="p-3 relative w-40 h-40 mx-auto border-4 border-white rounded-full overflow-hidden ">
                        <img src="{{ asset('foto/dummy.jpeg') }}" alt="Profile" class="w-full rounded-full object-cover">
                    </div>

                    <!-- User Information -->
                    <div class="p-3 mt-0 text-center"> <!-- Adjusted margin-top to mt-6 -->
                        <h2 class="text-2xl font-semibold text-gray-800">Nama Pengguna</h2>
                        <p class="text-gray-600">user@gmail.com</p>
                    </div>
                    <div class="p-3 mt-0 text-center"> <!-- Adjusted margin-top to mt-6 -->
                        <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Ganti</button>
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Upload</button>
                    </div>
                </div>

      <div class=" col-span-2 bg-white rounded-md mt-6 px-[30px] py-[30px] shadow-md mr-4">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
          @csrf
          <div class="mb-2 mt-6">
            <div class="grid grid-cols-3">
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
            <input type="nama" id="nama"
              class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
              placeholder="nama mu" required>
          </div>
        </div>
          <div class="mb-2 mt-6">
            <div class="grid grid-cols-3">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email"
              class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
              placeholder="emailmu@gmail.com" required>
          </div>
          </div>
          <div class="mb-2 mt-6">
            <div class="grid grid-cols-3">
            <label for="number" class="block mb-2 text-sm font-medium text-gray-900">Nomor
              Handphone</label>
            <input type="number" id="number"
              class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
              placeholder="08*********" required>
            </div>
          </div>
          <div class="flex justify-end">
            <button type="submit"class="mt-4  ml-2 mr-2 text-white bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Simpan</button>
          </div>
        </form>
      </div>
    </div>
    <div class="p-4 col-span-2 bg-white rounded-md  mt-4 shadow-md mr-4 ml-4">
        <h5 class="text-lg font-semibold text-gray-800 mb-4 text-center mb-5">Ubah Password</h5>
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
          @csrf
          <div class="mb-2 mt-4">
            <div class="grid grid-cols-3">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Password Lama</label>
                <input type="nama" id="nama"
                  class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                  placeholder="nama mu" required>
            </div>
          </div>
          <div class="mb-2 mt-4">
            <div class="grid grid-cols-3">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Password Baru</label>
            <input type="email" id="email"
              class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
              placeholder="emailmu@gmail.com" required>
          </div>
        </div>
          <div class="mb-2 mt-4">
            <div class="grid grid-cols-3">
            <label for="number" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi Password</label>
            <input type="number" id="number"
              class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
              placeholder="08*********" required>
            </div>
          </div>
          <div class="flex justify-end">
            <button type="submit"class="mt-4  ml-2 mr-2 text-white bg-blue-600 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Simpan</button>
          </div>
        </form>
      </div>
  </div>
</div>

  </div>
@endsection
