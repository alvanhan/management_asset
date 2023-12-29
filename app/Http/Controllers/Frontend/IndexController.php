<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Transaksi;

class IndexController extends Controller
{
    function index() {
        return view('frontend.homepage');
    }

    function barang() {
        return view('frontend.barang');
    }

    function transaksi() {
        $query = Transaksi::with('barang');

        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('tanggal', [$startDate, $endDate]);
        }

        $result = $query->get()
            ->groupBy('barang.jenis')
            ->map(function ($group) {
                return $group->sum('jumlah');
            })
            ->sortDesc();

        $responseData = [
            'success' => true,
            'message' => 'Data transaksi berhasil diambil'
        ];

        if (count($result) != 0) {
            $jenisTerbesar = $result->keys()->first();
            $jumlahTerbesar = $result->first();
            $jenisTerkecil = $result->keys()->last();
            $jumlahTerkecil = $result->last();

            $responseData += [
                'jenis_terbesar' => $jenisTerbesar,
                'jumlah_terbesar' => $jumlahTerbesar,
                'jenis_terkecil' => $jenisTerkecil,
                'jumlah_terkecil' => $jumlahTerkecil,
            ];

        }else{
            $responseData += [
                'jenis_terbesar' => null,
                'jumlah_terbesar' => null,
                'jenis_terkecil' => null,
                'jumlah_terkecil' => null,
            ];
        }

        return view('frontend.transaksi' , compact('responseData'));
    }
}
