<?php

namespace App\Http\Controllers\Front;

use http\Env\Response;
use Illuminate\Support\Facades\View;
use App\Cart;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Session;
class ProductsController extends Controller
{
    public function listing(Request $request){

        if ($request->ajax()){
            $url = Route::getFacadeRoot()->current()->uri();
            $category = Category::where('url',$url)->where('status', 1)->count();
            if ($category > 0){

                $category = Category::catDetails($url);
                $categoryCountProduct = Product::where('status',1)->where('category_id', $category['catId'])->count();
                $categoryProduct = Product::where('status',1)->where('category_id', $category['catId']);

                $data = $request->all();

//echo "<pre>";
//print_r($data);
                //sidebar filtering/sorting
                if(isset($data['fabric']) && !empty($data['fabric'])){
                    $categoryProduct->whereIn('products.fabric',$data['fabric']);
                }
                if(isset($data['sleeve']) && !empty($data['sleeve'])){
                    $categoryProduct->whereIn('products.sleeve',$data['sleeve']);
                }
                if(isset($data['fit']) && !empty($data['fit'])){
                    $categoryProduct->whereIn('products.fit',$data['fit']);
                }
                if(isset($data['pattern']) && !empty($data['pattern'])){
                    $categoryProduct->whereIn('products.pattern',$data['pattern']);
                }
                if(isset($data['occasion']) && !empty($data['occasion'])){
                    $categoryProduct->whereIn('products.occasion',$data['occasion']);
                }


                //product filtering/sorting
                if(isset($data['sorting']) && !empty($data['sorting'])){
                    if ($data['sorting'] == 'latest_product'){
//                        echo "<pre>";print_r("latest_pro");
                        $categoryProduct->latest();
                    }
                    if ($data['sorting'] == 'lowest_price'){
                        $categoryProduct->orderBy('product_price', 'ASC');
                    }
                    if ($data['sorting'] == 'highist_price'){
                        $categoryProduct->orderBy('product_price', 'DESC');
                    }
                    if ($data['sorting'] == 'product_name_a_z'){
                        $categoryProduct->orderBy('product_name', 'ASC');
                    }if ($data['sorting'] == 'product_name_z_a'){
                        $categoryProduct->orderBy('product_name', 'DESC');
                    }
                }
                $categoryProduct= $categoryProduct->paginate(3);
//                echo "<pre>";
//                print_r($categoryProduct->toArray());
                return view('front.ajax_product_listing', compact('categoryProduct','category','categoryCountProduct','url'));
            }else{
                abort(404);
            }
        }else{
            $url = Route::getFacadeRoot()->current()->uri();
            $category = Category::where('url',$url)->where('status', 1)->count();
            if ($category > 0){
                $category = Category::catDetails($url);
                $categoryCountProduct = Product::where('status',1)->where('category_id', $category['catId'])->count();
                $categoryProduct = Product::where('status',1)->where('category_id', $category['catId']);
                $categoryProduct= $categoryProduct->paginate(3);

                //filter array
                $productFilters = Product::productFilter();
                $fabrics = $productFilters['fabricArray'];
                $sleeves = $productFilters['sleeveArray'];
                $fits = $productFilters['fitArray'];
                $patterns = $productFilters['patternArray'];
                $occasions = $productFilters['occasionArray'];
                $page_name = "listing";
                return view('front.listing', compact('categoryProduct','category','categoryCountProduct','url',
                    'fabrics','sleeves','fits','patterns','occasions','page_name' ));
            }else{
                abort(404);
            }
        }
    }
    //productDetails
    public function productDetails($id){
         $productDetails = Product::with('getCategory','getSection','getBrand','attribute','images')->where('status',1)->where('id',$id)->get()->toArray();
         $total_stock = ProductAttribute::where('product_id', $id)->sum('stock');


        foreach ($productDetails as $productDetail){
            $related_products = Product::where('category_id', $productDetail['category_id'])->where('id',"!=",$id)->limit(9)->inRandomOrder()->get()->toArray();
            return view("front.product_details", compact('productDetail','total_stock','related_products'));
        }
    }

    //get price with size select
    public function getProductPrice(Request $request){
        if ($request->ajax()){
             $data = $request->all();
            $attrDetailPrices = Product::getDisAtrrPrice($data['size'],$data['product_id']);
            //foreach for index problem
            foreach ($attrDetailPrices as $attrDetailPrice){
                return $attrDetailPrice;
            }

        }
    }

    //add to cart
    public function addToCart(Request $request){
        $request->all();
        $data = $request->all();
        $product_attr = ProductAttribute::where('product_id',$data['product_id'])->where('size',$data['size'])->get()->toArray();
//        use foreach for index problem
        foreach ($product_attr as $productAttr){
            //product stock chacking
            if ($productAttr['stock'] <= 0){
                Session::flash("error_massage","Woops! Product size not available in stock");
                return redirect()->back();
            }
            //product size already exict or not with user_id and session_id
            if(Auth::check()){
                $cart_product_count = Cart::where('product_id',$data['product_id'])->where('size',$data['size'])->where('user_id',Auth::user()->id)->count();
            }else{
                $cart_product_count = Cart::where('product_id',$data['product_id'])->where('size',$data['size'])->where('session_id',Session::get('session_id'))->count();
            }
            if ($cart_product_count > 0){
                Session::flash("error_massage","Woops! Product already exits in cart");
                return redirect()->back();
            }
            //session id create
            $session_id = Session::get('session_id');
            if (empty($session_id)){
                $session_id = Session::getId();
                Session::put('session_id',$session_id);
            }
            //product cart insert
            $cart = new Cart;
            $cart->product_id = $data['product_id'];
            $cart->session_id = $session_id;
            $cart->user_id  = 0;
            $cart->size = $data['size'];
            $cart->qty = $data['qty'];
            $cart->save();
            Session::flash("success_message","Hurrah! Product add successfully in cart");
            return redirect()->back();
        }
    }

    //cart details
    public function cartDetail(){
        $cart_details = Cart::userCartItems();
            return view('front.cart',compact('cart_details'));
    }

    //udate cart quantity
    public function updateQty(Request $request){


        if ($request->ajax()){
            $data = $request->all();

            $cart_details = Cart::findOrFail($request['card_id']);
            $available_stock = ProductAttribute::select('stock')->where('product_id',$cart_details['product_id'])->where('size',$cart_details['size'])->first()->toArray();

            if ($data['new_qty']>$available_stock['stock']){
                return response()->json([
                    'status'=>false,
                    'message'=>"Quantity not available in stock",
//                    'view'=>(String)view::make('front.update_qty_cart')->with(compact('cart_details'))
                ]);
            }
            $cart = Cart::findOrFail($data['card_id']);
            $cart->qty = $data['new_qty'];
            $cart->save();
            $cart_details = Cart::userCartItems();
            return response()->json([
                'status'=>true,
                'view'=>(String)view::make('front.update_qty_cart')->with(compact('cart_details'))
            ]);
        }
    }
    //delete cart item
    public function deleteCartItem(Request $request){
        if ($request->ajax()){
            $data = $request->all();
            Cart::where('id',$data['cart_id'])->delete();
            $cart_details = Cart::userCartItems();
            return response()->json([
               'view'=>(String)View::make('front.update_qty_cart')->with(compact('cart_details'))
            ]);
        }
    }
}
