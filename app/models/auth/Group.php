<?php

namespace App\models\auth;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group';

    public function services(){
        return $this->belongsToMany(Service::class)->withTimestamps();
    }
}
