<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Http\Request;

class ApprovalAdminController extends Controller
{
    //
    public function index()
    {
        $kosts = Kos::all();
        $owners = User::where('role', 'owner')->get();
        return view('admin.approvaladmin', compact('kosts', 'owners'));
    }


    public function setuju(Request $request, Kos $kos)
    {
        // dd($kos);
        $kos->update(['status' => 'setuju',]);
        Notifikasi::create([
            'owner_id' => $kos->owner_id,
            'pesan_owner' => 'pengajuan kos telah disetujui'
        ]);
        return redirect()->back()->with('success', 'Kos Berhasil Di Setujui');
    }

    public function tolak(Request $request, Kos $kos)
    {

        try {
            $request->validate(
                [
                    'rejection_reason' => 'required|min:20|max:255|string',
                ],
                [
                    'rejection_reason.min' => 'Minimal 20 karakter',
                    'rejection_reason.max' => 'Maksimal 255 karakter',
                    'rejection_reason.required' => 'Kolom harus diisi',
                    'rejection_reason.string' => 'Kolom harus berupa string',
                ]
            );
            $kos->update(['status' => 'tolak',]);
            Notifikasi::create([
                'owner_id' => $kos->owner_id,
                'pesan_owner' => 'pengajuan kos ditolak ' . $request->rejection_reason
            ]);
            return redirect()->back()->with('success', 'Kamar Berhasil Di Tolak');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
