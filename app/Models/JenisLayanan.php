<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLayanan extends Model
{
    use HasFactory;
    protected $table = 'jenis_layanan';
    protected $guarded = [];

    public function services()
    {
        return $this->hasMany(Services::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
