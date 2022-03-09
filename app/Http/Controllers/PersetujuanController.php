<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Alert;
class PersetujuanController extends Controller
{
    public function index(){
        $pengajuan = Pengajuan::all();
        return view('persetujuan.index',compact('pengajuan'));
    }
    public function persetujuan(Request $request){
        $request->validate([
            'kode_pengajuan'=>'required'
        ]);
        $kode_pengajuan = $request->kode_pengajuan;
        $cek = Pengajuan::where('kode_pengajuan', $kode_pengajuan)->count();
        if($cek > 0){
            Pengajuan::where('kode_pengajuan', $kode_pengajuan)->update(['status'=>1]);
            Alert::success('Success', 'Data saved successfully');
        }
        else{
            Alert::error('Failed', 'Failed to do approval!');
        }
        return redirect()->back();
    }
}
