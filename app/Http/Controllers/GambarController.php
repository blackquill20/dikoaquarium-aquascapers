<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GambarController extends Controller
{
    public function index (){
        return view('layouts.add_gambar');
    }
}
