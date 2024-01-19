@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 py-12">
        {{$kamar}}

        <form action="{{route('history.detail.pay', ['kamar' => $kamar])}}" method="POST">
            @csrf
            <button type="submit">ajukan sewa lagi</button>
        </form>
    </div>
@endsection
