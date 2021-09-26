<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'image','link','name','alt','status',
    ];

    //get banner
    public static function banner(){
        return Banner::where('status',1)->get();
    }
}
