<?php

namespace App;

use App\models\auth\Group;
use App\models\Layout;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_user','surname_user','fiscalCode_user','address_user','country_user', 'email', 'password','active','group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function serviceHave(){
        return Group::find($this->group_id)->services()->get();
    }

    public function layout(){
        return $this->belongsToMany(Layout::class);
    }

    public static function forService(){
        return DB::table('users')
        ->join('group', 'group.id', '=', 'users.group_id')
        ->join('group_service', 'group.id', '=', 'group_service.group_id')
        ->join('service', 'service.id', '=', 'group_service.service_id')
        ->select('service.*')
        ->select('users.*');
    }
}
