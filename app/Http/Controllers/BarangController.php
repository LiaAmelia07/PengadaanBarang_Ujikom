<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Alert;

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
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = Barang::kode();
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        return view('barang.create', compact('kode','kategori','satuan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'kategori_id' => 'required',
            'satuan_id' => 'required',
            'ket' => 'required',
        ]);
        $barang = new Barang();
        $barang->kode_barang = $request->kode_barang;
        $barang->nama = $request->nama;
        $barang->tanggal = $request->tanggal;
        $barang->kategori_id = $request->kategori_id;
        $barang->satuan_id = $request->satuan_id;
        $barang->ket = $request->ket;
        $barang->save();
        Alert::success('Success', 'Data saved successfully');
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kode = Barang::kode();
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        return view('barang.edit', compact('barang','kode','kategori','satuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'kategori_id' => 'required',
            'satuan_id' => 'required',
            'ket' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->kode_barang = $request->kode_barang;
        $barang->nama = $request->nama;
        $barang->tanggal = $request->tanggal;
        $barang->kategori_id = $request->kategori_id;
        $barang->satuan_id = $request->satuan_id;
        $barang->ket = $request->ket;
        $barang->save();
        Alert::success('Success', 'Data changed successfully');
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index');
    }

    public function cetakbrg()
    {
        $barang = Barang::all();
        $pdf   = \PDF::loadview('cetak-laporan.cetak-brg', compact('barang'));
        return $pdf->download('laporan-barang.pdf');
    }
}
