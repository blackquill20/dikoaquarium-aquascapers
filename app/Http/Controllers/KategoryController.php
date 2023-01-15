<?php

namespace App\Http\Controllers;

use App\Models\WebKategori;
use Illuminate\Http\Request;

class KategoryController extends Controller
{
    public function index(){
        $kategori = WebKategori::all();  
        return view('layouts.add_kategori')->with('kategori',$kategori);
    }

    public function save(Request $req){

        //validate form
        $credentials = $req->validate([
            'name' => ['required','min:3'],
        ]); 


        //create post
        WebKategori::create($credentials);

        //redirect to index
        return redirect()->route('add_kategori')->with(['success' => 'Data Berhasil Disimpan!', 'error' =>'data']);
   
    }
}
