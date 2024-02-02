@extends('layout.main')
@include('layout.sidebar')

@section('isi')
    <div class="sm:ml-64 py-20 px-10">
        <h1 class="text-xl my-5">Persetujuan Pembayaran</h1>
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-white uppercase bg-[#4F6F52]">
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
                        @forelse ($kamars as $index => $kamar)
                            <tr class="bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 items-center">
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
                                        <form id="reject-form" action="{{ route('owner.approval.tolak', $kamar) }}"
                                            method="post" class="my-auto">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="rejection_reason" id="rejection_reason">
                                            <button type="button" onclick="showRejectionReason()" class="text-red-600 self-center">Tolak</button>
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
                                    @if ($kamar->status == 'menambah waktu')
                                        <form action="{{ route('owner.approval.tolak', $kamar) }}" method="post"
                                            class="my-auto">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="rejection_reason" id="rejection_reason">
                                            <button type="button" onclick="showRejectionReason()" class="text-red-600 self-center">Tolak</button>
                                        </form>
                                        <form action="{{ route('owner.approval.terimaLagi', $kamar) }}" method="post"
                                            class="my-auto">
                                            @csrf
                                            @method('patch')
                                            <button type="submit" class="text-green-600 self-center">Terima</button>
                                        </form>
                                    @else
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-white dark:bg-gray-800 items-center">
                            <tr scope="row" colspan="8"
                                class="px-6 flex items-center justify-center py-4 font-medium text-xs text-gray-900 whitespace-nowrap dark:text-white">
                            </tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><img src="{{ asset('ilustrasi/Empty-amico 1.png') }}" class="w-32 lg:w-48" alt=""></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function showRejectionReason() {
            Swal.fire({
                title: 'Alasan Penolakan',
                input: 'textarea',
                inputLabel: 'Masukan alasan penolakan disini',
                inputPlaceholder: 'Type your message here...',
                inputAttributes: {
                    'aria-label': 'Type your message here',
                },
                showCancelButton: true,
                confirmButtonText: 'Tolak',
                cancelButtonText: 'Batal',
                preConfirm: () => {
                    const rejectionReason = Swal.getPopup().querySelector('textarea').value;
                    if (!rejectionReason) {
                        Swal.showValidationMessage('Alasan penolakan harus diisi');
                    }
                    return rejectionReason;
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // Set the rejection reason to the hidden input field
                    document.getElementById('rejection_reason').value = result.value;
                    // Submit the form
                    document.getElementById('reject-form').submit();
                }
            });
        }
    </script>
@endsection
