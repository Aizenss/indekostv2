<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Midtrans\Snap;
use App\Models\Kos;
use App\Models\User;
use Midtrans\Config;
use App\Models\Kamar;
use App\Models\Notifikasi;
use App\Models\Tracking;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function index()
    {
        $kamars = Kamar::where('user_id', Auth::user()->id)
            ->where('status', 'terima')
            ->get();

        $kamarslagi = Kamar::where('user_id', Auth::user()->id)
            ->where('status', 'diterima')
            ->get();
        return view('user.payment', compact('kamars', 'kamarslagi'));
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

        Notifikasi::create([
            'user_id' => $kamar->user_id,
            'owner_id' => $kamar->kos->owner_id,
            'kamar' => $kamar->id,
            'pesan_user' => 'penyewaan anda sedang diproses',
            'pesan_owner' => 'ada penyewaan kamar segera berikan tindakan'
        ]);

        // $kamar->save();
        return redirect()->route('payment')->with('success', 'Silahkan lakukan pembayaran');
    }
    public function payAgain(Request $request, Kos $kos, Kamar $kamar)
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
            'status' => 'menambah waktu',
            'snap_token' => $snapToken
        ]);

        Notifikasi::create([
            'user_id' => $kamar->user_id,
            'owner_id' => $kamar->kos->owner_id,
            'kamar' => $kamar->id,
            'pesan_user' => 'penambahan waktu sedang diproses',
            'pesan_owner' => 'ada pengajuan penambahan waktu kamar segera berikan tindakan'
        ]);

        // $kamar->save();
        return redirect()->back()->with('success', 'Silahkan lakukan pembayaran');
    }

    public function batal(Kamar $kamar, Request $request)
    {
        // dd($request->all());
        try {
            $request->validate(
                [
                    'rejection_reason' => 'required|max:255|string|min:10',
                ],
                [
                    'rejection_reason.max' => 'Maksimal 255 karakter',
                    'rejection_reason.required' => 'Kolom harus diisi',
                    'rejection_reason.string' => 'Kolom harus berupa string',
                    'rejection_reason.min' => 'Minimal 10 karakter',
                ]
            );

            // dd($kamar->kos->owner_id);
            Notifikasi::create([
                'user_id' => Auth::user()->id,
                'owner_id' => $kamar->kos->owner_id,
                'kamar' => $kamar->id,
                'pesan_user' => 'penyewaan telah dibatalkan',
                'pesan_owner' => 'sewa kamar telah dibatalkan oleh pembeli karena ' . $request->rejection_reason
            ]);

            $kamar->update([
                'user_id' => null,
                'snap_token' => null,
                'status' => 'kosong',
            ]);


            return redirect()->back()->with('success', 'Pembayaran Berhasil Di Batalkan');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function batalLagi(Kamar $kamar, Request $request)
    {
        try {
            $request->validate(
                [
                    'rejection_reason' => 'required|max:255|string|min:10',
                ],
                [
                    'rejection_reason.max' => 'Maksimal 255 karakter',
                    'rejection_reason.required' => 'Kolom harus diisi',
                    'rejection_reason.string' => 'Kolom harus berupa string',
                    'rejection_reason.min' => 'Minimal 10 karakter',
                ]
            );
            $kamar->update([
                'user_id' => null,
                'snap_token' => null,
                'status' => $kamar->status,
            ]);

            Notifikasi::create([
                'user_id' => $kamar->user_id,
                'owner_id' => $kamar->kos->owner_id,
                'kamar' => $kamar->id,
                'pesan_user' => 'penyewaan telah dibatalkan',
                'pesan_owner' => 'sewa kamar telah dibatalkan oleh pembeli Karena ' . $request->rejection_reason
            ]);

            return redirect()->back()->with('success', 'Pembayaran Berhasil Di Batalkan');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', $th->getMessage());
        }
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

        $startDate = Carbon::now();
        $endDate = Carbon::now();

        if ($kamar->status == 'paid') {
            $monthsToAdd = $kamar->night; // Assuming 'night' field contains the number of months
            if ($monthsToAdd >= 1 && $monthsToAdd <= 12) {
                $endDate = $startDate->copy()->addMonthsNoOverflow($monthsToAdd);
            } else {
                throw new Exception('Invalid value for night field.');
            }
        }

        $transaksi = Transaksi::create([
            'kamar_id' => $kamar->id,
            'owner_id' =>  $kamar->kos->owner_id,
            'user_id' =>  auth()->user()->id,
            'nominal_owner' =>  $owner,
            'nominal_admin' =>  $admin,
        ]);
        $tracking = Tracking::create([
            'kamar_id' => $kamar->id,
            'user_id' =>  auth()->user()->id,
            'checkin' =>  $startDate,
            'checkout' =>  $endDate
        ]);

        Notifikasi::create([
            'user_id' => auth()->user()->id,
            'owner_id' => $kamar->kos->owner_id,
            'kamar' => $kamar->id,
            'pesan_user' => 'Kamar Berhasil di bayar!',
            'pesan_owner' => 'Pembayaran telah selesai di proses oleh ' . auth()->user()->name
        ]);


        // User::where('id', 1)->update(['pendapatan' => $admin]);
        // return response()->json(['message' => 'Data berhasil diproses']);

        return redirect()->route('user.kamarkami')->with('success', 'Pembayaran Berhasil Di Proses');
    }

    public function prosesLagi(Request $request, Kamar $kamar)
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

        $transaksi = Transaksi::updateOrCreate(
            [
                'kamar_id' => $kamar->id,
                'owner_id' => $kamar->kos->owner_id,
                'user_id' => auth()->user()->id,
            ],
            [
                'nominal_owner' => $owner,
                'nominal_admin' => $admin,
            ]
        );

        $startDate = Carbon::now();
        $endDateValue = Tracking::where('kamar_id', $kamar->id)->latest()->value('checkout');
        $endDate = $endDateValue ? new Carbon($endDateValue) : $startDate;

        if ($kamar->status == 'paid') {
            $monthsToAdd = $kamar->night; // Assuming 'night' field contains the number of months
            if ($monthsToAdd >= 1 && $monthsToAdd <= 12) {
                $endDate = $endDate->addMonthsNoOverflow($monthsToAdd);
            } else {
                throw new Exception('Invalid value for night field.');
            }
        }

        $tracking = Tracking::where('kamar_id', $kamar->id)->first();
        $tracking->update([
            'user_id' => auth()->user()->id,
            'checkin' => $startDate,
            'checkout' => $endDate
        ]);
        Notifikasi::create([
            'user_id' => auth()->user()->id,
            'owner_id' => $kamar->kos->owner_id,
            'kamar' => $kamar->id,
            'pesan_user' => 'Kamar Berhasil di bayar!',
            'pesan_owner' => 'Pembayaran telah selesai di proses oleh ' . auth()->user()->name
        ]);
        // User::where('id', 1)->update(['pendapatan' => $admin]);
        // return response()->json(['message' => 'Data berhasil diproses']);
        return redirect()->route('user.kamarkami')->with('success', 'Pembayaran Berhasil Di Proses');
    }
}
