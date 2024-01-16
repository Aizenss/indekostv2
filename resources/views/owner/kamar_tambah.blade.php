@extends('layout.mainowner')
@extends('layout.sidebar_owner')

@section('owner')
  <div class="grid grid-cols-4 gap-4 mt-8 text-center">
    <div class="div">
        <a href="{{ route('owner.kamar.tambah.detail', $kos) }}"
      class="block p-6 bg-gray-200 border border-gray-200 rounded-lg shadow hover:bg-gray-100 h-96 w-56 text-center no-underline text-black transition relative">
      <svg class="text-gray-400 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" xmlns="http://www.w3.org/2000/svg" width="172" height="172" viewBox="0 0 24 24">
        <path fill="currentColor" d="M11 13H6q-.425 0-.712-.288T5 12q0-.425.288-.712T6 11h5V6q0-.425.288-.712T12 5q.425 0 .713.288T13 6v5h5q.425 0 .713.288T19 12q0 .425-.288.713T18 13h-5v5q0 .425-.288.713T12 19q-.425 0-.712-.288T11 18z"/>
      </svg>
    </a>
    </div>
    @foreach ($kamars as $item)
    <div class="block bg-gray-200 border border-gray-200 rounded-lg shadow hover:bg-gray-100 text-center no-underline text-black transition h-96 w-56">
      <img src="{{ asset('foto/header2.jpeg') }}" class="rounded-t-lg" alt="">
      <h5 class="font-bold text-2xl text-left ml-2"> {{$item->nomor_kamar}}</h5>
      <h5 class="font-bold text-lg text-left ml-2 text-gray-600">Fasilitas</h5>
      <div class="grid grid-cols-2 gap-2 text-center">
        <h6 class="flex items-center text-left text-gray-500 text-xs">
          <span class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="text-lime-700">
              <path fill="currentColor" d="m10 13.6l5.9-5.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-6.6 6.6q-.3.3-.7.3t-.7-.3l-2.6-2.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275z"/>
            </svg>
          </span>
          {{$item->fasilitas}}
        </h6>
        <h6 class="flex items-center text-left text-gray-500 text-xs">
          <span class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="text-lime-700">
              <path fill="currentColor" d="m10 13.6l5.9-5.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7l-6.6 6.6q-.3.3-.7.3t-.7-.3l-2.6-2.6q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275z"/>
            </svg>
          </span>
          {{$item->fasilitas}}
        </h6>
      </div>
      <h5 class="font-bold text-lg text-left ml-2 text-gray-600">Peraturan Kamar</h5>
      <p class="text-left text-xs flex items-center ml-2">    {{$item->kamar_mandi}}..</p>
      <div class="p-3 mt-0 text-center flex justify-between">
        <button type="button" class="flex items-center text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-1 me-2 mb-2">
          <span class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
              <path fill="currentColor" fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10s10-4.477 10-10M12 6.25a.75.75 0 0 1 .75.75v6a.75.75 0 0 1-1.5 0V7a.75.75 0 0 1 .75-.75M12 17a1 1 0 1 0 0-2a1 1 0 0 0 0 2" clip-rule="evenodd"/>
            </svg>
          </span>
          Aksi
        </button>

        <button type="button" class="flex items-center text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 me-2 mb-2">
          <span class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
              <path fill="currentColor" d="M19 19H5V5h10V3H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-8h-2m-11.09-.92L6.5 11.5L11 16L21 6l-1.41-1.42L11 13.17z"/>
            </svg>
          </span>
          Aktif
        </button>
      </div>
    </div>
  </div>
@endforeach

@endsection



