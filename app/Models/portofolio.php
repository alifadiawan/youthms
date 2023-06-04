<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function portofoliopic()
    {
        return $this->hasMany(PortofolioPic::class);
    }

    public function services()
    {
        return $this->belongsTo(Services::class);
    }
}
