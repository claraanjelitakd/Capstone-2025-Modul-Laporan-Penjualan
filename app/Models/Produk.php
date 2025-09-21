<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'kode_produk', //primary key
        'kategori_produk_id', //foreign key
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($produk) {
            $slug = \Str::slug($produk->nama_produk);
            $existingSlugCount = self::where('slug', $slug)->count();
            if ($existingSlugCount > 0) {
                $slug .= '-' . ($existingSlugCount + 1);
            }
            $produk->slug = $slug;
        });

        static::updating(function ($produk) {
            $produk->slug = \Str::slug($produk->nama_produk);
        });
    }

    public function kategoriProduk()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_produk_id');
    }

    public function fotoProduk()
    {
        return $this->hasMany(FotoProduk::class, 'produk_id');
    }
    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
