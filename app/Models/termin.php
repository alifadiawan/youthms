<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class termin extends Model
{
    use HasFactory;
    protected $guarderd = [];

    public function requser()
    {
        return $this->belongsTo(request_user::class);
    }
}
