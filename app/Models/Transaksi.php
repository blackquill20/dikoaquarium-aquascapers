<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'transaksi';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'users_id',
        'address',
        'pembayaran',
        'total_harga',
        'total_pengiriman',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    } 
    
    public function barang()
    {
        return $this->hasMany(TransaksiBarang::class, 'transaksi_id', 'id');
    } 
}
