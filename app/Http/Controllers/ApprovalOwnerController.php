<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
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
        return redirect()->back()->with('success', 'Kamar Berhasil Di Setujui');
    }
    public function terimaLagi(Kamar $kamar)
    {
        $kamar->update([
            'status' => 'diterima'
        ]);
        return redirect()->back()->with('success', 'Kamar Berhasil Di Setujui');
    }

    public function tolak(Kamar $kamar)
    {
        $kamar->update([
            'status' => 'tolak'
        ]);
        return redirect()->back()->with('success', 'Kamar Berhasil Di Tolak');
    }
}
