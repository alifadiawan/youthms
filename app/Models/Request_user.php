<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_user extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class);
    }
}
