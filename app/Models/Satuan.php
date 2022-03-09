<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;
class Satuan extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'nama_satuan',
    ];
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($parent) {
            if ($parent->barang->count() > 0) {
                Alert::error('Failed', 'Child data has not been deleted');
                return false;
            }
        });
    }

    public function barang()
    {
        return $this->hasMany(Barang::class, 'satuan_id');
    }
    public function barangmasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'satuan_id');
    }
    public function barangkeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'satuan_id');
    }
}
