<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Technology extends Model
{
    use SoftDeletes;
    protected $table = 'technology_showcase';
}
