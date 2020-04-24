<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Index extends Model
{
    use SoftDeletes;
    protected $table = 'news_showcase';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
