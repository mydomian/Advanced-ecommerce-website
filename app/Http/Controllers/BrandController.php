<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Session;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::get();
        return view('admin.brand.index', compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            'brand_name' => 'required|min:2|max:255|regex:/^[\pL\s\-]+$/u',
            'status' => 'required',
        ];
        $cutomize = [
            'brand_name.required' => 'Category name is required',
            'brand_name.min' => 'The name must be 2 charecter',
            'brand_name.max' => 'The name field must 2-255 charecter',
            'brand_name.regex' => 'The name must be valid charecter',
            //section id
            'status.required' => 'Status field is blank',
        ];
        $this->validate($request,$rules,$cutomize);
        //save brand
        $brands = new Brand;
        $brands->name = $request->brand_name;
        $brands->status = $request->status;
        $brands->save();
        Session::flash("success_message","Hurrah! Brand created successfully");
        return redirect('/admin/brands');
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
        $brands = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brands'));
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
            'brand_name' => 'required|min:2|max:255|regex:/^[\pL\s\-]+$/u',
            'status' => 'required',
        ];
        $cutomize = [
            'brand_name.required' => 'Category name is required',
            'brand_name.min' => 'The name must be 2 charecter',
            'brand_name.max' => 'The name field must 2-255 charecter',
            'brand_name.regex' => 'The name must be valid charecter',
            //section id
            'status.required' => 'Status field is blank',
        ];
        $this->validate($request,$rules,$cutomize);
        //save brand
        $brands = Brand::findOrFail($id);
        $brands->name = $request->brand_name;
        $brands->status = $request->status;
        $brands->save();
        Session::flash("success_message","Hurrah! Brand update successfully");
        return redirect('/admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        Session::flash("success_message","Warning! Brand delete successfully");
        return redirect()->back();
    }
    //products status update
    // status active
    public function brandStatusActive($id){
        $brand = Brand::findOrFail($id);
        $brand->status = 0;
        $brand->save();
        Session::flash("success_message","Hurrah! Status Inactive successfully");
        return redirect()->back();
    }
    // status inactive
    public function brandStatusInActive($id){
        $brand = Brand::findOrFail($id);
        $brand->status = 1;
        $brand->save();
        Session::flash("success_message","Hurrah! Status Active successfully");
        return redirect()->back();
    }
}
