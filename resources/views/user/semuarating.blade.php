@extends('layout.main')

@extends('layout.sidenavbar')

@section('isi')
<div class="sm:ml-64 py-5 px-[20px]">
    @foreach ($ulasans as $ulasan)
    <div class="bg-gray-50 py-3 px-5 rounded-lg border border-white-900 shadow-md mb-5">
        <div class="flex gap-4">
            <div class="profile">
                <img src="{{ asset('profiles/' . $ulasan->user->foto) }}" alt="" width="100" class="rounded-full">
            </div>
            <div class="Informasinya">
                <h1 class="text-2xl font-semibold text-gray-900">{{ $ulasan->user->name }}</h1>
                <div class="flex">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $ulasan->rating)
                            <span>⭐</span>
                        @else
                            <span></span>
                        @endif
                    @endfor
                    <span class="ms-3">{{ \Carbon\Carbon::parse($ulasan->created_at)->isoformat('dddd, D-MMMM-YYYY') }}</span>
                </div>
                <p class="text-balance rounded-md py-2 px-2 text-sm">{{ $ulasan->ulasan }}</p>
            </div>
        </div>
    </div>
@endforeach

</div>
@endsection
