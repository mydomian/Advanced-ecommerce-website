<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Session;
class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
    //product image
    public function productMultiImage($id){
        $product = Product::with('images')->findOrFail($id);
        return view('admin.product.product_image', compact('product'));
    }
    //product image store
    public function productImageStore(Request $request, $id){
        if ($request->hasFile('images')){
            $images = $request->file('images');
            foreach ($images as $key => $image){
                $productImage = new ProductImage;
                $img = Image::make($image);
                $extension = $image->getClientOriginalExtension();
                $nameGen = rand(111,99999999).".".$extension;

                $large_path = "images/admin_images/product/large/".$nameGen;
                $medium_path = "images/admin_images/product/medium/".$nameGen;
                $small_path = "images/admin_images/product/small/".$nameGen;

                Image::make($img)->save($large_path);
                Image::make($img)->resize(500,375)->save($medium_path);
                Image::make($img)->resize(160,160)->save($small_path);

                $productImage->main_image = $nameGen;
                $productImage->product_id = $id;
                $productImage->status = 1;
                $productImage->save();
            }
            Session::flash("success_message","Hurrah! Product image add successfully");
            return redirect()->back();
        }
    }
    //products status update
    // status active
    public function productImageStatusActive($id){
        $product_image = ProductImage::findOrFail($id);
        $product_image->status = 0;
        $product_image->save();
        Session::flash("success_message","Hurrah! Status Inactive successfully");
        return redirect()->back();
    }
    // status inactive
    public function productImageStatusInActive($id){
        $product_image = ProductImage::findOrFail($id);
        $product_image->status = 1;
        $product_image->save();
        Session::flash("success_message","Hurrah! Status Active successfully");
        return redirect()->back();
    }
    //product image delete
    public function ProductImageDelete($id){
        $product_img = ProductImage::findOrFail($id);
        $product_img->delete();
        Session::flash("success_message","Warning! Product image delete successfully");
        return redirect()->back();
    }
}
