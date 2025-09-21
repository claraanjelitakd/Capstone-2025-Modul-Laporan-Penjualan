<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produk = [
            [
                'kode_produk' => 'PRD005',
                'kategori_produk_id' => 3,
                'nama_produk' => 'Cincin kawin berlian',
                'deskripsi' => 'Terbuat dari berlian murni',
                'harga' => 20000000,
                'stok' => 2,
                'slug' => 'cincin-kawin-berlian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_produk' => 'PRD006',
                'kategori_produk_id' => 5,
                'nama_produk' => 'Kalung Emas',
                'deskripsi' => 'Terbuat dari 10 gram emas  24 karat',
                'harga' => 25000000,
                'stok' => 2,
                'slug' => 'kalung-emas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_produk' => 'PRD001',
                'kategori_produk_id' => 3,
                'nama_produk' => 'Cincin Berlian',
                'deskripsi' => 'Terbuat dari berlian murni',
                'harga' => 90000000,
                'stok' => 1,
                'slug' => 'cincin-berlian',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('produk')->insert($produk);
    }
}
