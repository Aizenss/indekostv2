@extends('layout.main')
@extends('layout.sidebar')

@section('isi')
    <div class=" py-20 px-10 sm:ml-64">
        <h1 class="text-xl my-5">Create data kos</h1>
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow ">
            <form action="{{ route('owner.kos.create.proses') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="grid md:grid-cols-2 gap-5">
                    <div class="">
                        <div class="mb-5">
                            <label for="nama_kost"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Kost</label>
                            <input type="text" id="nama_kost" name="nama_kost" value="{{ old('nama_kost') }}"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cth: Arumba 2 Gpa">

                            @error('nama_kost')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="lokasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi</label>
                            <textarea id="lokasi" name="lokasi" rows="4"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cth: Jl. Griya Permata Alam Ngijo, KarangPloso">{{ old('lokasi') }}</textarea>
                            @error('lokasi')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="peraturan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peraturan</label>
                            <textarea id="peraturan" name="peraturan" rows="4"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cth: Tidak boleh merokok, tidak boleh begadang">{{ old('peraturan') }}</textarea>
                            @error('peraturan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="spesifikasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Spesifikasi</label>
                            <textarea id="spesifikasi" name="spesifikasi" rows="4"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cth: Luas rumah 80 meter, luas kamar 5 meter">{{ old('spesifikasi') }}</textarea>
                            @error('spesifikasi')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="spesifikasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasilitas umum</label>
                            <div class="flex gap-3">
                                <input id="tagsInput" name="fasilitas_umum" type="text" value="{{ old('fasilitas_umum') }}"
                                    class="mt-2 p-1 w-full border border-gray-900 rounded-md  focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none overflow-y-scroll sc-sm max-h-9"
                                    value="" autocomplete="off">
                                <button class='tags-jquery--removeAllBtn text-gray-900 text-3xl' type='button'><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </div>
                            @error('tags')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>
                    <div class="">
                        <div class="mb-2">
                            <label for="ketentuan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ketentuan</label>
                            <select id="ketentuan" name="ketentuan"
                                class="border border-green-300 text-green-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" disabled {{ old('ketentuan') ? '' : 'selected' }}>Pilih kententuan
                                    kos</option>
                                <option value="Laki-Laki" {{ old('ketentuan') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                                </option>
                                <option value="Perempuan" {{ old('ketentuan') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                </option>
                                <option value="Campur" {{ old('ketentuan') == 'Campur' ? 'selected' : '' }}>Campur</option>
                            </select>
                            @error('ketentuan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="fasilitas_kamar_mandi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasilitas kamar
                                mandi</label>
                            <textarea id="fasilitas_kamar_mandi" name="fasilitas_kamar_mandi" rows="4"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cth : 4 Kamar mandi bawah dan 2 Kamar mandi atas">{{ old('fasilitas_kamar_mandi') }}</textarea>
                            @error('fasilitas_kamar_mandi')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="fasilitas_tempat_parkir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasilitas tempat
                                parkir</label>
                            <textarea id="fasilitas_tempat_parkir" name="fasilitas_tempat_parkir" rows="4"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cth : Tempat parkir dengan ukuran 180 meter: 20 meter">{{ old('fasilitas_tempat_parkir') }}</textarea>
                            @error('fasilitas_tempat_parkir')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="foto_depan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">foto_depan</label>
                            <input type="file" id="foto_depan" name="foto_depan" value="{{ old('foto_depan') }}"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="nama kost">
                            @error('foto_depan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="foto_dalam"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">foto
                                dalam</label>
                            <input type="file" id="foto_dalam" name="foto_dalam" value="{{ old('foto_dalam') }}"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="nama kost">
                            @error('foto_dalam')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>

                            <div>
                                <label for="tambahin" class="text-lg font-medium text-gray-800">Foto Kamar</label>
                                <div class="flex items-center gap-3">
                                    <button type="button" id="tambahin"
                                        class="transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 text-white px-6 py-1.5 rounded-md focus:outline-none focus:ring focus:border-blue-300"
                                        onclick="addField()">+</button>
                                    <p class="text-gray-500 text-sm">Tambahkan foto kamar sesuai kebutuhan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="fotoContainer" class="container mt-4 space-y-4">
                    <input type="file" name="foto_tambahan[]"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                    @error('foto_tambahan[]')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-between mt-5">
                    <!-- Kembali (Back) button -->
                    <button type="button" onclick="window.location.href=`{{ route('owner.kos') }}`" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:outline-none focus:ring focus:border-gray-300">
                        Kembali
                    </button>

                    <!-- Simpan (Save) button -->
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
    <script>
        const fields = [];

        function addField() {
            const newField = document.createElement("input");
            newField.type = "file";
            newField.name = "foto_tambahan[]";
            newField.classList.add("block", "w-full", "text-sm", "text-gray-900", "border", "border-gray-300", "rounded-lg",
                "cursor-pointer", "bg-gray-50", "focus:outline-none");
            fields.push(newField);

            fields.forEach((field) => {
                document.getElementById("fotoContainer").appendChild(field);
            });
        }

        let oldTagsValue;

        let $input = $('#tagsInput').tagify({
                whitelist: [{
                    "id": 1,
                    "value": "some string"
                }]
            })
            .on('add', function(e, tagName) {
                console.log('JQUERY EVENT: ', 'added', tagName);
                oldTagsValue = jqTagify.value;
            })
            .on("invalid", function(e, tagName) {
                console.log('JQUERY EVENT: ', "invalid", e, ' ', tagName);
            });
        let jqTagify = $input.data('tagify');

        $('.tags-jquery--removeAllBtn').on('click', function() {
            jqTagify.removeAllTags();
            console.log('Old Value:', oldTagsValue);
        });
    </script>
@endsection
