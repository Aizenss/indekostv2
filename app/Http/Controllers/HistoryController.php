<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kamar;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
