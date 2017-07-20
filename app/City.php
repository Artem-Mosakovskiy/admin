<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $fillable = ['city'];
    public $timestamps = false;

    public static function addCity($city){
        $count = self::where('city', $city)->count();

        $result = [
            'status' => false,
            'message' => 'Такой город уже есть'
        ];

        if(!$count){
            $new = new City;
            $new->city = $city;
            $new->save();

            $result['status'] = true;
            $result['object'] = [
                'value' => $new->id,
                'text' => $new->city,
            ];
        }

        return $result;
    }
}
