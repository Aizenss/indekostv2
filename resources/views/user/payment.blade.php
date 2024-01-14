@extends('layout.main')

@extends('layout.sidebar_user')

@section('isi')
    <div class="sm:ml-64 p-4">
        <table>
            <tr>
                <th>no</th>
                <th>nomor kamar</th>
                <th>status</th>
                <th>aksi</th>
            </tr>
            @foreach ($kamars as $kamar)
                @if ($kamar->status == 'terima')
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kamar->nomor_kamar }}</td>
                        <td>{{ $kamar->status }}</td>
                        <td>
                            <button class="pay-button" data-token="{{ $kamar->snap_token }}" data-kamar-id="{{ $kamar->id }}">Bayar</button>
                            <form action="{{ route('payment.batal', $kamar) }}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit">batalkan pembayaran</button>
                            </form>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                @endif
            @endforeach
        </table>
    </div>


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
                                console.log(response.message);
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
@endsection
