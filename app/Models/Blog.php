<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = ['id_artikel', 'judul', 'foto', 'visitor', 'segmen_id', 'isi','users_id'];

    public function segmen()
    {
        return $this->belongsTo(Segmen::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
