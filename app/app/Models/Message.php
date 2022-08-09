<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = "messages";
    protected $fillable = [
        'content', 'from', 'is_deleted'
    ];
    public function groups() {
        return $this->belongsTo(Group::class, "group_id");
    }
}
