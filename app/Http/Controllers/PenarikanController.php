<?php

namespace App\Http\Controllers;

use App\Models\Penarikan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class PenarikanController extends Controller
{
    //
    public function index(){
        return view('owner.withdraw');
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nominal' => 'required',
            'no_rek' => 'required',
            'metode_pembayaran' => 'required|in:BNI,BRI,BCA',
        ], [
            'user_id.required' => 'ID pengguna wajib diisi.',
            'user_id.exists' => 'ID pengguna tidak ditemukan.',
            'nominal.required' => 'Nominal wajib diisi.',
            'no_rek.required' => 'Nomor rekening wajib diisi.',
            'metode_pembayaran.required' => 'Metode pembayaran wajib diisi.',
            'metode_pembayaran.in' => 'Metode pembayaran harus salah satu dari: BNI, BRI, BCA.',
        ]);

        try {
            //code...
            $user = User::find($request->user_id);

            if ($user->pendapatan < $request->nominal) {
                return response()->json(['error' => 'nominal tidak mencukupi'], 400);
            }

            $user->pendapatan -= $request->nominal;
            $user->save();

            $penarikan = Penarikan::create([
                'user_id' => $user->id,
                'nominal' => $request->nominal,
                'no_rek' => $request->no_rek,
                'metode_pembayaran' => $request->metode_pembayaran
            ]);

            if ($penarikan) {
                return response()->json(['pesan' => 'Penarikan berhasil ditambahkan', 'data' => $penarikan], 200);
            } else {
                return response()->json(['error' => 'Gagal menambahkan penarikan'], 500);
            }
            return response()->json(['pesan' => 'data berhasil ditambahkan'], 200);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
