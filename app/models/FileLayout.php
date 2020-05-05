<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class FileLayout extends Model
{
    protected $table = 'file_layouts';
    protected $fillable = ['path'];
    public function layouts(){
        return $this->belongsToMany(Layout::class)->withTimestamps();
    }
}
