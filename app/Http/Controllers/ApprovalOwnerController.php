<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalOwnerController extends Controller
{
    //
    public function index(){
        return view('owner.approval');
    }
}
