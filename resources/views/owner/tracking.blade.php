@extends('layout.main')
@include('layout.sidebar_owner')

@section('isi')
    <div class="sm:ml-64">
        {{-- {{ $tracking }} --}}
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            checkin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            checkout
                        </th>
                        <th scope="col" class="px-6 py-3">
                            total hari
                        </th>
                        <th scope="col" class="px-6 py-3">
                            aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tracking as $track)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $track->user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $track->checkin }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $track->checkout }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($track->checkin)->diffInDays(\Carbon\Carbon::parse($track->checkout)) }} Hari
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('owner.history.show', $track) }}">edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
