<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';

    protected $fillable = ['id','subject'];

    public function users()
    {
        return $this->belongsToMany(User::class,'messages','id_chat', 'id_user' )->withPivot('body','path')->withTimestamps();
    }
    
}
