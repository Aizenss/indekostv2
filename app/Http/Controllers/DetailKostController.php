<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class DetailKostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Kos $kos)
    {
        return view('user.detailkost', compact('kos'));
    }

}
