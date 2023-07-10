<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $guarded = [];

    public function services()
    {
        return $this->belongsTo(Services::class);
        // return $this->belongsTo();
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function hasnocart()
    {
        return !$this->cart;
    }

    public function paket()
    {
        return $this->belongsToMany(Paket::class, 'paket_produk', 'produk_id', 'paket_id');
    }
}
