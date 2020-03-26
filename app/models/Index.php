<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    protected $table = 'news_showcase';

    public function user()
    {
        return $this->hasOne('App\User','user_id');
    }
}
