<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'paket_produk', 'paket_id', 'produk_id');
    }
}
