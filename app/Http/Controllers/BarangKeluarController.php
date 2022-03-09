<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use App\Models\User;
use App\Models\Transaksi;
use Session;
use Illuminate\Http\Request;
use Alert;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keluar = BarangKeluar::all();
        return view('barang-keluar.index', compact('keluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = BarangKeluar::kode();
        $barang = Barang::all();
        $user = User::all();
        return view('barang-keluar.create', compact('kode','barang','user'));
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
            'tanggal_keluar' => 'required',
            'barang_id' => 'required',
            'qty' => 'required',
            'user_id' => 'required',
            'ket' => 'required',
        ]);
        $barang = Barang::findOrfail($request->barang_id);
        if($request->qty <= $barang->stok){
            $request->session()->flash('gagal', 'Stok Kurang!');
            return redirect()->route('barang-keluar.index');
        }
        else{
            $keluar = new BarangKeluar();
            $keluar->kode_barang_keluar = $request->kode_barang_keluar;
            $keluar->tanggal_keluar = $request->tanggal_keluar;
            $keluar->barang_id = $request->barang_id;
            $keluar->qty = $request->qty;
            $keluar->user_id = $request->user_id;
            $keluar->ket = $request->ket;
            $keluar->save();
            $barang->qty -= $request->qty;
            $barang->save();
        }
        Alert::success('Success', 'Data saved successfully');
        return redirect()->route('barang-keluar.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kode = BarangKeluar::kode();
        $keluar = BarangKeluar::findOrFail($id);
        $user = User::all();
        $barang = Barang::all();
        return view('barang-keluar.edit', compact('keluar','barang','kode','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_barang_keluar' => 'required',
            'tanggal_keluar' => 'required',
            'barang_id' => 'required',
            'qty' => 'required',
            'user_id' => 'required',
            'ket' => 'required',
        ]);
        //memanggil data barang masuk yang belum di edit untuk menghitung stok barang ketika di edit
        $old = BarangKeluar::findOrFail($id);

        //mulai edit barang masuk
        $keluar = BarangKeluar::findOrFail($id);
        $barang = Barang::where('id', $keluar->barang_id)->first();
        //mengedit data barang masuk
        $keluar->kode_barang_keluar = $request->kode_barang_keluar;
        $keluar->tanggal_keluar = $request->tanggal_keluar;
        $keluar->barang_id = $request->barang_id;
        $keluar->qty = $request->qty;
        $keluar->user_id = $request->user_id;
        $keluar->ket = $request->ket;
        //menghitung stok barang yang sudah di edit stok nya
        $barang->qty += $old->qty;
        $barang->qty -= $request->qty;
        $barang->save();
        $keluar->save();
        Alert::success('Success', 'Data changed successfully');
        return redirect()->route('barang-keluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keluar = BarangKeluar::findOrFail($id);
        $barang = Barang::where('id',$keluar->barang_id)-> first();
        $barang->qty += $keluar->qty;
        $barang->save();
        $keluar->delete();
        return redirect()->route('barang-keluar.index');

    }
    public function cetakbk()
    {
        $keluar = BarangKeluar::all();
        $pdf   = \PDF::loadView('cetak-laporan.cetak-bk', compact('keluar'));
        return $pdf->download('laporan-barang-keluar.pdf');
    }
}
