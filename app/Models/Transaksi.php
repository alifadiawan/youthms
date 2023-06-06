<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $guarded = [];

    public function member()
    {
        return $this->belongsTo(member::class);
    }

    public function transaksi_detail()
    {
        return $this->hasMany(TransaksiDetail::class);
    }

    public function reuqestuser()
    {
        return $this->hasMany(reuqestuser::class);
    }

    public function pembayaran(Type $var = null)
    {
        return $this->hasOne(pembayaran::class);
    }
}
