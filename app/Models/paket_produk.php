<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket_produk extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function paket()
    {
        return $this->belongsToMany(paket::class);
    }

    public function produk()
    {
return $this->belongsToMany(produk::class);
    }
}
