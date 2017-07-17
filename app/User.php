<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'f_name', 's_name', 't_name', 'role_id', 'type_id', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function validation(){
        return [
            'login' => 'required|unique:users',
            'f_name' => 'required',
            's_name' => 'required',
            't_name' => 'required',
            'role_id' => 'required|integer',
            'type_id' => 'required|integer',
            'password' => 'required|min:6|confirmed'
        ];
    }
    
    public function hasRole($role){
        if(Auth::user()->role_id == $role) return true;
        return false;
    }

    public function role(){
        return $this->belongsTo('App\UserRoles', 'role_id', 'id');
    }

    public function type(){
        return $this->belongsTo('App\UserTypes', 'type_id', 'id');
    }


}
