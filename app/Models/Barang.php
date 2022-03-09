<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Alert;

class Barang extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'kode_barang',
        'nama',
        'qty',
        'tanggal',
        'kategori_id',
        'satuan_id',
    ];

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($parent) {
            if ($parent->barangmasuk->count() > 0) {
                Alert::error('Failed', 'Child data has not been deleted');
                return false;
            }
        });
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }
    public function barangmasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'barang_id');
    }
    public function barangkeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'barang_id');
    }
    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'barang_id');
    }
    public function perizinan()
    {
        return $this->hasMany(Perizinan::class, 'barang_id');
    }
    public function transaksi()
    {
        return $this->hasMany('App\Models\Transaksi', 'nama_barang');
    }



    public static function kode()
    {
        $kode = DB::table('barangs')->max('kode_barang');
        $addNol = '';
        $kode = str_replace("BRG", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;

        if (strlen($kode) == 1)
        {
            $addNol = "000";
        }
        else if (strlen($kode) == 2)
        {
            $addNol = "00";
        }
        else if (strlen($kode) == 3)
        {
            $addNol = "0";
        }

        $kodeBaru = "BRG".$addNol.$incrementKode;
        return $kodeBaru;
    }
}
