<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi')->insert([
            ['barang_id' => 1, 'jumlah' => 10, 'tanggal' => '2021-05-01', 'transaksi_type' => 'Konsumsi'],
            ['barang_id' => 2, 'jumlah' => 19, 'tanggal' => '2021-05-05', 'transaksi_type' => 'Konsumsi'],
            ['barang_id' => 1, 'jumlah' => 15, 'tanggal' => '2021-05-10', 'transaksi_type' => 'Konsumsi'],
            ['barang_id' => 3, 'jumlah' => 20, 'tanggal' => '2021-05-11', 'transaksi_type' => 'Pembersih'],
            ['barang_id' => 4, 'jumlah' => 30, 'tanggal' => '2021-05-11', 'transaksi_type' => 'Pembersih'],
            ['barang_id' => 5, 'jumlah' => 25, 'tanggal' => '2021-05-12', 'transaksi_type' => 'Pembersih'],
            ['barang_id' => 2, 'jumlah' => 5, 'tanggal' => '2021-05-12', 'transaksi_type' => 'Konsumsi'],
        ]);
    }
}
