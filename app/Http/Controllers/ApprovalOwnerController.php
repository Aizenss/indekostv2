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

    public function tolak(Kamar $kamar, Request $request)
    {
        // dd($request->all());
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

            Notifikasi::create([
                'user_id' => $kamar->user_id,
                'kamar' => $kamar->id,
                'pesan_user' => 'pengajuan sewa ditolak oleh pemilik ' . $request->rejection_reason
            ]);

            $kamar->update([
                'user_id' => null,
                'status' => 'tolak'
            ]);

            return redirect()->back()->with('success', 'Kamar Berhasil Di Tolak');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
