<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    public $timestamps = false;
    public $fillable = ['city_id', 'street_id', 'house'];

    public function city(){
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function street(){
        return $this->belongsTo(Street::class, 'street_id', 'id');
    }
}
