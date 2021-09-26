<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Session;
class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id','session_id','user_id','qty','size',
    ];

    // get cart data checking with auth or session
    public static function userCartItems(){
        if (Auth::check()){
            $userCartItems = Cart::with('getProduct')->where('user_id',Auth::user()->id)->get()->toArray();
        }else{
            $userCartItems = Cart::with('getProduct')->where('session_id',Session::get('session_id'))->get()->toArray();
        }
        return $userCartItems;
    }

    //get product
    public function getProduct(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    //product attrbute price
    public static function getProductAttr($size, $product_id){
        $priceAttr = ProductAttribute::where('size',$size)->where('product_id',$product_id)->first()->toArray();
        return $priceAttr;
    }

}
