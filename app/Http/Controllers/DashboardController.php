<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $req){
        return view('layouts.app');
    }
    public function produk(Request $req){
        return view('layouts.produk');
    }
}
