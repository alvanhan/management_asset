<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\JsonResponse;


class BarangController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::all();

        if (count($data) == 0) {
            return $this->sendError('Data barang kosong', [], 404);
        }else{
            return $this->sendResponse($data, 'Data barang berhasil diambil');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nama_barang' => 'required',
            'jenis' => 'required',
            'stok' => 'required|numeric',
        ]);


        if ($validator->fails()) {
            return $this->sendError('Validasi gagal', $validator->errors(), 404);
        }

        if (Barang::where('nama', $data['nama_barang'])->first()) {
            return $this->sendError('Error create data', ["nama_barang" => "nama barang sudah tersedia"], 500);
        }

        $barang = new Barang;
        $barang->nama = $data['nama_barang'];
        $barang->jenis = $data['jenis'];
        $barang->stok = $data['stok'];
        $barang->save();

        return $this->sendResponse($barang->toArray(), 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */

    public function editbarang(Request $request){

        $data = Barang::where('id', $request->id)->first();
        return view('frontend.edit_barang', compact('data'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'stok' => 'numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validasi gagal', $validator->errors(), 404);
        }

        $barang = Barang::where('id', $id)->first();

        if ($barang) {
            $barang->nama = $data['nama_barang'] ?? $barang->nama;
            $barang->jenis = $data['jenis'] ?? $barang->jenis;
            $barang->stok = $data['stok'] ?? $barang->stok;
            $barang->save();

            return $this->sendResponse($barang->toArray(), 'Barang berhasil diupdate');
        }else{
            return $this->sendError('Barang tidak ditemukan', ["nama_barang" => "nama barang tidak tersedia"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::where('id', $id)->first();
        if ($barang) {
            $barang->delete();

            return $this->sendResponse($barang, 'Barang berhasil dihapus');
        }else{
            return $this->sendError('Barang tidak ditemukan', ["nama_barang" => "nama barang tidak tersedia"], 404);
        }
    }
}
