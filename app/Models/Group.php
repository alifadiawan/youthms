<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function admin()
    {
        return $this->belongsToMany(User::class, 'group_admins');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'group_members');
    }

    public function group_messages()
    {
        return $this->hasMany(GroupMessage::class);
    }
}
