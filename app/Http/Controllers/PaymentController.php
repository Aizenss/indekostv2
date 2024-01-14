<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Kamar;
use App\Models\Kos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                'order_id' => $request->nomor_kamar . rand(),
                'gross_amount' => $request->harga,
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
        $data = $request->input('data');
        $kamar->update([
            'result' => $data,
            'status' => 'paid',
        ]);

        $admin = $data['gross_amount'];
        $owner = $data['gross_amount'];



        // dd($owner, $kamar->kos->owner_id);
        User::where('id', $kamar->kos->owner_id)->increment('pendapatan', $owner);
        User::where('id', 1)->increment('pendapatan', $admin);
        // User::where('id', 1)->update(['pendapatan' => $admin]);

        return response()->json(['message' => 'Data berhasil diproses']);
    }
}
