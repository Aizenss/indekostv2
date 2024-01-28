@extends('layout.main')

@extends('layout.sidebar')

@section('isi')
    <div class="py-20 px-10 sm:ml-64">
        <div class=" mx-auto bg-white p-8 mb-6 rounded-md shadow-md">
            <span class="font-semibold text-2xl text-gray-900">Perbarui Footer</span>
            <form action="{{ route('admin.footer.update', ['footer' => $footer->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @method('PUT')
                @csrf
              <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="kalimat" class="text-lg font-semibold text-gray-800">Kalimat</label>
                        <textarea name="kalimat" id="kalimat" class="mt-2 p-1 w-full border border-gray-900 rounded-md focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none">{{ $footer->kalimat }}</textarea>
                        @error('kalimat')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <style>
                            .sc-sm::-webkit-scrollbar {
                                width: 3px;
                            }
                        </style>
                        <div>
                            <label for="alamat" class="text-lg font-semibold text-gray-800">Alamat</label>
                            <textarea name="alamat" id="alamat" class="mt-2 p-1 w-full border border-gray-900 rounded-md focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none">{{ old('alamat', $footer->alamat) }}</textarea>
                            @error('alamat')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>



                    <div>
                        <label for="email" class="text-lg font-semibold text-gray-800">Email</label>
                        <input type="text" name="email" id="email" value="{{ old('email', $footer->email) }}" class="mt-2 p-1 w-full border border-gray-900 rounded-md focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none" autocomplete="off">
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div>
                            <label for="nomorhp" class="text-lg font-semibold text-gray-800">Nomor Handphone</label>
                            <input type="tel" name="nomorhp" id="nomorhp" value="{{ old('nomorhp', $footer->nomorhp) }}"
                                class="mt-2 p-1 w-full border border-gray-900 rounded-md focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none"
                                autocomplete="off">
                            @error('nomorhp')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                </div>
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12s4.477 10 10 10s10-4.477 10-10M12 6.25a.75.75 0 0 1 .75.75v6a.75.75 0 0 1-1.5 0V7a.75.75 0 0 1 .75-.75M12 17a1 1 0 1 0 0-2a1 1 0 0 0 0 2" clip-rule="evenodd"/></svg>
                <h1 class="text-gray-800">Masukkan tautan link dibawah ini...</h1>
                </div>
                <div class="grid grid-cols-3 gap-4 items-center">
                    <div>
                        <label for="linkinsta" class="text-lg font-semibold text-gray-800">Instagram</label>
                        <input type="text" name="linkinsta" id="linkinsta" value="{{ old('linkinsta', $footer->linkinsta) }}" class="mt-2 p-1 w-full border border-gray-900 rounded-md focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none" autocomplete="off">
                        @error('linkinsta')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="linktwitter" class="text-lg font-semibold text-gray-800">Twitter</label>
                        <input type="text" name="linktwitter" id="linktwitter" value="{{ old('linktwitter', $footer->linktwitter) }}" class="mt-2 p-1 w-full border border-gray-900 rounded-md focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none" autocomplete="off">
                        @error('linktwitter')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="linkyt" class="text-lg font-semibold text-gray-800">Youtube</label>
                        <input type="text" name="linkyt" id="linkyt" value="{{ old('linkyt', $footer->linkyt) }}" class="mt-2 p-1 w-full border border-gray-900 rounded-md focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none" autocomplete="off">
                        @error('linkyt')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white p-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 transition duration-300 ease-in-out">
                    Simpan
                </button>
            </form>
        </div>
    </div>
@endsection
