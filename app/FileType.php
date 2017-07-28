<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{
    public $fillable = ['type'];
    public $timestamps = false;
}
