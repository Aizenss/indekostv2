@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 py-12">
        <h2 class="text-2xl font-semibold mb-4">Detail Pembelian Kamar</h2>

        <div class="mb-4">
            <p><strong>Nama Kamar:</strong> {{ $kamar->nama_kamar }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($kamar->harga, 0, ',', '.') }}</p>
            <!-- Tambahkan informasi kamar lainnya sesuai kebutuhan -->
            @foreach ($tracking as $track)
                <p>check in : {{ $track->checkin }}</p>
                <p>check out : {{ $track->checkout }}</p>
                <p>{{ \Carbon\Carbon::parse($track->checkin)->diffInDays(\Carbon\Carbon::parse($track->checkout)) }} Hari</p>
            @endforeach
        </div>

        <form action="{{ route('history.detail.pay', ['kamar' => $kamar]) }}" method="POST">
            @csrf
            <button type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                Ajukan Sewa Lagi
            </button>
        </form>
    </div>
@endsection
