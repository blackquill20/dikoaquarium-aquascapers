<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\TransaksiBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $status = $request->input('status');

        if($id)
        {
            $transaksi = Transaksi::with(['barangs.produk'])->find($id);

            if($transaksi)
            {
                return ResponseFormatter::success(
                    $transaksi,
                    'Data Transaksi Berhasil Diambil' 
                );
            }
            
            else
            {
                return ResponseFormatter::error(
                    null,
                    'Data Transaksi Tidak Ada',
                    404
                );
            }
        }
        $transaksi = Transaksi::with(['barangs.produk'])->where('users_id', Auth::user()->id);

        if($status)
        {
            $transaksi->where('status', $status);
        }
        
        return ResponseFormatter::success(
            $transaksi->paginate($limit),
            'Data List Transaksi Berhasil diambil'
        );
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'barang' => 'required|array',
            // 'barang.*.id' => 'exist:produk,id',
            'total_harga' => 'required',
            'total_pengiriman' => 'required',
            'status' => 'required|in:PENDING,SUCCESS,CANCELLED,FAILED,SHIPPING,SHIPPED',
        ]);

        $transaksi = Transaksi::create([
            'users_id' => Auth::user()->id,
            'address' => $request->address,
            'total_harga' => $request->total_harga, 
            'total_pengiriman' => $request->total_pengiriman,
            'status' => $request->status,
        ]);

        foreach ($request->barang as $produk) {
            TransaksiBarang::create([
                'users_id' => Auth::user()->id,
                'produk_id' => $produk['id'],
                'transaksi_id' => $transaksi->id,
                'kuantitas' => $produk['kuantitas']
            ]);
        }

        return ResponseFormatter::success($transaksi->load('barang.produk'), 'Transaksi Berhasil');
    }
}
