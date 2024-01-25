<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Http\Request;

class ApprovalAdminController extends Controller
{
    //
    public function index(){
        $kosts = Kos::all();
        $owners = User::where('role', 'owner')->get();
        return view('admin.approvaladmin', compact('kosts', 'owners'));
    }


    public function setuju(Request $request, Kos $kos){
        // dd($kos);
        $kos->update(['status' => 'setuju',]);
        Notifikasi::create([
            'owner_id' => $kos->owner_id,
            'pesan_owner' => 'pengajuan kos telah disetujui'
        ]);
        return redirect()->back()->with('success', 'Kamar Berhasil Di Setujui');
    }

    public function tolak(Request $request, Kos $kos){
        $kos->update(['status' => 'tolak',]);
        Notifikasi::create([
            'owner_id' => $kos->owner_id,
            'pesan_owner' => 'pengajuan kos ditolak'
        ]);
        return redirect()->back()->with('success', 'Kamar Berhasil Di Tolak');
    }
}
