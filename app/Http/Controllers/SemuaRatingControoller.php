<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\ulasan;
use Illuminate\Http\Request;

class SemuaRatingControoller extends Controller
{
    public function index (Kos $kos)
    {
       $ulasans = ulasan::where('kost_id', $kos->id)->get();
        return view('user.semuarating', compact('ulasans'));
    }
}
