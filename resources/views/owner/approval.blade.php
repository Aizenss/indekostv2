@extends('layout.mainowner')
@include('layout.sidebar_owner')

@section('owner')
    <h1 class="text-xl my-5">Persetujuan Pembayaran</h1>

    <div
        class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                <thead class="text-xs text-white uppercase bg-[#4F6F52] ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Kost
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            IDR
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jangka Waktu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kamars as $index => $kamar)
                        <tr class="bg-white dark:bg-gray-800 items-center">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $index + 1 }}
                            </th>
                            <td class="px-6 py-4 text-xs">
                                {{ $kamar->kos->nama_kost }}
                            </td>
                            <td class="px-6 py-4 text-xs">
                                {{ $kamar->user->name }}
                            </td>
                            <td class="px-6 py-4 text-xs">
                                Rp.{{ number_format($kamar->harga, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-xs">
                                {{ $kamar->night }} bulan
                            </td>
                            <td class="px-6 py-4 text-xs">
                                {{ $kamar->status }}
                            </td>
                            <td class="px-6 py-4 text-xs flex items-center gap-3">
                                @if ($kamar->status == 'dipesan')
                                    <form action="{{ route('owner.approval.tolak', $kamar) }}" method="post"
                                        class="my-auto">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="text-red-600 self-center">Tolak</button>
                                    </form>
                                    <form action="{{ route('owner.approval.terima', $kamar) }}" method="post"
                                        class="my-auto">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="text-green-600 self-center">Terima</button>
                                    </form>
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
