<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name', 'status',
    ];

    //getSection
    public static function getSection(){
        $get_section = Section::with('getCategories')->where('status',1)->get();
       return  $get_section = json_decode(json_encode($get_section), true);
    }
    //getCategories
    public function getCategories(){
        return $this->hasMany(Category::class, 'section_id')->where('parent_id', 0)
            ->where('status', 1)->with('subCategory');
    }

}
