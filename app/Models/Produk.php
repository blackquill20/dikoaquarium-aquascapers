<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'produk';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'deskripsi',
        'harga',
        'kategori_id',
        'tags',
    ];

    public function galleri()
    {   
        return $this->hasMany(GalleriProduk::class, 'produk_id', 'id');
    }
    
    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_id', 'id');
    }
}
