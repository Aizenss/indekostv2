@extends('layout.main')
@section('isi')
    <div class="sm:ml-64 px-10 py-20">
        <div class="bg-[#4F6F52] py-5 px-3 md:px-20 w-full rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center">
                <div class="informasi flex flex-col">
                    <span class="text-lg md:text-xl text-gray-300 font-semibold">Total Saldo Anda</span>
                    <span class="text-xl md:text-3xl text-gray-300 font-semibold ms-3 mt-3 truncate">Rp.
                        {{ number_format(Auth::user()->pendapatan, 0, ',', '.') }}</span>
                </div>
                <div class="icon hidden md:block justify-self-end">
                    <i class="fa-solid fa-wallet text-[100px] text-gray-100/50"></i>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.penarikan.tambah') }}" method="POST" class="my-12">
            @csrf
            <div class="grid grid-cols-2 gap-8">
                <div class="metode">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Metode Pembayaran</label>
                    <select id="countries" name="metode_pembayaran"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option disabled selected>Metode Pembayaran</option>
                        <option value="BRI" >Bank Bri</option>
                        <option value="BNI" >Bank Bni</option>
                        <option value="BCA" >Bank Bca</option>
                    </select>
                    @error('metode_pembayaran')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>
                <div class="mb-6">
                    <label for="norek" class="block mb-2 text-sm font-medium text-gray-900">No Rekening</label>
                    <input placeholder="Cth: 123456789" name="no_rek" type="number" id="norek" value="{{ old('no_rek') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @error('no_rek')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label for="nominal class=" class="block mb-2 text-sm font-medium text-gray-900">Nominal</label>
                <input type="number" placeholder="Cth: 100000" id="nominal" name="nominal" value="{{ old('nominal') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('nominal')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full flex justify-center items-center">
                <button type="submit" class="py-2 px-8 text-white text-lg font-semibold rounded-lg"
                    style="background-color: #4F6F52;">Tarik</button>
            </div>
        </form>
        <div class="history">
            <div class="grid grid-cols-1 md:grid-cols-2 px-3 md:px-20">
                <div class="title">
                    <span class="text-xl text-[#4F6F52] ">Riwayat</span>
                </div>
                <div class="indikator flex items-center justify-end gap-3">
                    <div class="masuk flex items-center gap-2">
                        <div class="bg-[#739072] rounded-full w-3 h-3"></div>
                        <span class="text-lg text-gray-900">Income</span>
                    </div>
                    <div class="masuk flex items-center gap-2">
                        <div class="bg-[#ce6262] rounded-full w-3 h-3"></div>
                        <span class="text-lg text-gray-900">Outcome</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 my-10 px-2 lg:px-24">
                @php
                    $sortedPenarikanTransaksi = collect($penarikanTransaksi)->sortBy('created_at')->reverse()->toArray();
                @endphp
                @foreach ($sortedPenarikanTransaksi as $item)
                    @if ($item['type'] == 'transaksi')
                        {{-- History masuk --}}
                        <div class="flex flex-col items-center">
                            <div class="flex items-center gap-3">
                                <div class="bg-[#739072] rounded-full w-4 h-4"></div>
                                <span class="text-base lg:text-xl font-medium text-gray-900 text-start">Transfer dari
                                    {{ $item['data']->user->name }}</span>
                            </div>
                            <div class="informasinya">
                                <div class="flex items-center gap-5">

                                    <div class="text">
                                        <div class="flex gap-8 items-center">
                                            <span
                                                class="text-sm text-gray-900">{{ $item['data']->created_at->diffForHumans() }}</span>
                                            <span
                                                class="text-xs text-gray-900">{{ $item['data']->created_at->isoFormat('D MMMM Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xl text-[#739072] text-end">
                                + Rp. {{ number_format($item['data']->nominal_owner, 0, ',', '.') }}
                            </div>
                        </div>
                        {{-- History masuk --}}
                    @elseif($item['type'] == 'penarikan')
                        {{-- History Tarik --}}
                        <div class="flex flex-col items-center">
                            <div class="flex items-center gap-3">
                                <div class="bg-[#ce6262] rounded-full w-4 h-4"></div>
                                <span class="text-base lg:text-xl font-medium text-gray-900 text-start">Tarik Tunai</span>
                            </div>
                            <div class="informasinya">
                                <div class="flex items-center gap-5">
                                    <div class="text">
                                        <div class="flex gap-8 items-center">
                                            <span
                                                class="text-sm text-gray-900">{{ $item['data']->created_at->diffForHumans() }}</span>
                                            <span
                                                class="text-xs text-gray-900">{{ $item['data']->created_at->isoFormat('D MMMM Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xl text-[#ce6262] text-end">
                                - Rp. {{ number_format($item['data']->nominal, 0, ',', '.') }}
                            </div>
                        </div>
                        {{-- History Tarik --}}
                    @endif
                @endforeach

                {{-- perulangan --}}
            </div>
        </div>
    </div>
@endsection
