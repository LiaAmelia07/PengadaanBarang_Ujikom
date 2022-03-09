<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;
class Transaksi extends Model
{
    use HasFactory;
    public function barang()
    {
        return $this->belongsTo('App\Models\Barang', 'nama_barang');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'pelaku');
    }

    // public static function boot()
    // {
    //     parent::boot();
    //     self::deleting(function ($parent) {
    //         if ($parent->barang->count() > 0) {
    //             Alert::error('Failed', 'Child data has not been deleted');
    //             return false;
    //         }
    //     });
    // }

}

