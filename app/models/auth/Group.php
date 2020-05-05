<?php

namespace App\models\auth;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group';

    public function services(){
        return $this->belongsToMany(Service::class)->withTimestamps();
    }

    public function users(){
        return $this->hasMany(User::class,'group_id','id');
    }
}
