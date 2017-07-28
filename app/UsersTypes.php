<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersTypes extends Model
{
    public $table = 'users_types';
    public $timestamps = false;
    public $fillable = ['user_id', 'type_id'];
}
