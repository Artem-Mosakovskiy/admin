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

    public static function addStreet($city_id, $street){
        $count = self::where('street', $street)
            ->where('city_id', $city_id)
            ->count();

        $result = [
            'status' => false,
            'message' => 'Такая улица уже есть'
        ];

        if(!$count){
            $new = new Street();
            $new->city_id = $city_id;
            $new->street = $street;
            $new->save();

            $result['status'] = true;
            $result['object'] = [
                'value' => $new->id,
                'text' => $new->street,
            ];
        }

        return $result;
    }
}
