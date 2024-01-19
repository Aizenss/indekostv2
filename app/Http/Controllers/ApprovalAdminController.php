<?php

namespace App\Http\Controllers;

use App\Models\Kos;
use App\Models\User;
use Illuminate\Http\Request;

class ApprovalAdminController extends Controller
{
    //
    public function index(){
        $kosts = Kos::all();
        $owners = User::where('role', 'owner')->get();
        return view('admin.approvaladmin', compact('kosts', 'owners'));
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
