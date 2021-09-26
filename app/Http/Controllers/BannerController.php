<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::get();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //custom validation
        $rules = [
            'banner_name' => 'required',
            'banner_link' => 'required',
            'banner_alt' => 'required',
            'status' => 'required',
            'banner_image' => 'required',

        ];
        $customize = [
            'banner_name.required' => 'Banner name is required',
            'banner_link.required' => 'Banner link is required',
            'banner_alt.required' => 'Banner alt is required',
            'banner_image.required' => 'Image is required',
        ];
        $this->validate($request,$rules,$customize);
        //image insert
        if($request->hasFile('banner_image')){
            $image = $request->file('banner_image');
            $img = Image::make($image);
            $extension = $image->getClientOriginalExtension();
            $nameGen = rand(111,99999999).".".$extension;
            $path = "images/admin_images/banner/".$nameGen;
            Image::make($img)->resize(1170,480)->save($path);
        }
        //Banner save
        $banner = new Banner;
        $banner->image = $nameGen;
        $banner->name = $request->banner_name;
        $banner->link = $request->banner_link;
        $banner->alt = $request->banner_alt;
        $banner->status = $request->status;
        $banner->save();
        Session::flash("success_message","Hurrah! Banner created successfully");
        return redirect('/admin/banners');
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
         $banner = Banner::findOrFail($id);
         return view('admin.banner.edit', compact('banner'));
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
            'banner_name' => 'required',
            'banner_link' => 'required',
            'banner_alt' => 'required',
            'status' => 'required',
            'banner_image' => 'required',
        ];
        $customize = [
            'banner_name.required' => 'Banner name is required',
            'banner_link.required' => 'Banner link is required',
            'banner_alt.required' => 'Banner alt is required',
            'banner_image.required' => 'Image is required',
        ];
        $this->validate($request,$rules,$customize);
        //image insert
        if($request->hasFile('banner_image')){
            $image = $request->file('banner_image');
            $img = Image::make($image);
            $extension = $image->getClientOriginalExtension();
            $nameGen = rand(111,99999999).".".$extension;
            $path = "images/admin_images/banner/".$nameGen;
            Image::make($img)->resize(1170,480)->save($path);
        }
        //Banner save
        $banner = Banner::findOrFail($id);
        if ($request['banner_image']){
            $banner->image = $nameGen;
        }
        $banner->name = $request->banner_name;
        $banner->link = $request->banner_link;
        $banner->alt = $request->banner_alt;
        $banner->status = $request->status;
        $banner->save();
        Session::flash("success_message","Hurrah! Banner updated successfully");
        return redirect('/admin/banners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->delete();
        Session::flash("success_message","Warning! Banner delete successfully");
        return redirect()->back();
    }
    //banner status
    // status active
    public function bannerStatusActive($id){
        $product = Banner::findOrFail($id);
        $product->status = 0;
        $product->save();
        Session::flash("success_message","Hurrah! Status Inactive successfully");
        return redirect()->back();
    }
    // status inactive
    public function bannerStatusInActive($id){
        $product = Banner::findOrFail($id);
        $product->status = 1;
        $product->save();
        Session::flash("success_message","Hurrah! Status Active successfully");
        return redirect()->back();
    }
}
