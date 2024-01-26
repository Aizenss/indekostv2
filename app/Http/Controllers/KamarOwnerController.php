<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KamarOwnerController extends Controller
{
    //
    public function index()
    {
        $id = Auth::user()->id;
        $kosts = Kos::where([
            ['owner_id', '=', $id],
            ['status', '=', 'setuju'],
        ])->get();

        return view('owner.kamar', compact('kosts'));
    }

    public function tambah(Kos $kos)
    {
        $kamars = Kamar::where('kos_id', $kos->id)->get();
        return view('owner.kamar_tambah', compact('kos', 'kamars'));
    }

    public function tambahKamar(Kos $kos)
    {
        return view('owner.kamar_tambah_detail', compact('kos'));
    }

    public function tambahKamarProses(Request $request, Kamar $kamar, Kos $kos)
    {
        // dd($request);
        $validatedData = $request->validate([
            'nama_kamar' => 'required|max:255',
            'kamar_mandi' => 'required|string',
            'peraturan_kamar' => 'required|max:1000',
            'kapasitas' => 'required|numeric|min:1',
            'harga' => 'required|numeric|min:0',
            'night' => 'required|numeric|between:1,12',
            'foto_kamar' => 'required|array',
            'foto_kamar.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ], [
            'nama_kamar.required' => 'Nama kamar harus diisi.',
            'nama_kamar.max' => 'Nama kamar tidak boleh lebih dari 255 karakter.',
            'kamar_mandi.required' => 'Status kamar mandi harus diisi.',
            'kamar_mandi.string' => 'Status kamar mandi harus berupa string.',
            'peraturan_kamar.required' => 'Peraturan kamar harus diisi.',
            'peraturan_kamar.max' => 'Peraturan kamar tidak boleh lebih dari 1000 karakter.',
            'kapasitas.required' => 'Kapasitas kamar harus diisi.',
            'kapasitas.numeric' => 'Kapasitas kamar harus berupa angka.',
            'kapasitas.min' => 'Kapasitas kamar minimal adalah 1.',
            'harga.required' => 'Harga kamar harus diisi.',
            'harga.numeric' => 'Harga kamar harus berupa angka.',
            'harga.min' => 'Harga kamar tidak boleh kurang dari 0.',
            'night.required' => 'Durasi sewa per malam harus diisi.',
            'night.numeric' => 'Durasi sewa per malam harus berupa angka.',
            'night.between' => 'Durasi sewa per malam harus antara 1 sampai 12.',
            'foto_kamar.required' => 'Foto kamar harus diisi.',
            'foto_kamar.array' => 'Foto kamar harus berupa sebuah array.',
            'foto_kamar.*.image' => 'Foto kamar harus berupa gambar.',
            'foto_kamar.*.mimes' => 'Foto kamar harus berupa file dengan tipe: jpeg, png, jpg, gif, atau svg.',
            'foto_kamar.*.max' => 'Ukuran foto kamar tidak boleh lebih dari 2MB.',
        ]);

        $foto_json = null;

        if ($request->file('foto_kamar')) {
            $foto_kamar = [];
            foreach ($request->file('foto_kamar') as $foto) {
                $fototambahans = date('YmdHi') . $foto->getClientOriginalName();
                $foto->move(public_path('kamar'), $fototambahans);

                $foto_kamar[] = $fototambahans;
            }
            $foto_json = json_encode($foto_kamar);
        }

        $result = $kamar->create([
            'kos_id' => $kos->id,
            'nama_kamar' => $request->nama_kamar,
            'fasilitas' => $request->tags,
            'kamar_mandi' => $request->kamar_mandi,
            'peraturan_kamar' => $request->peraturan_kamar,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
            'night' => $request->night,
            'foto_kamar' => $foto_json
        ]);

        // dd($result);
        return redirect()->route('owner.kamar.tambah', $kos)->with('success', 'Kamar ' . $request->nama_kamar . ' ditambahkan');
    }

    public function status(Request $request, Kamar $kamar,)
    {
        if ($kamar->status == 'kosong') {
            $kamar->update([
                'status' => 'mati'
            ]);
        } elseif ($kamar->status == 'paid') {
        } else {
            $kamar->update([
                'status' => 'kosong'
            ]);
        }

        return redirect()->back();
    }

    public function hapus(Kamar $kamar)
    {
        if ($kamar->status != 'paid') {
            $kamar->delete();
            return redirect()->route('owner.kamar')->with('success', 'Kamar ' . $kamar->nama_kamar . ' di hapus');
        } else {
            return redirect()->route('owner.kamar')->with('error', 'Kamar ' . $kamar->nama_kamar . ' tidak di hapus');
        }
    }

    public function ubah($kos, $kamar)
    {
        // You can use $kos and $kamar directly here
        $kos = Kos::find($kos);
        $kamar = Kamar::find($kamar);

        // Add any additional logic as needed

        return view('owner.kamar_edit', compact('kamar', 'kos'));
    }


    public function ubahproses($kos, $kamar, Request  $request)
    {

        $request->validate([
            'nama_kamar' => 'required|string',
            'kamar_mandi' => 'required|string',
            'peraturan_kamar' => 'required|string',
            'kapasitas' => 'required|integer',
            'harga' => 'required|numeric',
            'night' => 'required|integer',
            'foto_kamar' => 'nullable|array'
        ], [
            'nama_kamar.required' => 'Nama kamar wajib diisi.',
            'nama_kamar.string' => 'Format nama kamar harus berupa teks.',
            'kamar_mandi.required' => 'Keterangan kamar mandi wajib diisi.',
            'kamar_mandi.string' => 'Format keterangan kamar mandi harus berupa teks.',
            'peraturan_kamar.required' => 'Peraturan kamar wajib diisi.',
            'peraturan_kamar.string' => 'Format peraturan kamar harus berupa teks.',
            'kapasitas.required' => 'Kapasitas kamar wajib diisi.',
            'kapasitas.integer' => 'Kapasitas kamar harus berupa angka.',
            'harga.required' => 'Harga kamar wajib diisi.',
            'harga.numeric' => 'Harga kamar harus berupa angka.',
            'night.required' => 'Jumlah malam menginap wajib diisi.',
            'night.integer' => 'Jumlah malam menginap harus berupa angka.',
        ]);


        $kos = Kos::find($kos);
        $kamar = Kamar::find($kamar);

        if ($request->file('foto_kamar')) {
            $foto_kamar = [];
            foreach ($request->file('foto_kamar') as $foto) {
                $fototambahans = date('YmdHi') . $foto->getClientOriginalName();
                $foto->move(public_path('kamar'), $fototambahans);

                $foto_kamar[] = $fototambahans;
            }
            $foto_json = json_encode($foto_kamar);
        } else {
            $foto_json = $kamar->foto_kamar;
        }


        $kamar->update([
            'kos_id' => $kos->id,
            'nama_kamar' => $request->nama_kamar,
            'fasilitas' => $request->tags,
            'kamar_mandi' => $request->kamar_mandi,
            'peraturan_kamar' => $request->peraturan_kamar,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
            'night' => $request->night,
            'foto_kamar' => $foto_json
        ]);

        return redirect()->route('owner.kamar.tambah', ['kos' => $kos->id])->with('success', 'Kamar ' . $kamar->nama_kamar . ' diperbarui.');
    }
}
