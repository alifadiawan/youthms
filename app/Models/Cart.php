<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $guarded = [];

    public function produk()
    {
        return $this->belongsTo(produk::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
