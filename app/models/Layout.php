<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    protected $table = 'layout';

    public function user(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function files(){
        return $this->belongsToMany(FileLayout::class)->withTimestamps();
    }
}
