<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $fillable = ['file', 'file_type_id', 'note'];

    public function type(){
        return $this->belongsTo(FileType::class, 'file_type_id', 'id');
    }
}
