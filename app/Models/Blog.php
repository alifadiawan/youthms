<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = ['id_artikel', 'judul', 'tanggal', 'segmen_id', 'isi',];

    public function segmen()
    {
        return $this->belongsTo(Segmen::class);
    }
}
