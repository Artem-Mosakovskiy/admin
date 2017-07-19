<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RashodomerObrabotkaModel extends Model
{
    public $timestamps = false;
    public $fillable = ['model', 'marka_id'];
    public function marka(){
        return $this->belongsTo('App\RashodomerObrabotkaMarka', 'marka_id', 'id');
    }
}
