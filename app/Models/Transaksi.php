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
        return $this->hasMany(transaksi_detail::class);
    }
}
