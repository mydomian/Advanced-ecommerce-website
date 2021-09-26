<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use App\Category;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Expr\Print_;
use Session;
use Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $category = Category::with('getSection','getParentCategory')->get();
        return view('admin.category.index', compact('category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::get();
        return view('admin.category.create', compact('sections'));
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
//            custom validation
            $rules = [
                'category_name' => 'required|min:2|max:255|regex:/^[\pL\s\-]+$/u',
                'section_id' => 'required',
                'Parent_id' => 'required',
            ];
            $cutomize = [
                'category_name.required' => 'Category name is required',
                'category_name.min' => 'The name must be 3 charecter',
                'category_name.max' => 'The name field must 3-255 charecter',
                'category_name.regex' => 'The name must be valid charecter',
                //section id
                'section_id.required' => 'Select any section',
                //parent id
                'Parent_id.required' => 'Select any category level',
            ];
            $this->validate($request,$rules,$cutomize);
            //image insert
            if($request->hasFile('category_image')){
                $category_image = $request->file('category_image');
                Image::make($category_image)->resize(160,160);
                $name_gen1 = Str::random(60).'.'.$category_image->getClientOriginalExtension();
                $category_image->storeAs('public/images/admin_images/category', $name_gen1);
            }
            // empty value check
            if(empty($request->category_description)){
                $request->category_description ="";
            }
            if(empty($request->category_discount)){
                $request->category_discount = 0;
            }
            if(empty($request->meta_description)){
                $request->meta_description ="";
            }
            if(empty($request->category_url)){
                $request->category_url ="";
            }
            if(empty($request->meta_title)){
                $request->meta_title ="";
            }
            if(empty($request->meta_keywords)){
                $request->meta_keywords ="";
            }
            if(empty($request->category_image)){
                $name_gen1 ="";
            }
            $categories = new Category;
            $categories->category_name = $request->category_name;
            $categories->section_id = $request->section_id;
            $categories->Parent_id = $request->Parent_id;
            $categories->description = $request->category_description;
            $categories->category_discount = $request->category_discount;
            $categories->meta_description = $request->meta_description;
            $categories->url = $request->category_url;
            $categories->meta_title = $request->meta_title;
            $categories->meta_keywords = $request->meta_keywords;
            $categories->category_image = $name_gen1;
            $categories->status = 1;
            $categories->save();
            Session::flash("success_message","Hurrah! Category created successfully");
            return redirect('/admin/categories');
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
         $categories = Category::findOrFail($id);
         $sections = Section::get();
         return view('admin.category.edit', compact('categories', 'sections'));
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
        //            custom validation
        $rules = [
            'category_name' => 'required|min:2|max:255|regex:/^[\pL\s\-]+$/u',
            'section_id' => 'required',
            'Parent_id' => 'required',
        ];
        $cutomize = [
            'category_name.required' => 'Category name is required',
            'category_name.min' => 'The name must be 3 charecter',
            'category_name.max' => 'The name field must 3-255 charecter',
            'category_name.regex' => 'The name must be valid charecter',
            //section id
            'section_id.required' => 'Select any section',
            //parent id
            'Parent_id.required' => 'Select any category level',
        ];
        $this->validate($request,$rules,$cutomize);

        //image insert
        if($request->hasFile('category_image')){
            $category_image = $request->file('category_image');
            Image::make($category_image)->resize(160,160);
            $name_gen1 = Str::random(60).'.'.$category_image->getClientOriginalExtension();
            $category_image->storeAs('public/images/admin_images/category', $name_gen1);
        }
        // empty value check
        if(empty($request->category_description)){
            $request->category_description ="";
        }
        if(empty($request->category_discount)){
            $request->category_discount = 0;
        }
        if(empty($request->meta_description)){
            $request->meta_description ="";
        }
        if(empty($request->category_url)){
            $request->category_url ="";
        }
        if(empty($request->meta_title)){
            $request->meta_title ="";
        }
        if(empty($request->meta_keywords)){
            $request->meta_keywords ="";
        }
        if(empty($request->category_image)){
            $name_gen1 ="";
        }
        $categories = Category::findOrFail($id);
        $categories->category_name = $request->category_name;
        $categories->section_id = $request->section_id;
        $categories->Parent_id = $request->Parent_id;
        $categories->description = $request->category_description;
        $categories->category_discount = $request->category_discount;
        $categories->meta_description = $request->meta_description;
        $categories->url = $request->category_url;
        $categories->meta_title = $request->meta_title;
        $categories->meta_keywords = $request->meta_keywords;
        $categories->category_image = $name_gen1;
        $categories->status = 1;
        $categories->save();
        Session::flash("success_message","Hurrah! Category Updated successfully");
        return redirect('/admin/categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        Session::flash("success_message","Warning! Category delete successfully");
        return redirect()->back();

    }
    //categories status update
    // status active
    public function categoryStatusActive($id){
        $category = Category::findOrFail($id);
        $category->status = 0;
        $category->save();
        Session::flash("success_message","Hurrah! Status Inactive successfully");
        return redirect()->back();
    }
    // status inactive
    public function categoryStatusInActive($id){
        $category = Category::findOrFail($id);
        $category->status = 1;
        $category->save();
        Session::flash("success_message","Hurrah! Status Active successfully");
        return redirect()->back();
    }
    //category level
    public function appendCategoryLevel(Request $request){
        $data = $request->section_id;
        if($request->ajax()){
            $getCataegories = Category::where('section_id', $data)->with('subCategory')->where('parent_id', 0)->where('status', 1)->get();
//            echo "<pre>";print_r($getCataegories);
            return view('admin.category.category_level', compact('getCataegories'));
        }
    }


}
