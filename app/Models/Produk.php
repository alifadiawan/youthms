<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $guarded = [];

    public function jenis_layanan()
    {
        return $this->belongsTo(JenisLayanan::class);
    }

    public function jenis_services()
    {
        return $this->belongsTo(Services::class);
    }
}
