<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    public $timestamps = false;
    public $fillable = ['city_id', 'street'];
    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
