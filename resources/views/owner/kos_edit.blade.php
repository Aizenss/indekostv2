/////////////////////////////@extends('layout.main')
@extends('layout.sidebar_owner')

@section('style')
  <style></style>
@endsection

@section('isi')
  <div class="sm:ml-64">
    <h1 class="text-xl my-5 ml-8">Edit Kos</h1>

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
                class="
bg-green-100 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                placeholder="Cth: Arumba 2 Gpa" value="{{ $kos->nama_kost }}">
              @error('nama_kost')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="ketentuan"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ketentuan</label>
              <select id="ketentuan" name="ketentuan"
                class="bg-green-100 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="Laki-Laki" {{ $kos->ketentuan === 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="Perempuan" {{ $kos->ketentuan === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                <option value="Campur" {{ $kos->ketentuan === 'Campur' ? 'selected' : '' }}>Campur</option>
              </select>
              @error('ketentuan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi</label>
              <textarea id="lokasi" name="lokasi" rows="4"
                class="
                            bg-green-100 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                placeholder="Cth: Jl. Griya Permata Alam Ngijo, KarangPloso">{{ $kos->lokasi }}</textarea>
              @error('lokasi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="peraturan"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peraturan</label>
              <textarea id="peraturan" name="peraturan" rows="4"
                class="
bg-green-100 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                placeholder="Cth: Tidak boleh merokok, tidak boleh begadang">{{ $kos->peraturan }}</textarea>
              @error('peraturan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="spesifikasi"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Spesifikasi</label>
              <textarea id="spesifikasi" name="spesifikasi" rows="4"
                class="
bg-green-100 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                placeholder="Cth: Luas rumah 80 meter, luas kamar 5 meter">{{ $kos->spesifikasi }}</textarea>
              @error('spesifikasi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>


            <div>
              <label for="fasilitas_kamar_mandi"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasilitas kamar mandi</label>
              <textarea id="fasilitas_kamar_mandi" name="fasilitas_kamar_mandi" rows="4"
                class="
bg-green-100 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                placeholder="Cth : 4 Kamar mandi bawah dan 2 Kamar mandi atas">{{ $kos->fasilitas_kamar_mandi }}</textarea>
              @error('fasilitas_kamar_mandi')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="">

            <div>
              <label for="fasilitas_umum" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasilitas
                kamar</label>
              <input type="text"
                class="
bg-green-100 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                name="fasilitas_umum" value="{{ $kos->fasilitas_umum }}" placeholder="Cth : Kulkas" />
              @error('fasilitas_umum')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="fasilitas_tempat_parkir"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasilitas tempat parkir</label>
              <textarea id="fasilitas_tempat_parkir" name="fasilitas_tempat_parkir" rows="4"
                class="
bg-green-100 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                placeholder="Cth : Tempat parkir dengan ukuran 180 meter: 20 meter">{{ $kos->fasilitas_tempat_parkir }}</textarea>
              @error('fasilitas_tempat_parkir')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="foto_depan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                depan</label>
              <img src="{{ asset('kosts/' . $kos->foto_depan) }}" alt="" class="w-[120px] rounded-lg">
              <input type="file" id="foto_depan" name="foto_depan" value="{{ $kos->foto_depan }}"
                class="
bg-green-100 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                placeholder="nama kost">
              @error('foto_depan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="foto_dalam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                dalam</label>
              <img src="{{ asset('kosts/' . $kos->foto_dalam) }}" alt="" class="w-[120px] rounded-lg">
              <input type="file" id="foto_dalam" name="foto_dalam" value="{{ $kos->foto_dalam }}"
                class="
bg-green-100 block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500"
                placeholder="nama kost">
              @error('foto_dalam')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>
        <div class="mb-5">
            <div>
                <label for="foto_tambahan" class="text-lg font-semibold text-gray-800">Foto Tambahan</label>
                <div class="flex items-center gap-3">
                    <button type="button" id="foto_tambahan"
                        class="transition duration-300 ease-in-out bg-blue-500 hover:bg-blue-600 text-white px-6 py-1.5 rounded-md focus:outline-none focus:ring focus:border-blue-300"
                        onclick="addField()">+</button>
                    <p class="text-gray-500 text-sm">Tambahkan foto kos sesuai kebutuhan.</p>
                </div>
            </div>
            @error('foto_tambahan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

        </div>
        <br>
        <div class="flex">
          <a href="{{ route('owner.kos') }}"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mr-auto">Kembali</a>
          <button type="submit"
            class="focus:outline-none text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ml-auto">Simpan</button>
        </div>

      </form>

    </div>
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
