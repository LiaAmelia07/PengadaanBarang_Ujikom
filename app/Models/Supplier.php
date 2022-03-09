<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;
class Supplier extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'nama_supplier',
        'no_telepon',
        'alamat',
        'harga',
        'ket',
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

    public function barangmasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'supplier_id');
    }
}
