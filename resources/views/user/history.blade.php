@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 py-12">
        @foreach ($historys as $history)
            <div class="border p-4">
                {{$history}}
                <a href="{{route('history.detail', ['kamar' => $history->kamar->id])}}">see detail</a>
            </div>
        @endforeach
    </div>
@endsection
