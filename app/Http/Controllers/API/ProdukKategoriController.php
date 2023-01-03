<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Helpers\ResponseFormatter;

class ProdukKategoriController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('name');

        $show_produk = $request->input('show_produk');

        if($id)
        {
            $kategori = KategoriProduk::with(['kategori'])->find($id);

            if($kategori) {
                return ResponseFormatter::success(
                    $kategori,
                    'Data Kategori Berhasil Diambil'
                );
            }
            else {
                return ResponseFormatter::error(
                    $kategori,
                    'Data Kategori Tidak Ada',
                    404
                );
            }
        }
        $kategori = KategoriProduk::query();

        if($name){
            $kategori->where('name', 'like', '%' . $name . '%');
        }
        if($show_produk){
            $kategori->with('produk');
        }

        return ResponseFormatter::success(
            $kategori->paginate($limit),
            'Data Kategori Berhasil Diambil'
        );
    }
}
