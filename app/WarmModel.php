<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarmModel extends Model
{
    public $timestamps = false;
    public $fillable = ['model', 'marka_id'];
    public function marka(){
        return $this->belongsTo('App\WarmMarka', 'marka_id', 'id');
    }
}
