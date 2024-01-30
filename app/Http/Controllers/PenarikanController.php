<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penarikan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenarikanController extends Controller
{
    //
    public function index()
    {
        $penarikanTransaksi = [];

        foreach (Penarikan::where('user_id', Auth::user()->id)->get() as $penarikan) {
            $penarikanTransaksi[] = [
                'type' => 'penarikan',
                'data' => $penarikan
            ];
        }

        foreach (Transaksi::where('owner_id', Auth::user()->id)->get() as $transaksi) {
            $penarikanTransaksi[] = [
                'type' => 'transaksi',
                'data' => $transaksi
            ];
        }
        return view('owner.withdraw', compact('penarikanTransaksi'));
    }

    public function tambah(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nominal' => 'required',
            'no_rek' => 'required',
            'metode_pembayaran' => 'required|in:BNI,BRI,BCA',
        ], [
            'nominal.required' => 'Nominal wajib diisi.',
            'no_rek.required' => 'Nomor rekening wajib diisi.',
            'metode_pembayaran.required' => 'Metode pembayaran wajib diisi.',
            'metode_pembayaran.in' => 'Metode pembayaran harus salah satu dari: BNI, BRI, BCA.',
        ]);
        try {
            $userid = Auth::user();
            $user = User::find($userid->id);

            if ($user->pendapatan < $request->nominal) {
                return redirect()->back()->with('error', 'Saldo anda tidak mencukupi');
            }

            $user->pendapatan -= $request->nominal;
            $user->save();

            $penarikan = Penarikan::create([
                'user_id' => $user->id,
                'nominal' => $request->nominal,
                'no_rek' => $request->no_rek,
                'metode_pembayaran' => $request->metode_pembayaran
            ]);
            return redirect()->back()->with('success', 'Penarikan Berhasil Di Tambah');
        } catch (\Exception $e) {
            //throw $th;
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
