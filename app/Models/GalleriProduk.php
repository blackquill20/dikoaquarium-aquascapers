<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class GalleriProduk extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'galleri_produk';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'produk_id',
        'url',
    ];

    public function getURLAttribute($url)
    {
        return config('app.url') . Storage::url($url);
    }
}
