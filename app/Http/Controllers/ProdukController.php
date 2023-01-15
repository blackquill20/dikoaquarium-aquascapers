<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\WebKategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $produk = Produk::with(['kategori']);
        return view('layouts.view_produk')->with(['produk' => $produk]);
    }
    public function produk(){
        $kategori = WebKategori::all();
        return view('layouts.produk')->with(['kategori' => $kategori]);
    }
    public function save(Request $req){
     
        $data = [
            'name' => $req->name,
            'tags' => $req->tags,
            'harga' => $req->harga,
            'deskripsi' => $req->deskripsi,
            'kategori_id' => $req->kategori_id,
        ];
        // dd($data);
        Produk::create($data);
        return redirect()->route('produk');
    }
}
