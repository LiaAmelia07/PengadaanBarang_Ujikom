<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\Barang;
use Illuminate\Http\Request;
use Alert;
class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan = Pengajuan::all();
        return view('permintaan.index', compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = Pengajuan::kode();
        $barang = Barang::all();
        return view('permintaan.create', compact('kode','barang'));
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
            'barang_id' => 'required',
            'qty' => 'required',
            'tanggal' => 'required',
            'perkiraan_biaya' => 'required',
        ]);
        $pengajuan = new Pengajuan();
        $pengajuan->tanggal = $request->tanggal;
        $pengajuan->kode_pengajuan = $request->kode_pengajuan;
        $pengajuan->barang_id = $request->barang_id;
        $pengajuan->qty = $request->qty;
        $pengajuan->perkiraan_biaya = $request->perkiraan_biaya;
        $pengajuan->save();
        Alert::success('Success', 'Data saved successfully');
        return redirect()->route('permintaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kode = Pengajuan::kode();
        $barang = Barang::all();
        $pengajuan = Pengajuan::findOrFail($id);
        return view('permintaan.edit', compact('barang','kode','pengajuan'));
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
        $validated = $request->validate([
            'tanggal' => 'required',
            'barang_id' => 'required',
            'qty' => 'required|numeric',
            'perkiraan_biaya' => 'required|numeric',
        ]);
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->tanggal = $request->tanggal;
        $pengajuan->kode_pengajuan = $request->kode_pengajuan;
        $pengajuan->barang_id = $request->barang_id;
        $pengajuan->qty = $request->qty;
        $pengajuan->perkiraan_biaya = $request->perkiraan_biaya;
        $pengajuan->save();
        Alert::success('Success', 'Data changed successfully');
        return redirect()->route('permintaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Pengajuan::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('permintaan.index');
    }
}
