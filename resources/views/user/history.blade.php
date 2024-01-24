@extends('layout.main')

@extends('layout.sidenavbar')

@section('isi')
    <div class="py-20">
        <div class="p-6 my-2">
            <h2 class="text-xl font-semibold mb-4">Riwayat Penyewaan</h2>

            <div class="ml-8 mr-8 relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
                <table class="w-full text-sm text-left rtl:text-right text-white">
                    <thead class="text-xs text-white uppercase bg-[#4F6F52]">
                    <tr>
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Kamar</th>
                        <th class="py-2 px-4">Harga</th>
                        <th class="py-2 px-4">Check in</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($historys as $history)
                        <tr class="border-t">
                            <td class="py-2 px-4">{{ $loop->iteration }}</td>
                            <td class="py-2 px-4">{{ $history->kamar->nama_kamar }}</td>
                            <td class="py-2 px-4">Rp{{ number_format( $history->kamar->harga, 0, ',', '.') }}</td>
                            <td class="py-2 px-4"> {{ \Carbon\Carbon::parse($history->created_at)->isoFormat('dddd, D MMMM Y') }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('history.detail', ['kamar' => $history->kamar->id]) }}"
                                    class="text-blue-500 hover:underline">Lihat Detail</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center font-semibold text-gray-900">
                                <img src="{{ asset('foto/nodataadmin.png') }}" class="h-52 w-52 mx-auto" alt="">
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
