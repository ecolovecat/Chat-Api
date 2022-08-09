<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "groups";
    use HasFactory;
    protected $fillable = [
        'group_name',
    ];

    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function messages() {
        return $this->hasMany(Message::class, "group_id");
    }
}
