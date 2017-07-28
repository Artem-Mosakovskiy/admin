<?php

namespace App\Helpers;

class Helpers
{
    public static function isImg($path){
        $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/bmp','image/svg+xml'];
        $contentType = \GuzzleHttp\Psr7\mimetype_from_filename(url($path));

        if(! in_array($contentType, $allowedMimeTypes) ){
            return false;
        }
        return true;
    }
}