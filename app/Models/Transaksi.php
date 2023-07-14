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
        return $this->belongsTo(Member::class);
    }

    public function transaksi_detail()
    {
        return $this->hasMany(TransaksiDetail::class);
    }

    public function request_user()
    {
        return $this->hasMany(Request_user::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
