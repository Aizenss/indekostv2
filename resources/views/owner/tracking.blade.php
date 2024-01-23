@extends('layout.main')

@extends('layout.sidebar_owner')

@section('isi')
  <div class="sm:ml-64 mt-8 ml-2 justify-center">
    <h1 class="mb-4 mt-4 ml-4  text-3xl font-black text-gray-900">Tracking Kos</h1>
    <br>
    <div class="ml-8 mr-8 relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-white">
        <thead class="text-xs text-white uppercase bg-[#4F6F52] ">
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
                @forelse ($tracking as $track)
                <tr class="bg-white border-b hover:bg-gray-50 ">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $track->user->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($track->checkin)->isoformat('dddd, D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($track->checkout)->isoformat('dddd, D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4">
                            {{ \Carbon\Carbon::parse($track->checkin)->diffInDays(\Carbon\Carbon::parse($track->checkout)) }}
                            Hari
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('owner.history.show', $track) }}">edit</a>
                        </div>
                    </td>

                  </tr>
                  @empty
                  <tr class="bg-white dark:bg-gray-800 items-center">
                    <tr scope="row" colspan="8"
                        class="px-6 flex items-center justify-center py-4 font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                    </tr>
                    <td></td>
                    <td></td>
                    <td><img src="{{ asset('ilustrasi/Empty-amico 1.png') }}" class="size-52" alt=""></td>
                    </tr>
                @endforelse
              </tbody>
            </table>

  </div>
          </div>
@endsection
