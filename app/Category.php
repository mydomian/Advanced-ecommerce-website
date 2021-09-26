<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id','section_id','category_name','category_image','category_discount','description','url','meta_title','meta_description','meta_keywords','status','created_at','updated_at'
    ];
    //get subcategory
    public function subCategory(){
       return $this->hasMany(Category::class, 'parent_id')->where('status', 1);
    }
    //section call
    public function getSection(){
        return $this->belongsTo(Section::class, 'section_id')->select('id', 'section_name');
    }
    //parent category call
    public function getParentCategory(){
        return $this->belongsTo(Category::class, 'parent_id')->select('id','category_name');
    }
    //get category details
    public static function catDetails($url){
        $categoryDeatails = Category::with('subCategory')->where('status',1)->where('url',$url)->get()->toArray();
        foreach ($categoryDeatails as $categoryDeatail){
            //for bredcrumb query
            if ($categoryDeatail['parent_id'] == 0){
                //category bredcrumb
                $bredcrumb = '<a href="'.url($categoryDeatail['url']).'">'.$categoryDeatail['category_name'].'</a>';
            }else{
                //subcategory bredcrumb
                $parentCategory = Category::where('id', $categoryDeatail['parent_id'])->first()->toArray();
                $bredcrumb = '<a href="'.url($parentCategory['url']).'">'.$parentCategory['category_name'].'</a> / <a href="'.url($categoryDeatail['url']).'">'.$categoryDeatail['category_name'].'</a>';
            }

            $catId = array();
            $catId[] = $categoryDeatail['id'];
            foreach ($categoryDeatail['sub_category'] as $key=>$value){
                $catId[] = $value['id'];
            }
            return array('catId' => $catId, 'catDetails' => $categoryDeatail, 'bredcrumb' => $bredcrumb);
        }
    }
}
