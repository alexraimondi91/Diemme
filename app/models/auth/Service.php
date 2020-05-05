<?php

namespace App\models\auth;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $table = 'service';

    public function groups(){
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    public function users(){
        return $this->belongsToMany(Group::users());
    }
    public function serviceHave(){
        return Group::find($this->group_id)->services()->get();
    }
}
