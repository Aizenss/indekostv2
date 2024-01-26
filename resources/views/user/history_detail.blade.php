@extends('layout.main')

@extends('layout.sidenavbar')

@section('isi')
    <div class="py-20">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-2">
            <table class="w-full text-sm text-gray-500 text-center">
                <h1 class="text-start ms-5 mb-3 text-lg">Detail Penyewaan</h1>
                <thead class="text-xs text-gray-700  uppercase bg-[#D2E3C8]">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Kamar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Check-in
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Check-out
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Durasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tracking as $track)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $track->kamar->nama_kamar }}
                            </th>
                            {{-- {{$track}} --}}
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($track->checkin)->isoformat('dddd, D MMMM Y') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($track->checkout)->isoformat('dddd, D MMMM Y') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($track->checkout), false) }}
                                Hari
                            </td>
                            <td class="px-6 py-4">
                                @if (\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($track->checkout), false) === 0)
                                    terimakasih telah menyewa kos ini, silahkan lihat lihat kos kembali
                                @else
                                    <form action="{{ route('history.detail.pay', ['kamar' => $kamar]) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                                            Ajuka n Sewa Lagi
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
