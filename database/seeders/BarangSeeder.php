<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            ['nama' => 'Kopi', 'jenis' => 'Konsumsi', 'stok' => 100],
            ['nama' => 'Teh', 'jenis' => 'Konsumsi', 'stok' => 100],
            ['nama' => 'Pasta Gigi', 'jenis' => 'Pembersih', 'stok' => 100],
            ['nama' => 'Sabun Mandi', 'jenis' => 'Pembersih', 'stok' => 100],
            ['nama' => 'Sampo', 'jenis' => 'Pembersih', 'stok' => 100],
        ]);
    }
}
