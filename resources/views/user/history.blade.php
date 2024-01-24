@extends('layout.main')

@extends('layout.sidenavbar')

@section('isi')
    <div class="py-20">
        <div class="p-6 my-2">
            <h2 class="text-xl font-semibold mb-4">Riwayat Penyewaan</h2>

            <table class="min-w-full border rounded overflow-hidden text-center">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4">#</th>
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
