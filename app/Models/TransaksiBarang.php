<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBarang extends Model
{
    use HasFactory;
    protected $table = 'barang_transaksi';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'users_id',
        'produk_id',
        'transaksi_id',
        'kuantitas',
    ];

    public function produk()
    {
        return $this->hasOne(Produk::class, 'id', 'produk_id');
    }
}
