@extends('layout.mainowner')
@extends('layout.sidebar_owner')

@section('owner')
    <a href="{{route('owner.kamar.tambah.detail', $kos)}}"
        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        +
    </a>

    @foreach ($kamars as $item)
    <div class="flex flex-col p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        {{$item->nomor_kamar}}
        {{$item->fasilitas}}
        {{$item->kamar_mandi}}
        @php
            $fotos = json_decode($item->foto_kamar);
        @endphp
        @foreach ($fotos as $foto)
        <img src="{{asset('kamar/' . $foto)}}" alt="">
        @endforeach
    </div>
    @endforeach
@endsection
