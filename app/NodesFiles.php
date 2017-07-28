<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NodesFiles extends Model
{
    public $timestamps = false;
    public $fillable = ['node_id', 'file_id'];

    public function file(){
        return $this->belongsTo(File::class, 'file_id', 'id');
    }
}
