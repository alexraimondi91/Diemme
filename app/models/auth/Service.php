<?php

namespace App\models\auth;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = 'service';

    public function groups(){
        return $this->belongsToMany(Group::class)->withTimestamps();
    }
}
