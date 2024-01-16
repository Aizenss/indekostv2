<?php

namespace App\Http\Controllers;

use App\Charts\PendapatanOwnerChart;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //
    public function index(){
        return view('owner.dashboard');
    }
}   
