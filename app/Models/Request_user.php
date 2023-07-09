<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request_user extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class);
    }

    public function termins()
    {
        return $this->hasMany(termin::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(pembayaran::class);
    }

}
