<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\ReturnTypePass;

class OwnerKosController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $kosts = Kos::with('user')->where('owner_id', $user->id)->get();
        return view('owner.kos', compact('kosts'));
    }

    public function tambah()
    {
        return view('owner.kos_create');
    }

    public function tambahProses(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_kost' => 'required|string|min:3|max:100',
            'ketentuan' => 'required|string|min:3|max:1000',
            'lokasi' => 'required|string|min:3|max:1000',
            'peraturan' => 'required',
            'spesifikasi' => 'required|string|min:3|max:1000',
            'fasilitas_umum' => 'required',
            'fasilitas_kamar_mandi' => 'required|string',
            'fasilitas_tempat_parkir' => 'required|string',
            'foto_depan' => 'required|image|mimes:jpeg,jpg,png',
            'foto_dalam' => 'required|image|mimes:jpeg,jpg,png',
            'foto_tambahan.*' => 'nullable|image|mimes:jpeg,jpg,png',
        ], [
            'peraturan.required' => 'peraturan harus di isi',
            'nama_kost.required' => 'Nama kost harus diisi.',
            'nama_kost.string' => 'Nama kost harus berupa string.',
            'nama_kost.min' => 'Nama kost harus minimal 3 karakter.',
            'nama_kost.max' => 'Nama kost maksimal 100 karakter.',
            'ketentuan.required' => 'Ketentuan harus diisi.',
            'ketentuan.string' => 'Ketentuan harus berupa string.',
            'ketentuan.min' => 'Ketentuan harus minimal 3 karakter.',
            'ketentuan.max' => 'Ketentuan maksimal 1000 karakter.',
            'lokasi.required' => 'Lokasi harus diisi.',
            'lokasi.string' => 'Lokasi harus berupa string.',
            'lokasi.min' => 'Lokasi harus minimal 3 karakter.',
            'lokasi.max' => 'Lokasi maksimal 1000 karakter.',
            'spesifikasi.required' => 'Spesifikasi harus diisi.',
            'spesifikasi.string' => 'Spesifikasi harus berupa string.',
            'spesifikasi.min' => 'Spesifikasi harus minimal 3 karakter.',
            'spesifikasi.max' => 'Spesifikasi maksimal 1000 karakter.',
            'fasilitas_umum.required' => 'Fasilitas umum harus diisi.',
            'fasilitas_kamar_mandi.required' => 'Fasilitas kamar mandi harus diisi.',
            'fasilitas_kamar_mandi.string' => 'Fasilitas kamar mandi harus berupa string.',
            'fasilitas_tempat_parkir.required' => 'Fasilitas tempat parkir harus diisi.',
            'fasilitas_tempat_parkir.string' => 'Fasilitas tempat parkir harus berupa string.',
            'foto_depan.image' => 'Foto depan harus berupa gambar.',
            'foto_depan.required' => 'Foto depan harus diisi.',
            'foto_depan.mimes' => 'Foto depan harus berformat jpeg, jpg, atau png.',
            'foto_dalam.image' => 'Foto dalam harus berupa gambar.',
            'foto_dalam.required' => 'Foto dalam harus diisi.',
            'foto_dalam.mimes' => 'Foto dalam harus berformat jpeg, jpg, atau png.',
            'foto_tambahan.*.image' => 'Foto tambahan harus berupa gambar.',
            'foto_tambahan.*.mimes' => 'Foto tambahan harus berformat jpeg, jpg, atau png.',
        ]);

        $fotodepan = null;
        $fotodalam = null;
        $foto_json = null;

        if ($request->file('foto_depan')) {
            $file = $request->file('foto_depan');
            $fotodepan = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('kosts'), $fotodepan);
        }

        if ($request->file('foto_dalam')) {
            $file = $request->file('foto_dalam');
            $fotodalam = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('kosts'), $fotodalam);
        }

        if ($request->file('foto_tambahan')) {
            $foto_tambahan = [];
            foreach ($request->file('foto_tambahan') as $foto) {
                $fototambahans = date('YmdHi') . $foto->getClientOriginalName();
                $foto->move(public_path('kosts'), $fototambahans);

                $foto_tambahan[] = $fototambahans;
            }
            $foto_json = json_encode($foto_tambahan);
        }

        $result = Kos::create([
            'owner_id' => Auth::user()->id,
            'nama_kost' => $request->nama_kost,
            'ketentuan' => $request->ketentuan,
            'lokasi' => $request->lokasi,
            'peraturan' => $request->peraturan,
            'spesifikasi' => $request->spesifikasi,
            'fasilitas_umum' => $request->fasilitas_umum,
            'fasilitas_kamar_mandi' => $request->fasilitas_kamar_mandi,
            'fasilitas_tempat_parkir' => $request->fasilitas_tempat_parkir,
            'foto_depan' => $fotodepan,
            'foto_dalam' => $fotodalam,
            'foto_tambahan' => $foto_json,
        ]);

        // dd($result);

        return redirect()->route('owner.kos')->with('success', 'Kost ' . $request->nama_kost . ' berhasil ditambahkan');
    }

    public function ubah($id)
    {
        $kos = Kos::find($id);

        return view('owner.kos_edit', compact('kos'));
    }

    public function ubahProses(Request $request, $id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'nama_kost' => 'required|string|min:3|max:100',
            'ketentuan' => 'required|string|min:3|max:1000',
            'lokasi' => 'required|string|min:3|max:1000',
            'spesifikasi' => 'required|string|min:3|max:1000',
            'peraturan' => 'required',
            'fasilitas_umum' => 'required|string',
            'fasilitas_kamar_mandi' => 'required|string',
            'fasilitas_tempat_parkir' => 'required|string',
            'foto_depan' => 'nullable|image|mimes:jpeg,jpg,png',
            'foto_dalam' => 'nullable|image|mimes:jpeg,jpg,png',
            'foto_tambahan.*' => 'nullable|image|mimes:jpeg,jpg,png',
        ], [
            'peraturan.required' => 'peraturan wajib di isi',
            'nama_kost.required' => 'Nama kost wajib diisi.',
            'nama_kost.string' => 'Nama kost harus berupa teks.',
            'nama_kost.min' => 'Nama kost harus memiliki minimal 3 karakter.',
            'nama_kost.max' => 'Nama kost tidak boleh lebih dari 100 karakter.',
            'ketentuan.required' => 'Ketentuan wajib diisi.',
            'ketentuan.string' => 'Ketentuan harus berupa teks.',
            'ketentuan.min' => 'Ketentuan harus memiliki minimal 3 karakter.',
            'ketentuan.max' => 'Ketentuan tidak boleh lebih dari 1000 karakter.',
            'lokasi.required' => 'Lokasi wajib diisi.',
            'lokasi.string' => 'Lokasi harus berupa teks.',
            'lokasi.min' => 'Lokasi harus memiliki minimal 3 karakter.',
            'lokasi.max' => 'Lokasi tidak boleh lebih dari 1000 karakter.',
            'spesifikasi.required' => 'Spesifikasi wajib diisi.',
            'spesifikasi.string' => 'Spesifikasi harus berupa teks.',
            'spesifikasi.min' => 'Spesifikasi harus memiliki minimal 3 karakter.',
            'spesifikasi.max' => 'Spesifikasi tidak boleh lebih dari 1000 karakter.',
            'fasilitas_umum.required' => 'Fasilitas umum wajib diisi.',
            'fasilitas_kamar_mandi.required' => 'Fasilitas kamar mandi wajib diisi.',
            'fasilitas_kamar_mandi.string' => 'Fasilitas kamar mandi harus berupa teks.',
            'fasilitas_tempat_parkir.required' => 'Fasilitas tempat parkir wajib diisi.',
            'fasilitas_tempat_parkir.string' => 'Fasilitas tempat parkir harus berupa teks.',
            'foto_depan.image' => 'Foto depan harus berupa gambar.',
            'foto_depan.mimes' => 'Foto depan harus berformat jpeg, jpg, atau png.',
            'foto_dalam.image' => 'Foto dalam harus berupa gambar.',
            'foto_dalam.mimes' => 'Foto dalam harus berformat jpeg, jpg, atau png.',
            'foto_tambahan.*.image' => 'Semua foto tambahan harus berupa gambar.',
            'foto_tambahan.*.mimes' => 'Semua foto tambahan harus berformat jpeg, jpg, atau png.',
        ]);

        $kos = Kos::find($id);

        $fotodepan = null;
        $fotodalam = null;
        $foto_json = null;

        if ($request->hasFile('foto_depan')) {
            $file = $request->file('foto_depan');
            if ($file->isValid()) {
                $fotodepan = date('YmdHi') . $file->getClientOriginalName();
                $pathFotoLama = public_path('kosts') . '/' . $fotodepan;
                if (file_exists($pathFotoLama)) {
                    unlink($pathFotoLama);
                }
                $file->move(public_path('kosts'), $fotodepan);
            }
        } else {
            $fotodepan = $kos->foto_depan;
        }


        if ($request->file('foto_dalam')) {
            $file = $request->file('foto_dalam');
            if ($file->isValid()) {
                $fotodalam = date('YmdHi') . $file->getClientOriginalName();
                $pathFotoLama = public_path('kosts') . '/' . $fotodalam;
                if (file_exists($pathFotoLama)) {
                    unlink($pathFotoLama);
                }
                $file->move(public_path('kosts'), $fotodalam);
            }
        } else {
            $fotodalam = $kos->foto_dalam;
        }

        if ($request->hasFile('foto_tambahan')) {
            $foto_tambahan = [];

            foreach ($request->file('foto_tambahan') as $foto) {
                // Verifikasi apakah file valid
                if ($foto->isValid()) {
                    $fototambahans = date('YmdHi') . $foto->getClientOriginalName();
                    $foto->move(public_path('kosts'), $fototambahans);

                    $foto_tambahan[] = $fototambahans;
                } else {

                }
            }

            if (!empty($foto_tambahan)) {
                $foto_json = json_encode($foto_tambahan);
            }
        } else {
            $foto_json = $kos->foto_tambahan;
        }


        $kos->update([
            'owner_id' => Auth::user()->id,
            'nama_kost' => $request->nama_kost,
            'ketentuan' => $request->ketentuan,
            'lokasi' => $request->lokasi,
            'spesifikasi' => $request->spesifikasi,
            'fasilitas_umum' => $request->fasilitas_umum,
            'fasilitas_kamar_mandi' => $request->fasilitas_kamar_mandi,
            'fasilitas_tempat_parkir' => $request->fasilitas_tempat_parkir,
            'foto_depan' => $fotodepan,
            'foto_dalam' => $fotodalam,
            'foto_tambahan' => $foto_json,
        ]);

        return redirect()->route('owner.kos')->with('success', 'Kos ' . $kos->nama_kost . ' di ubah');
    }

    public function hapus($id)
    {
        $kos = Kos::find($id);

        // Delete the main images
        $this->hapusGambar($kos->foto_depan);
        $this->hapusGambar($kos->foto_dalam);

        // Delete additional images
        if (!empty($kos->foto_tambahan)) {
            $fotoTambahan = json_decode($kos->foto_tambahan);
            foreach ($fotoTambahan as $foto) {
                $this->hapusGambar($foto);
            }
        }

        // Delete the Kos model
        $kos->delete();

        return redirect()->route('owner.kos');
    }

    // Your existing hapusGambar function
    private function hapusGambar($filename)
    {
        $pathFotoLama = public_path('kosts') . '/' . $filename;
        if (file_exists($pathFotoLama)) {
            unlink($pathFotoLama);
        }
    }
}
