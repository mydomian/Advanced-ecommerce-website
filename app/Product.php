<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use App\ProductAttribute;
class Product extends Model
{
    protected $fillable = [
        'section_id', 'category_id','brand_id', 'product_name','product_code','product_color','product_price','product_weight','product_discount',
        'main_image','product_video','description','wash_care','fabric','pattern','sleeve','fit','occasion','meta_title','meta_keywords',
        'meta_description','is_feature','status',
    ];

    //getCategory
    public function getCategory(){
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'category_name','url');
    }
    //getSection
    public function getSection(){
        return $this->belongsTo(Section::class, 'section_id')->select('id', 'section_name');
    }
    //getBrand
    public function getBrand(){
        return $this->belongsTo(Brand::class, 'brand_id')->select('id', 'name');
    }
    //getAttribute
    public function attribute(){
        return $this->hasMany(ProductAttribute::class);
    }
    //getImage
    public function images(){
        return $this->hasMany(ProductImage::class);
    }
    //product filter
    public static function productFilter(){
        $productFilter['fabricArray'] = array('Poleaster', 'Coton', 'Merble', 'fiber');
        $productFilter['sleeveArray'] = array('Sleeveless', 'Short Sleeve', 'Half Sleeve', 'Full Sleeve');
        $productFilter['fitArray'] = array('Slim', 'Regular', 'Medium', 'Large');
        $productFilter['patternArray'] = array('Check', 'Plan', 'Solid', 'Printed');
        $productFilter['occasionArray'] = array('Casual', 'Formal', 'Regular');
        return $productFilter;
    }
    //product discount
    public static function productDiscount($id,$product_discount){
        $product_details = Product::select('product_price','product_discount','category_id')->where('id',$id)->where('product_discount',$product_discount)->first()->toArray();
        $category_details = Category::select('category_discount')->where('id',$product_details['category_id'])->first()->toArray();

        if ($product_details['product_discount']>0){
            $discounted_price = $product_details['product_price'] - ($product_details['product_price']*$product_details['product_discount']/100);
        }elseif ($category_details['category_discount']>0){
            $discounted_price = $product_details['product_price'] - ($product_details['product_price']*$category_details['category_discount']/100);

        }else{
            $discounted_price = 0;
        }
        return $discounted_price;
    }
    //product discount with attribute
    public static function getDisAtrrPrice($size,$product_id){
        $proAttrprice = ProductAttribute::where('product_id',$product_id)->where('size',$size)->first()->toArray();
        $product_details = Product::select('product_discount','category_id')->where('id',$product_id)->first()->toArray();
        $category_details = Category::select('category_discount')->where('id',$product_details['category_id'])->first()->toArray();

        if ($product_details['product_discount']>0){
            $discounted_price = $proAttrprice['price'] - ($proAttrprice['price']*$product_details['product_discount']/100);
            $discount = $proAttrprice['price'] - $discounted_price;
        }elseif ($category_details['category_discount']>0){
            $discounted_price = $proAttrprice['price'] - ($proAttrprice['price']*$category_details['category_discount']/100);
            $discount = $proAttrprice['price'] - $discounted_price;

        }else{
            $discount = 0;
            $discounted_price = 0;
        }
        return array('product_price'=>$proAttrprice['price'],'discounted_price'=>$discounted_price,'discount'=>$discount);
    }
}
