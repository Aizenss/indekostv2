<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class ApprovalOwnerController extends Controller
{
    //
    public function index()
    {
        $kamars = Kamar::with('kos')
            ->whereIn('status', ['dipesan', 'menambah waktu'])
            ->get();
        return view('owner.approval', compact('kamars'));
    }

    public function terima(Kamar $kamar)
    {
        $kamar->update([
            'status' => 'terima'
        ]);

        Notifikasi::create([
            'user_id' => $kamar->user_id,
            'kamar' => $kamar->id,
            'pesan' => 'penyewaan diterima'
        ]);
        return redirect()->back()->with('success', 'Kamar Berhasil Di Setujui');
    }
    public function terimaLagi(Kamar $kamar)
    {
        $kamar->update([
            'status' => 'diterima'
        ]);

        Notifikasi::create([
            'user_id' => $kamar->kos->user_id,
            'kamar' => $kamar->id,
            'pesan' => 'penambahan waktu sewa diterima'
        ]);
        return redirect()->back()->with('success', 'Kamar Berhasil Di Setujui');
    }

    public function tolak(Kamar $kamar)
    {
        $kamar->update([
            'status' => 'tolak'
        ]);

        Notifikasi::create([
            'user_id' => $kamar->kos->user_id,
            'kamar' => $kamar->id,
            'pesan' => 'pengajuan sewa ditolak oleh pemilik'
        ]);
        return redirect()->back()->with('success', 'Kamar Berhasil Di Tolak');
    }
}
