<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kamar;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tracking;

class HistoryController extends Controller
{
    //
    public function index()
    {
        $userId = auth()->user()->id;
        $historys = Transaksi::where('user_id', $userId)
            ->orWhereHas('kamar', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->get();

        return view('user.history', compact('historys'));
    }

    public function show(Kamar $kamar, Tracking $tracking){
        return view('user.history_detail', compact('kamar', 'tracking'));
    }

    public function owner(){
        $tracking = Tracking::all();
        return view('owner.tracking', compact('tracking'));
    }

    public function showTracking(Tracking $tracking){
        return view('owner.tracking_edit', compact('tracking'));
    }

    public function editTracking(Request $request, Tracking $tracking){
        // dd($request->all());

        $tracking->update([
            'checkin' => $request->checkin,
            'checkout' => $request->checkout,
        ]);

        return redirect()->route('owner.history');
    }
}

