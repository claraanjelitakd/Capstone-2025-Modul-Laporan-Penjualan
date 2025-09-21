<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriProdukSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            ['kode_kategori_produk' => 'KTG001', 'nama_kategori_produk' => 'Tatah', 'slug' => 'tatah', 'created_at' => now(), 'updated_at' => now()],
            ['kode_kategori_produk' => 'KTG002', 'nama_kategori_produk' => 'Filigeri', 'slug' => 'filigeri', 'created_at' => now(), 'updated_at' => now()],
            ['kode_kategori_produk' => 'KTG003', 'nama_kategori_produk' => 'Wedding Ring', 'slug' => 'wedding-ring', 'created_at' => now(), 'updated_at' => now()],
            ['kode_kategori_produk' => 'KTG004', 'nama_kategori_produk' => 'CIncin Akik', 'slug' => 'cincin-akik', 'created_at' => now(), 'updated_at' => now()],
            ['kode_kategori_produk' => 'KTG005', 'nama_kategori_produk' => 'Aksesoris Manten', 'slug' => 'aksesoris-manten', 'created_at' => now(), 'updated_at' => now()],
            ['kode_kategori_produk' => 'KTG006', 'nama_kategori_produk' => 'Souvenir', 'slug' => 'souvenir', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('kategori_produk')->insert($kategori);
    }
}
