<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiAdminController extends Controller
{
    //
    public function index(){
        return view('admin.transaksiowner');
    }
}
