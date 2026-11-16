<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produk";
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'stok',
        'harga',
        'id_kategori'
    ];
    // protected $guarded = ['id'];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }
}
