<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Kamar;
use App\Models\Kos;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function index()
    {
        $kamars = Kamar::where('user_id', Auth::user()->id)->get();
        return view('user.payment', compact('kamars'));
    }
    //
    public function pay(Request $request, Kos $kos, Kamar $kamar)
    {
        // dd($kamar);
        // Set your Merchant Server Key
        Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $kamar->harga,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ),
        );

        $snapToken = Snap::getSnapToken($params);
        $kamar->update([
            'user_id' => Auth::user()->id,
            'status' => 'dipesan',
            'snap_token' => $snapToken
        ]);

        // $kamar->save();
        return redirect()->back();
    }

    public function batal(Kamar $kamar)
    {
        $kamar->update([
            'user_id' => null,
            'snap_token' => null,
            'status' => 'kosong',
        ]);
        return redirect()->back();
    }

    public function proses(Request $request, Kamar $kamar)
    {
        // dd($request->all());
        $data = $request->input('data');
        $kamar->update([
            'result' => $data,
            'status' => 'paid',
        ]);

        $grossAmount = $data['gross_amount'];

        // Menghitung bagiannya
        $ownerPercentage = 95;
        $adminPercentage = 100 - $ownerPercentage;

        $owner = ($ownerPercentage / 100) * $grossAmount;
        $admin = ($adminPercentage / 100) * $grossAmount;

        // dd($owner, $kamar->kos->owner_id);
        $owners = User::where('id', $kamar->kos->owner_id)->first();
        $owners->increment('pendapatan', $owner);

        $admins = User::where('id', 1)->first();
        $admins->increment('pendapatan', $admin);

        $transaksi = Transaksi::create([
            'kamar_id' => $kamar->id,
            'owner_id' =>  $kamar->kos->owner_id,
            'nominal_owner' =>  $owner,
            'nominal_admin' =>  $admin
        ]);
        // User::where('id', 1)->update(['pendapatan' => $admin]);

        // return response()->json(['message' => 'Data berhasil diproses']);
        return redirect()->route('user.kamarkami');
    }
}
