<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $page_name = "index";
        //feature product
        $feature_product_count = Product::where('is_feature', 'yes')->get()->count();
        $product = Product::where('is_feature', 'yes')->get()->toArray();
        $products = array_chunk($product, 4);
        //latest product
        $latest_products = Product::where('status',1)->latest()->paginate(6);
        return view('front.index', compact('page_name','feature_product_count','products','latest_products'));
    }
}
