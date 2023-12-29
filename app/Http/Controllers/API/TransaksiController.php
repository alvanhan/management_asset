<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TransaksiController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::with('barang')->get();

        if (count($data) == 0) {
            return $this->sendError('Data transaksi kosong', ['data' => null ], 404);
        }else{
            return $this->sendResponse($data, 'Data transaksi berhasil diambil');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'barang_id' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validasi gagal', $validator->errors(), 404);
        }

        $barang = Barang::where('id', $data['barang_id'])->first();
        if (!$barang) {
            return $this->sendError('Error create data', ["barang_id" => "barang tidak ditemukan"], 404);
        }
        $barang->stok = $barang->stok - $data['jumlah'] <= 0 ? 0 : $barang->stok - $data['jumlah'];
        $barang->save();


        $transaksi = new Transaksi;
        $transaksi->barang_id = $data['barang_id'];
        $transaksi->jumlah = $data['jumlah'];
        $transaksi->tanggal = date_format(date_create($data['tanggal']),"Y/m/d");
        $transaksi->transaksi_type = $data['transaksi_type']  ?? null;
        $transaksi->save();

        return $this->sendResponse($transaksi->toArray(), 'Transaksi berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */


    function addtransaksi() {
        $barang = Barang::all();
        return view('frontend.add_transaksi' , compact('barang'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);
        if ($transaksi) {
            $transaksi->delete();
            return $this->sendResponse($transaksi->toArray(), 'Transaksi berhasil dihapus');
        }else{
            return $this->sendError('transaksi tidak ditemukan', ["nama_transaksi" => "nama transaksi tidak tersedia"], 404);
        }
    }

    function analisis(Request $request) {

        $startDate = date_format(date_create($request['start_date']),"Y/m/d");
        $endDate = date_format(date_create($request['end_date']),"Y/m/d");

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

            return $this->sendResponse($responseData, 'Berhasil mendapatkan data transaksi');
        } else {
            return $this->sendError('Data transaksi kosong', ["data" => null], 404);
        }
    }


}
