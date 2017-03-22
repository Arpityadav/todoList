<?php

namespace Todo;

use Illuminate\Database\Eloquent\Model;
use Todo\User;

class Task extends Model
{
	protected $fillable = ['title', 'body', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);    
    }
}
