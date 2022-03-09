<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        return response()->json([
            'succes' => true,
            'message' => 'Data Barang',
            'data' => $barang,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new Barang;
        $barang->kode_barang = $request->kode_barang;
        $barang->nama = $request->nama;
        $barang->tanggal = $request->tanggal;
        $barang->kategori_id = $request->kategori_id;
        $barang->satuan_id = $request->satuan_id;
        $barang->ket = $request->ket;
        $barang->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Barang Berhasil dibuat',
            'data' => $barang,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::find($id);
        if($barang){
        return response()->json([
            'success' => true,
            'message' => 'Data Barang ditemukan ',
            'data' => $barang,
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Data Barang tidak ditemukan ',
            'data' => [],
        ], 404);
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        if($barang){
        $barang = Barang::findOrFail($id);
        $barang->kode_barang = $request->kode_barang;
        $barang->nama = $request->nama;
        $barang->tanggal = $request->tanggal;
        $barang->kategori_id = $request->kategori_id;
        $barang->satuan_id = $request->satuan_id;
        $barang->ket = $request->ket;
        $barang->save();
        return response()->json([
            'success' => true,
            'message' => ' Data Barang ditemukan ',
            'data' => $barang,
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Data Barang tidak ditemukan ',
            'data' => [],
        ], 404);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        if($barang){
        $barang->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Barang Berhasil dihapus',
            'data' => $barang,
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Data Barang tidak Berhasil dihapus',
            'data' => [],
        ], 404);
      }
    }
}
