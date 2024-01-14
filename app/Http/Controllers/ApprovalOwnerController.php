<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class ApprovalOwnerController extends Controller
{
    //
    public function index(){
        $kamars = Kamar::with('kos')->get();
        return view('owner.approval', compact('kamars'));
    }

    public function terima(Kamar $kamar){
        $kamar->update([
            'status' => 'terima'
        ]);
        return redirect()->back();
    }

    public function tolak(Kamar $kamar){
        $kamar->update([
            'status' => 'tolak'
        ]);
        return redirect()->back();
    }
}
