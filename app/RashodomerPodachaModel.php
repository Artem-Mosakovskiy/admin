<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RashodomerPodachaModel extends Model
{
    public $timestamps = false;
    public $fillable = ['model', 'marka_id'];
    public function marka(){
        return $this->belongsTo('App\RashodomerPodachaMarka', 'marka_id', 'id');
    }
}
