<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\Kos;
use Illuminate\Http\Request;

class DetailKostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Kos $kos)
    {
        $kamars = Kamar::where('kos_id', $kos->id)->get();
        return view('user.detailkost', compact('kos', 'kamars'));
    }

}
