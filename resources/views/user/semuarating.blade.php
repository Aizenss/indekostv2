@extends('layout.main')

@extends('layout.sidenavbar')

@section('isi')
    <div class="py-10 px-[140px] mt-20">
        @foreach ($ulasans as $ulasan)
            <div class="py-3 px-5 rounded-lg mb-5">
                <div class="flex gap-4">
                    <div class="profile">
                        <img src="{{ asset('profiles/' . $ulasan->user->foto) }}" alt="" width="100" class="rounded-full">
                    </div>
                    <div class="Informasinya flex-grow">
                        <div class="flex justify-between">
                            <div>
                                <h1 class="text-2xl font-semibold text-gray-900">{{ $ulasan->user->name }}</h1>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10s10-4.477 10-10M12 6.25a.75.75 0 0 1 .75.75v6a.75.75 0 0 1-1.5 0V7a.75.75 0 0 1 .75-.75M12 17a1 1 0 1 0 0-2a1 1 0 0 0 0 2" clip-rule="evenodd"/></svg>


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
                            <div class="text-xs">
                                {{ \Carbon\Carbon::parse($ulasan->created_at)->isoformat('dddd, D-MMMM-YYYY') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
