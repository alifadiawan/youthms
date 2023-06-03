<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function jenis_layanan()
    {
        return $this->belongsTo(JenisLayanan::class);
    }

    public function portfolio()
    {
        return $his->hasMany(Portofolio::class);
    }
}
