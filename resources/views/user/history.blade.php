@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 py-12">
        <div class="p-6 my-2">
            <h2 class="text-xl font-semibold mb-4">Purchase History</h2>

            <table class="min-w-full border rounded overflow-hidden text-center">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4">#</th>
                        <th class="py-2 px-4">Kamar</th>
                        <th class="py-2 px-4">Harga</th>
                        <th class="py-2 px-4">Check in</th>
                        <th class="py-2 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historys as $history)
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
