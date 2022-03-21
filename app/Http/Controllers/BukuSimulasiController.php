<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuSimulasiController extends Controller
{
    public function index(){
        return view('bukusimulasi/index');
    }
}
