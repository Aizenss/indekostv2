@extends('layout.main')
@extends('layout.sidebar_owner')

@section('isi')
    <div class="sm:ml-64">
        <div class=" mx-auto bg-white p-8 mb-6 rounded-md shadow-md">
            <span class="font-semibold text-2xl text-gray-900">Tambah Kamar</span>
            <form action="{{ route('owner.kamar.tambah.detail.proses', $kos) }}" method="post" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                <div class="grid grid-cols-2 gap-4 items-center">
                    <div>
                        <label for="nomor_kamar" class="text-lg font-semibold text-gray-800">Nama Kamar</label>
                        <input type="text" name="nama_kamar" id="nomor_kamar"
                            class="mt-2 p-1 w-full border border-gray-900 rounded-md focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none">
                    </div>
                    <div>
                        <style>
                            .sc-sm::-webkit-scrollbar {
                                width: 3px;
                            }
                        </style>
                        <label for="fasilitas" class="text-lg font-semibold text-gray-800">Fasilitas Kamar</label>
                        <div class="flex gap-3">
                            <input id="tagsInput" name="tags" type="text"
                                class="mt-2 p-1 w-full border border-gray-900 rounded-md  focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none overflow-y-scroll sc-sm max-h-9"
                                value="{{ old('tags') }}" autocomplete="off">
                            <button class='tags-jquery--removeAllBtn text-gray-900 text-3xl' type='button'><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </div>
                    <div>
                        <label for="kamar_mandi" class="text-lg font-semibold text-gray-800">Info Kamar Mandi</label>
                        <input type="text" name="kamar_mandi" id="kamar_mandi"
                            class="mt-2 p-1 w-full border border-gray-900 rounded-md focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none"
                            autocomplete="off">
                    </div>
                    <div>
                        <label for="harga" class="text-lg font-semibold text-gray-800">harga</label>
                        <input type="number" name="harga" id="harga"
                            class="mt-2 p-1 w-full border border-gray-900 rounded-md focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none"
                            autocomplete="off">
                    </div>
                    <div>
                        <label for="harga" class="text-lg font-semibold text-gray-800">Peraturan kamar</label>
                        <textarea name="peratruan_kamar" id="harga"
                            class="mt-2 p-1 w-full border border-gray-900 rounded-md focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none"
                            autocomplete="off"></textarea>
                    </div>
                    <div>
                        <label for="night" class="text-lg font-semibold text-gray-800">per/</label>
                        <select name="night" id="month" class="mt-2 p-1 w-full border border-gray-900 rounded-md focus:ring focus:ring-blue-500 focus:border-gray-900 focus:outline-none" autocomplete="off">
                            <script>
                              for (var i = 1; i <= 12; i++) {
                                document.write('<option value="' + i + '">' + i + 'Bulan' + '</option>');
                              }
                            </script>
                          </select>
                    </div>
                    <div>
                        <label for="tambahin" class="text-lg font-semibold text-gray-800">Foto Kamar</label>
                        <div class="flex items-center gap-3">
                            <button type="button" id="tambahin"
                                class="transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 text-white px-6 py-1.5 rounded-md focus:outline-none focus:ring focus:border-blue-300"
                                onclick="addField()">+</button>
                            <p class="text-gray-500 text-sm">Tambahkan foto kamar sesuai kebutuhan.</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div id="fotoContainer" class="container mt-4 space-y-4">
                        <input type="file" name="foto_kamar[]"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                    </div>
                </div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white p-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 transition duration-300 ease-in-out">
                    Tambah Kamar
                </button>
            </form>
        </div>
    </div>

    <script>
        const fields = [];

        function addField() {
            const newField = document.createElement("input");
            newField.type = "file";
            newField.name = "foto_kamar[]";
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
