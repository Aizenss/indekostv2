@extends('layout.main')

@extends('layout.sidenavbar')

@section('isi')
    <div class="py-10 px-[90px] px-[90px] mt-20">
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

                        <div class="flex">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $ulasan->rating)
                                    <span>⭐</span>
                                @else
                                    <span></span>
                                @endif
                            @endfor
                        </div>
                        <p class="text-balance rounded-md py-2 px-2 text-sm">{{ $ulasan->ulasan }}</p>
                        <div class="flex items-center justify-end">

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
