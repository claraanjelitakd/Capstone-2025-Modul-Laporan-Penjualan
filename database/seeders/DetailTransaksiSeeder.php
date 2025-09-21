<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailTransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $transaksi_ids = DB::table('transaksi')->pluck('id')->toArray();
        $produk_ids = DB::table('produk')->pluck('id')->toArray();

        foreach ($transaksi_ids as $transaksi_id) {
            $jumlah_produk_transaksi = rand(1, count($produk_ids));
            $produk_random = (array) array_rand(array_flip($produk_ids), $jumlah_produk_transaksi);

            $total = 0;
            foreach ($produk_random as $produk_id) {
                $harga = DB::table('produk')->where('id', $produk_id)->value('harga');
                $jumlah = rand(1, 5);
                $subtotal = $harga * $jumlah;

                DB::table('detail_transaksi')->insert([
                    'transaksi_id' => $transaksi_id,
                    'produk_id' => $produk_id,
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $total += $subtotal;
            }

            // update total transaksi setelah semua detail masuk
            DB::table('transaksi')
                ->where('id', $transaksi_id)
                ->update(['total' => $total]);
        }
    }
}
