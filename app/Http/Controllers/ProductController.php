<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\ProductAttribute;
use App\Section;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;
use Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::with('getCategory','getSection','getBrand')->get();
        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::where('status', 1)->get();
        $categories = Section::with('getCategories')->get();
        $fabricArray = array('Poleaster', 'Coton', 'Merble', 'fiber');
        $sleeveArray = array('Sleeveless', 'Short Sleeve', 'Half Sleeve', 'Full Sleeve');
        $fitArray = array('Slim', 'Regular', 'Medium', 'Large');
        $patternArray = array('Check', 'Plan', 'Solid', 'Printed');
        $occasionArray = array('Casual', 'Formal', 'Regular');
        return view('admin.product.create', compact('brands','categories','fabricArray','sleeveArray','fitArray','patternArray','occasionArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')){
            //custom validation
            $rules = [
                'category_id' => 'required',
                'brand_id' => 'required',
                'product_name' => 'required|min:2|max:255|regex:/^[\pL\s\-]+$/u',
                'product_price' => 'required|numeric',
                'product_color' => 'required',
                'product_code' => 'required',
            ];
            $customize = [
                'brand_id.required' => 'Selete any brand name ',
                'category_id.required' => 'Selete any category name ',
                'product_name.required' => 'Product name is required',
                'product_name.regex' => 'Product name must be valid charecter',
                'product_price.required' => 'Product price is required',
                'product_price.numeric' => 'Product price must be numeric',
                'product_color.required' => 'Product color is required',
                'product_code.required' => 'Product code is required',
            ];
            $this->validate($request,$rules,$customize);

            //image insert
            if($request->hasFile('product_image')){
                $image = $request->file('product_image');

                    $img = Image::make($image);
                    $extension = $image->getClientOriginalExtension();
                    $nameGen = rand(111,99999999).".".$extension;

                    $large_path = "images/admin_images/product/large/".$nameGen;
                    $medium_path = "images/admin_images/product/medium/".$nameGen;
                    $small_path = "images/admin_images/product/small/".$nameGen;

                    Image::make($img)->save($large_path);
                    Image::make($img)->resize(500,375)->save($medium_path);
                    Image::make($img)->resize(160,160)->save($small_path);

            }
            //video insert
            if($request->file('product_video')){
                $video = $request->product_video;
                $name = rand(111,99999).".".$request->product_video->getClientOriginalExtension();
                $path = "videos/admin_videos/product";
                $move = $video->move($path,$name);
            }
            // empty value check
            if(empty($request->product_discount)){
                $request->product_discount =0;
            }
            if(empty($request->product_image)){
                $request->product_image ="";
            }
            if(empty($request->product_video)){
                $request->product_video ="";
            }
            if(empty($request->product_description)){
                $request->product_description ="";
            }
            if(empty($request->wash_care)){
                $request->wash_care ="";
            }
            if(empty($request->fabric)){
                $request->fabric ="";
            }
            if(empty($request->pattern)){
                $request->pattern ="";
            }
            if(empty($request->sleeve)){
                $request->sleeve ="";
            }
            if(empty($request->fit)){
                $request->fit ="";
            }
            if(empty($request->occasion)){
                $request->occasion ="";
            }
            if(empty($request->meta_title)){
                $request->meta_title ="";
            }
            if(empty($request->meta_keywords)){
                $request->meta_keywords ="";
            }
            if(empty($request->meta_description)){
                $request->meta_description ="";
            }
            if(empty($request->weight)){
                $request->product_weight =0;
            }
            if(empty($request->is_feature)){
                $is_feature = "no";
            }else{
                $is_feature = "yes";
            }

        //product save
        $categoryDetails = Category::findOrFail($request->category_id);
        $products = new Product;
        $products->section_id = $categoryDetails->section_id;
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->product_name = $request->product_name;
        $products->product_code = $request->product_code;
        $products->product_color = $request->product_color;
        $products->product_weight = $request->product_weight;
        $products->description = $request->product_description;
        $products->product_price = $request->product_price;
        $products->product_discount = $request->product_discount;
        $products->meta_title = $request->meta_title;
        $products->main_image = $nameGen;
        $products->product_video =  $name;
        $products->meta_keywords = $request->meta_keywords;
        $products->meta_description = $request->meta_description;
        $products->wash_care = $request->wash_care;
        $products->fabric = $request->fabric;
        $products->sleeve = $request->sleeve;
        $products->fit = $request->fit;
        $products->pattern = $request->pattern;
        $products->occasion = $request->occasion;
        $products->is_feature = $is_feature;
        $products->status = 1;
        $products->save();
        Session::flash("success_message","Hurrah! Product created successfully");
        return redirect('/admin/products');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ProductsDetails = Product::findOrFail($id);
        $categories = Section::with('getCategories')->get();
        $fabricArray = array('Poleaster', 'Coton', 'Merble', 'fiber');
        $sleeveArray = array('Sleeveless', 'Short Sleeve', 'Half Sleeve', 'Full Sleeve');
        $fitArray = array('Slim', 'Regular', 'Medium', 'Large');
        $patternArray = array('Check', 'Plan', 'Solid', 'Printed');
        $occasionArray = array('Casual', 'Formal', 'Regular');
        return view('admin.product.edit', compact('ProductsDetails','categories','fabricArray','sleeveArray',
        'fitArray','patternArray','occasionArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //custom validation
        $rules = [
            'category_id' => 'required',
            'product_name' => 'required|min:2|max:255|regex:/^[\pL\s\-]+$/u',
            'product_price' => 'required|numeric',
            'product_color' => 'required',
            'product_code' => 'required',
            'product_video' => 'nullable',
            'product_image' => 'nullable',
        ];
        $customize = [
            'category_id.required' => 'Selete any category name ',
            'product_name.required' => 'Product name is required',
            'product_name.regex' => 'Product name must be valid charecter',
            'product_price.required' => 'Product price is required',
            'product_price.numeric' => 'Product price must be numeric',
            'product_color.required' => 'Product color is required',
            'product_code.required' => 'Product code is required',
        ];
        $this->validate($request,$rules,$customize);
        //image insert
        if($request->hasFile('product_image')){
            $image = $request->file('product_image');

            $img = Image::make($image);
            $extension = $image->getClientOriginalExtension();
            $nameGen = rand(111,99999999).".".$extension;

            $large_path = "images/admin_images/product/large/".$nameGen;
            $medium_path = "images/admin_images/product/medium/".$nameGen;
            $small_path = "images/admin_images/product/small/".$nameGen;

            Image::make($img)->save($large_path);
            Image::make($img)->resize(500,375)->save($medium_path);
            Image::make($img)->resize(160,160)->save($small_path);

        }
        //video insert
        if($request->file('product_video')){
            $video = $request->product_video;
            $name = rand(111,99999).".".$request->product_video->getClientOriginalExtension();
            $path = "videos/admin_videos/product";
            $move = $video->move($path,$name);
        }
        // empty value check
        if(empty($request->product_discount)){
            $request->product_discount =0;
        }
        if(empty($request->product_image)){
            $request->product_image ="";
        }
        if(empty($request->product_description)){
            $request->product_description ="";
        }
        if(empty($request->wash_care)){
            $request->wash_care ="";
        }
        if(empty($request->fabric)){
            $request->fabric ="";
        }
        if(empty($request->pattern)){
            $request->pattern ="";
        }
        if(empty($request->sleeve)){
            $request->sleeve ="";
        }
        if(empty($request->fit)){
            $request->fit ="";
        }
        if(empty($request->occasion)){
            $request->occasion ="";
        }
        if(empty($request->meta_title)){
            $request->meta_title ="";
        }
        if(empty($request->meta_keywords)){
            $request->meta_keywords ="";
        }
        if(empty($request->meta_description)){
            $request->meta_description ="";
        }
        if(empty($request->weight)){
            $request->product_weight =0;
        }
        if(empty($request->is_feature)){
            $is_feature = "no";
        }else{
            $is_feature = "yes";
        }

        //product save
        $products = Product::findOrFail($id);

        //product save
        $categoryDetails = Category::findOrFail($request->category_id);
        $products->section_id = $categoryDetails->section_id;
        $products->category_id = $request->category_id;
        $products->product_name = $request->product_name;
        $products->product_code = $request->product_code;
        $products->product_color = $request->product_color;
        $products->product_weight = $request->product_weight;
        $products->description = $request->product_description;
        $products->product_price = $request->product_price;
        $products->product_discount = $request->product_discount;
        $products->meta_title = $request->meta_title;
        if(isset($name)){
            $products->main_image = $nameGen;
        }
        if(isset($name)){
            $products->product_video = $name;
        }
        $products->meta_keywords = $request->meta_keywords;
        $products->meta_description = $request->meta_description;
        $products->wash_care = $request->wash_care;
        $products->fabric = $request->fabric;
        $products->sleeve = $request->sleeve;
        $products->fit = $request->fit;
        $products->pattern = $request->pattern;
        $products->occasion = $request->occasion;
        $products->is_feature = $is_feature;
        $products->status = 1;
        $products->save();
        Session::flash("success_message","Hurrah! Product Update successfully");
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        Session::flash("success_message","Warning! Product delete successfully");
        return redirect()->back();
    }
    //products status update
    // status active
    public function productStatusActive($id){
        $product = Product::findOrFail($id);
        $product->status = 0;
        $product->save();
        Session::flash("success_message","Hurrah! Status Inactive successfully");
        return redirect()->back();
    }
    // status inactive
    public function productStatusInActive($id){
        $product = Product::findOrFail($id);
        $product->status = 1;
        $product->save();
        Session::flash("success_message","Hurrah! Status Active successfully");
        return redirect()->back();
    }
    //product attribute
    public function productAttribue($id){
        $products = Product::with('attribute')->findOrFail($id);
        return view('admin.product.product_attribute', compact('products'));
    }
    //product attribute store
    public function productAttributeStore(Request $request, $id){
        foreach ($request['sku'] as $key => $value){
           $productAttr = new ProductAttribute;
           $productAttr->product_id = $id;
            $productAttr->price = $request['price'][$key];
            $productAttr->stock = $request['stock'][$key];
            $productAttr->sku = $request['sku'][$key];
            $productAttr->size = $request['size'][$key];
            $productAttr->save();
        }
        Session::flash("success_message","Hurrah! Product attribute create successfully");
        return redirect()->back();
    }
    //product attribute update
    public function productAttributeUpdate(Request $request, $id){
       foreach ( $request['attr_id'] as $key => $value){
          $pro = ProductAttribute::where(['id'=>$request['attr_id'][$key]])->update(['price'=>$request['price'][$key], 'stock'=>$request['stock'][$key]]);
       }
        Session::flash("success_message","Hurrah! Attribute update successfully");
        return redirect()->back();
    }
    //product attribute delete
    public function productAttributeDelete($id){
        $attr = ProductAttribute::findOrFail($id);
        $attr->delete();
        Session::flash("success_message","Warning! Product attribute delete successfully");
        return redirect()->back();
    }
}
