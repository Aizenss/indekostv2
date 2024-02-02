@extends('layout.main')

@section('isi')
    <div class="py-20 justify-center">
        <h1 class="mb-4 mt-4 ml-4 text-2xl font-black text-gray-900 dark:text-white">Pembayaran Sewa</h1>
        <br>
        <div class="ml-8 mr-8 relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-white">
                <thead class="text-xs text-white uppercase bg-[#4F6F52]">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Kamar</th>
                        <th scope="col" class="px-6 py-3">Status Kamar</th>
                        <th scope="col" class="px-6 py-3">Harga</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kamars as $kamar)
                        @if ($kamar->status == 'terima')
                            <tr class="{{ $kamar->status == 'terima' ? 'bg-white border-b hover:bg-gray-50' : '' }}">
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $kamar->nama_kamar }}
                                </td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $kamar->status }}</td>
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                    Rp.{{ number_format($kamar->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 flex gap-2">
                                    @if ($kamar->status == 'terima')
                                        <div>
                                            <button class="pay-button bg-blue-500 text-white px-4 py-2"
                                                data-token="{{ $kamar->snap_token }}"
                                                data-kamar-id="{{ $kamar->id }}">Bayar</button>
                                        </div>
                                        <form id="reject-form" action="{{ route('payment.batal', $kamar) }}" method="post">
                                            @method('PUT')
                                            @csrf

                                            <input type="hidden" name="rejection_reason" id="rejection_reason">

                                            <button class="cancel-button bg-red-500 text-white px-4 py-2" type="button"
                                                onclick="showRejectionReason()" data-kamar-id="{{ $kamar->id }}">Batalkan
                                                Pembayaran</button>
                                        </form>
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
                                    @else
                                        <span class="text-gray-500">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @empty
                        <td colspan="7" class="px-6 py-10 text-center font-semibold text-gray-900">
                            <img src="{{ asset('foto/nodataadmin.png') }}" class="h-52 w-52 mx-auto" alt="">
                            <span class="text-xl text-gray-900 font-semibold">Data Masih Kosong Kaka</span>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="py-20 justify-center">
        <h1 class="mb-4 mt-4 ml-4 text-2xl font-black text-gray-900 dark:text-white">Pembayaran Ulang</h1>
        <br>
        <div class="ml-8 mr-8 relative overflow-x-auto shadow-md sm:rounded-lg mb-4">
            <table class="w-full text-sm text-left rtl:text-right text-white">
                <thead class="text-xs text-white uppercase bg-[#4F6F52]">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Kamar</th>
                        <th scope="col" class="px-6 py-3">Status Kamar</th>
                        <th scope="col" class="px-6 py-3">Harga</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kamarslagi as $kamar)
                        <tr class="{{ $kamar->status == 'diterima' ? 'bg-white border-b hover:bg-gray-50' : '' }}">
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $kamar->nama_kamar }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">{{ $kamar->status }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                Rp.{{ number_format($kamar->harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4">
                                @if ($kamar->status == 'diterima')
                                    <button class="pay-button2 bg-blue-500 text-white px-4 py-2"
                                        data-token="{{ $kamar->snap_token }}"
                                        data-kamar-id="{{ $kamar->id }}">Bayar</button>

                                    <input type="hidden" name="rejection_reason" id="rejection_reason">
                                    <button class="cancel-button bg-red-500 text-white px-4 py-2"
                                        data-kamar-id="{{ $kamar->id }}" type="button"
                                        onclick="showRejectionReason()">Batalkan Pembayaran</button>
                                @else
                                    <span class="text-gray-500">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <td colspan="7" class="px-6 py-10 text-center font-semibold text-gray-900">
                            <img src="{{ asset('foto/nodataadmin.png') }}" class="h-52 w-52 mx-auto" alt="">
                            <span class="text-xl text-gray-900 font-semibold">Data Masih Kosong Kaka</span>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}">
    </script>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButtons = document.getElementsByClassName('pay-button');
        for (var i = 0; i < payButtons.length; i++) {
            payButtons[i].addEventListener('click', function() {
                var token = this.getAttribute('data-token');
                var kamarId = this.getAttribute('data-kamar-id');

                var currentButton = this;
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Trigger snap popup
                snap.pay(token, {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        alert("Payment success!");
                        window.location.href = '/payment';

                        console.log(result);
                        // Contoh menggunakan jQuery
                        $.ajax({
                            type: 'POST',
                            url: '/payment/proses-data/' + kamarId,
                            data: {
                                _token: csrfToken,
                                data: result,
                                // tambahkan data lain jika diperlukan
                            },
                            success: function(response) {
                                window.location.href = '/payment';
                                // Lakukan sesuatu setelah menerima respons dari server
                                // window.location.href = '/payment/proses-data/' + kamarId;
                            },
                            error: function(error) {
                                console.error('Error:', error);
                            }
                        });

                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        alert("Waiting for your payment!");
                        console.log(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("Payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('You closed the popup without finishing the payment');
                    }
                });
            });
        }
    </script>
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButtons = document.getElementsByClassName('pay-button2');
        for (var i = 0; i < payButtons.length; i++) {
            payButtons[i].addEventListener('click', function() {
                var token = this.getAttribute('data-token');
                var kamarId = this.getAttribute('data-kamar-id');

                var currentButton = this;
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Trigger snap popup
                snap.pay(token, {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        alert("Payment success!");
                        window.location.href = '/payment';
                        console.log(result);

                        // Contoh menggunakan jQuery
                        $.ajax({
                            type: 'POST',
                            url: '/history/' + kamarId + '/proses',
                            data: {
                                _token: csrfToken,
                                data: result,
                                // tambahkan data lain jika diperlukan
                            },
                            success: function(response) {
                                window.location.href = '/payment';
                            },
                            error: function(error) {
                                console.error('Error:', error);
                            }
                        });

                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        alert("Waiting for your payment!");
                        console.log(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("Payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('You closed the popup without finishing the payment');
                    }
                });
            });
        }
    </script>
@endsection
