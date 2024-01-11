<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use Illuminate\Http\Request;

class ApprovalAdminController extends Controller
{
    //
    public function index(){
        $kosts = Kos::all();
        return view('admin.approvaladmin', compact('kosts'));
    }

    public function setuju(Request $request, Kos $kos){
        // dd($kos);
        $kos->update(['status' => 'setuju',]);
        return redirect()->back();
    }

    public function tolak(Request $request, Kos $kos){
        $kos->update(['status' => 'tolak',]);
        return redirect()->back();
    }
}
