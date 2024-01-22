@extends('layout.main')
@include('layout.sidebar_owner')

@section('isi')
    <div class="sm:ml-64">
        <div class="my-2 p-6">
            {{-- {{ $tracking }} --}}
            <div class="relative overflow-x-auto my-2">
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
                                aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <form action="{{ route('owner.history.edit', $tracking) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $tracking->user->name }}
                                </th>
                                <td class="px-6 py-4">
                                    <input type="date" name="checkin" id="" value="{{ $tracking->checkin }}">
                                </td>
                                <td class="px-6 py-4">
                                    <input type="date" name="checkout" id="" value="{{ $tracking->checkout }}">
                                </td>
                                <td class="px-6 py-4">
                                    <button type="submit">update</button>
                                </td>
                            </form>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
