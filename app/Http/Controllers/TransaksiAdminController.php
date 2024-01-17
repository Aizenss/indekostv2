<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiAdminController extends Controller
{
    //
    public function index(){
        $transaksis = Transaksi::with('kamar')->get();
        return view('admin.transaksiowner', compact('transaksis'));
    }
}
