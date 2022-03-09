<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;
class Kategori extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'kategori',
        'ket',
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }

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
}
