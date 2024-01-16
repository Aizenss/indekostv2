@extends('layout.mainowner')
@extends('layout.sidebar_owner')

@section('style')
    <style></style>
@endsection

@section('owner')
    <h1 class="text-xl my-5">Persetujuan Pembayaran</h1>

    <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow">
        <form action="{{ route('owner.kos.edit.proses', ['id' => $kos->id]) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="grid md:grid-cols-2 gap-5">
                <div class="">
                    <div>
                        <label for="nama_kost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Kost</label>
                        <input type="text" id="nama_kost" name="nama_kost"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cth: Arumba 2 Gpa" value="{{ $kos->nama_kost }}">
                        @error('nama_kost')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="ketentuan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ketentuan</label>
                        <select id="ketentuan" name="ketentuan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="Laki-Laki" {{ $kos->ketentuan === 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                            </option>
                            <option value="Perempuan" {{ $kos->ketentuan === 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                            <option value="Campur" {{ $kos->ketentuan === 'Campur' ? 'selected' : '' }}>Campur</option>
                        </select>
                        @error('ketentuan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="lokasi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">lokasi</label>
                        <input type="text" id="lokasi" name="lokasi"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cth: Jl. Griya Permata Alam Ngijo, KarangPloso"value="{{ $kos->lokasi }}">
                        @error('lokasi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="peraturan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">peraturan</label>
                        <input type="text" id="peraturan" name="peraturan"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cth: Tidak boleh merokok, tidak boleh begadang" value="{{ $kos->peraturan }}">
                        @error('peraturan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="spesifikasi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">spesifikasi</label>
                        <input type="text" id="spesifikasi" name="spesifikasi" value="{{ $kos->spesifikasi }}"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cth: Luas rumah 80 meter, luas kamar 5 meter">
                        @error('spesifikasi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="">
                        <label for="fasilitas_umum" class="block mb-2 text-sm text-gray-600">fasilitas kamar</label>
                        <input type="text"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="fasilitas_umum" value="{{ $kos->fasilitas_umum }}" placeholder="Cth : Kulkas" />
                        @error('fasilitas_umum')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <div>
                        <label for="fasilitas_kamar_mandi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">fasilitas kamar
                            mandi</label>
                        <input type="text" id="fasilitas_kamar_mandi" name="fasilitas_kamar_mandi"
                            value="{{ $kos->fasilitas_kamar_mandi }}"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cth : 4 Kamar mandi bawah dan 2 Kamar mandi atas">
                        @error('fasilitas_kamar_mandi')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="fasilitas_tempat_parkir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">fasilitas tempat
                            parkir</label>
                        <input type="text" id="fasilitas_tempat_parkir" name="fasilitas_tempat_parkir"
                            value=" {{ $kos->fasilitas_tempat_parkir }}"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cth : Tempat parkir dengan ukuran 180 meter: 20 meter">
                        @error('fasilitas_tempat_parkir')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="foto_depan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">foto_depan</label>
                        <img src="{{ asset('kosts/' . $kos->foto_depan) }}" alt="" class="w-[120px] rounded-lg">
                        <input type="file" id="foto_depan" name="foto_depan" value="{{ $kos->foto_depan }}"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="nama kost">
                        @error('foto_depan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="foto_dalam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">foto
                            dalam</label>
                        <img src="{{ asset('kosts/' . $kos->foto_dalam) }}" alt="" class="w-[120px] rounded-lg">
                        <input type="file" id="foto_dalam" name="foto_dalam" value="{{ $kos->foto_dalam }}"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="nama kost">
                        @error('foto_dalam')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button type="button" onclick="addField()"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white bg=">Tambah Foto
                            (opsional)</button>
                        <div class="container">
                            <input type="file" name="foto_tambahan[]" value="{{ $kos->foto_tambahan }}"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan data" />
                        </div>
                        @error('foto_tambahan')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                    </div>
                </div>
            </div>
            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded-md">rubah</button>
        </form>
        <a href="{{ route('owner.kos') }}">kembali</a>
    </div>
@endsection

@section('script')
    <script>
        const fields = [];

        function addField() {
            const newField = document.createElement("input");
            newField.type = "file";
            newField.name = "foto_tambahan[]";
            newField.classList.add("block", "w-full", "p-2", "text-gray-900", "border", "border-gray-300", "rounded-lg",
                "bg-gray-50", 'sm:text-xs', 'focus:ring-blue-500', 'focus:border-blue-500', 'dark:bg-gray-700',
                'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-white', 'dark:focus:ring-blue-500',
                'dark:focus:border-blue-500', 'mt-2'); // Tambahkan class Tailwind untuk styling
            fields.push(newField);

            fields.forEach((field) => {
                document.querySelector(".container").appendChild(field);
            });
        }
    </script>
@endsection
