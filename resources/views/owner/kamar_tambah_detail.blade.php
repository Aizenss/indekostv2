@extends('layout.mainowner')
@extends('layout.sidebar_owner')

@section('owner')
    <form action="{{ route('owner.kamar.tambah.detail.proses', $kos) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="number" name="nomor_kamar" placeholder="nomor kamar">
        <input type="text" name="fasilitas" placeholder="fasilitas kamar">
        <input type="text" name="kamar_mandi" placeholder="info kamar mandi">
        <button type="button" onclick="addField()"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white bg=">Tambah Foto (ini button)</button>
        <div class="container">
            <input type="file" name="foto_kamar[]"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Masukkan data" />
        </div>
        <button type="submit">tambah kamar</button>
    </form>

    <script>
        const fields = [];

        function addField() {
            const newField = document.createElement("input");
            newField.type = "file";
            newField.name = "foto_kamar[]";
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
