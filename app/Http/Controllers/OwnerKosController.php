<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;

class OwnerKosController extends Controller
{
    //
    public function index()
    {
        $kosts = Kos::all();
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
            'spesifikasi' => 'required|string|min:3|max:1000',
            'harga' => 'required|numeric|min:1|max:5000000',
            'fasilitas_kamar' => 'required',
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
            'nama_kost' => $request->nama_kost,
            'ketentuan' => $request->ketentuan,
            'lokasi' => $request->lokasi,
            'spesifikasi' => $request->spesifikasi,
            'harga' => $request->harga,
            'fasilitas_kamar' => $request->fasilitas_kamar,
            'fasilitas_kamar_mandi' => $request->fasilitas_kamar_mandi,
            'fasilitas_tempat_parkir' => $request->fasilitas_tempat_parkir,
            'foto_depan' => $fotodepan,
            'foto_dalam' => $fotodalam,
            'foto_tambahan' => $foto_json,
        ]);

        // dd($result);

        return redirect()->route('owner.kos');
    }
}
