<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;


class Index extends Model
{
    protected $table = 'news_showcase';

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
