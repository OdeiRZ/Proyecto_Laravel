<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model
{
    protected $fillable = ['conversation_id', 'user_id', 'message'];

    public function user() {
        return $this->belongsTo((User::class));
    }
}
