<?php

namespace App;

use App\Http\Controllers\AdminController;
use Illuminate\Database\Eloquent\Model;

class DavlenieNaPodache extends Model
{
    public $fillable = ['device'];
    public $timestamps = false;
}
