@extends('layout.mainowner')
@extends('layout.sidebar_owner')

@section('owner')
    <div class="max-w-md mx-auto bg-white p-8 mb-6 rounded-md shadow-md">
        <form action="{{ route('owner.kamar.tambah.detail.proses', $kos) }}" method="post" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            <div>
                <label for="nomor_kamar" class="text-lg font-semibold text-gray-800">Nomor Kamar</label>
                <input type="number" name="nomor_kamar" id="nomor_kamar"
                    class="mt-2 p-3 w-full border border-blue-500 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none">
            </div>
            <div>
                <label for="fasilitas" class="text-lg font-semibold text-gray-800">Fasilitas Kamar</label>
                <input type="text" name="fasilitas" id="fasilitas"
                    class="mt-2 p-3 w-full border border-blue-500 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none">
            </div>
            <div>
                <label for="kamar_mandi" class="text-lg font-semibold text-gray-800">Info Kamar Mandi</label>
                <input type="text" name="kamar_mandi" id="kamar_mandi"
                    class="mt-2 p-3 w-full border border-blue-500 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none">
            </div>
            <div>
                <label for="foto_kamar" class="text-lg font-semibold text-gray-800 block">Foto Kamar</label>
                <div class="flex items-center space-x-4">
                    <button type="button"
                        class="transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        onclick="addField()">Tambah Foto</button>
                    <p class="text-gray-500 text-sm">Tambahkan foto kamar sesuai kebutuhan.</p>
                </div>
                <div class="container mt-4 space-y-4">
                    <input type="file" name="foto_kamar[]"
                        class="p-3 border border-blue-500 rounded-md focus:ring focus:ring-blue-500 focus:border-blue-500 focus:outline-none">
                </div>
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white p-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 transition duration-300 ease-in-out">
                Tambah Kamar
            </button>
        </form>
    </div>

    <script>
        const fields = [];

        function addField() {
            const newField = document.createElement("input");
            newField.type = "file";
            newField.name = "foto_kamar[]";
            newField.classList.add("p-3", "border", "border-blue-500", "rounded-md", "focus:ring", "focus:ring-blue-500",
                "focus:border-blue-500", "focus:outline-none");
            fields.push(newField);

            fields.forEach((field) => {
                document.querySelector(".container").appendChild(field);
            });
        }
    </script>
@endsection
