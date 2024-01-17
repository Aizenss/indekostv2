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
            'peraturan' => 'required|string|min:3|max:1000',
            'lokasi' => 'required|string|min:3|max:1000',
            'spesifikasi' => 'required|string|min:3|max:1000',
            'fasilitas_umum' => 'required',
            'fasilitas_kamar_mandi' => 'required|string',
            'fasilitas_tempat_parkir' => 'required|string',
            'foto_depan' => 'required|image|mimes:jpeg,jpg,png',
            'foto_dalam' => 'required|image|mimes:jpeg,jpg,png',
            'foto_tambahan' => 'nullable|array',
            'foto_tambahan.*' => 'nullable|image|mimes:jpeg,jpg,png',
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

        return redirect()->route('owner.kos');
    }

    public function ubah($id)
    {
        $kos = Kos::find($id);

        return view('owner.kos_edit', compact('kos'));
    }

    public function ubahProses(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama_kost' => 'required|string|min:3|max:100',
            'ketentuan' => 'required|string|min:3|max:1000',
            'lokasi' => 'required|string|min:3|max:1000',
            'spesifikasi' => 'required|string|min:3|max:1000',
            'fasilitas_umum' => 'required',
            'fasilitas_kamar_mandi' => 'required|string',
            'fasilitas_tempat_parkir' => 'required|string',
            'foto_depan' => 'nullable|image|mimes:jpeg,jpg,png',
            'foto_dalam' => 'nullable|image|mimes:jpeg,jpg,png',
            'foto_tambahan' => 'nullable|array',
            'foto_tambahan.*' => 'nullable|image|mimes:jpeg,jpg,png',
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

        return redirect()->route('owner.kos');
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
