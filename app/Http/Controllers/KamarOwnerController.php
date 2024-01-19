<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KamarOwnerController extends Controller
{
    //
    public function index(){
        $id = Auth::user()->id;
        $kosts = Kos::where([
            ['owner_id', '=', $id],
            ['status', '=', 'setuju'],
        ])->get();

        return view('owner.kamar', compact('kosts'));
    }

    public function tambah(Kos $kos){
        $kamars = Kamar::where('kos_id', $kos->id)->get();
        return view('owner.kamar_tambah', compact('kos', 'kamars'));
    }

    public function tambahKamar(Kos $kos){
        return view('owner.kamar_tambah_detail', compact('kos'));
    }

    public function tambahKamarProses(Request $request, Kamar $kamar, Kos $kos){
        // dd($request);
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

        $kamar->create([
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
        return redirect()->route('owner.kamar.tambah', $kos);
    }
}
