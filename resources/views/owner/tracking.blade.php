@extends('layout.main')

@section('isi')
    <div class="py-20 px-10 sm:ml-64">
        <h1 class="mb-4 mt-4 ml-4 text-3xl font-black text-gray-900">Tracking Kos</h1>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-[#4F6F52]">
                <tr>
                    <th scope="col" class="px-6 py-3">nama</th>
                    <th scope="col" class="px-6 py-3">checkin</th>
                    <th scope="col" class="px-6 py-3">checkout</th>
                    <th scope="col" class="px-6 py-3">total hari</th>
                    <th scope="col" class="px-6 py-3">aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tracking as $track)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $track->user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($track->checkin)->isoFormat('dddd, D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($track->checkout)->isoFormat('dddd, D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($track->checkout), false) }} Hari
                        </td>
                        <td class="px-6 py-4">
                            @if (\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($track->checkout), false) === 0)
                                {{-- No action needed for 0 days --}}
                            @else
                                <a href="{{ route('owner.history.show', $track) }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-2 py-1.5 me-1 mb-1">edit</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-white dark:bg-gray-800 items-center">
                    <tr scope="row" colspan="8"
                        class="px-6 flex items-center justify-center py-4 font-medium text-xs text-gray-900 whitespace-nowrap">
                    </tr>
                    <td></td>
                    <td></td>
                    <td><img src="{{ asset('ilustrasi/Empty-amico 1.png') }}" class="size-52" alt=""></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
