<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Barang;
use App\Models\Transaksi;

class ReportController extends Controller
{
    public function index(){
        return view('cetak-laporan.index');
    }

    public function laporan(Request $request){
        $validated = $request->validate([
            'tanggal_awal' => 'required',
            'tanggal_akhir' => 'required',
        ]);
        $start = $request->tanggal_awal;
        $end = $request->tanggal_akhir;

        if($end >= $start){
            if($request->cetak == "masuk"){
                $bm = BarangMasuk::whereBetween('tanggal_masuk', [$start, $end])
                ->get();
                $pdf   = \PDF::loadview('cetak-laporan.cetak-bm', compact('bm','start','end'));
                return $pdf->download('laporan-barang-masuk.pdf');
            }
            elseif($request->cetak == "keluar"){
                $bk = BarangKeluar::whereBetween('tanggal_keluar', [$start, $end])
                ->get();
                $pdf   = \PDF::loadview('cetak-laporan.cetak-bk', compact('bk','start','end'));
                return $pdf->download('laporan-barang-keluar.pdf');
            }
            elseif($request->cetak == "barang"){
                $brg = Barang::whereBetween('tanggal', [$start, $end])
                ->get();
                $pdf   = \PDF::loadview('cetak-laporan.cetak-brg', compact('brg','start','end'));
                return $pdf->download('laporan-data-barang.pdf');
            }
            elseif($request->cetak == "transaksi"){
                $transaksi = Transaksi::whereBetween('tanggal_transaksi', [$start, $end])
                ->get();
                $pdf   = \PDF::loadview('cetak-laporan.cetak-transaksi', compact('transaksi','start','end'));
                return $pdf->download('laporan-riwayat-transaksi.pdf');
            }
        }
        elseif($end < $start){
            $request->session()->flash('gagal', 'Tanggal Akhir Lebih Kecil Dari Tanggal Awal !');
            return redirect()->back();
        }
    }
}
