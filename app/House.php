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

    public static function addHouse($city_id, $street_id, $house){
        $count = self::where('house', $house)
            ->where('city_id', $city_id)
            ->where('street_id', $street_id)
            ->count();

        $result = [
            'status' => false,
            'message' => 'Такой дом уже есть'
        ];

        if(!$count){
            $new = new House();
            $new->city_id = $city_id;
            $new->street_id = $street_id;
            $new->house = $house;
            $new->save();

            $result['status'] = true;
            $result['object'] = [
                'value' => $new->id,
                'text' => $new->house,
            ];
        }

        return $result;
    }
}
