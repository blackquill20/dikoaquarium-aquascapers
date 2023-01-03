<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $deskripsi = $request->input('deskripsi');
        $tags = $request->input('tags');
        $kategori = $request->input('kategori');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if($id)
        {
            $produk = Produk::with(['kategori', 'galleri'])->find($id);

            if($produk) {
                return ResponseFormatter::success(
                    $produk,
                    'Data Produk Berhasil Diambil'
                );
            }
            else {
                return ResponseFormatter::error(
                    $produk,
                    'Data Produk Tidak Ada',
                    404
                );
            }
        }
        
        $produk = Produk::with(['kategori', 'galleri']);

        if($name){
            $produk->where('name', 'like', '%' . $name . '%');
        }
        if($deskripsi){
            $produk->where('deskripsi', 'like', '%' . $deskripsi . '%');
        }
        if($tags){
            $produk->where('tags', 'like', '%' . $tags . '%');
        }
        if($price_from){
            $produk->where('price', '>=', $price_from);
        }
        if($price_to){
            $produk->where('price', '<=', $price_to);
        }
        if($kategori){
            $produk->where('kategori', $kategori);
        }

        return ResponseFormatter::success(
            $produk->paginate($limit),
            'Data Produk Berhasil Diambil'
        );
        
}
}