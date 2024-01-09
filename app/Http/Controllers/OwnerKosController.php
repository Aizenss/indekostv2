<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerKosController extends Controller
{
    //
    public function index(){
        return view('owner.kos');
    }
}
