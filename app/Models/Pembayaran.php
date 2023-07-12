<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function request_user()
    {
        return $this->belongsTo(Request_user::class);
    }

    
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function ewallet()
    {
        return $this->belongsTo(Ewallet::class);
    }
}
