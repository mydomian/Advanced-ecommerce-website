<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use Session;
class SectionController extends Controller
{
    public function getSections(){
        $sections = Section::get();
        return view('admin.admin_sections', compact('sections'));
    }
    //section status update
    // status active
    public function sectionStatusActive($id){
        $sections = Section::findOrFail($id);
        $sections->status = 0;
        $sections->save();
        Session::flash("success_message","Hurrah! Status Inactive successfully");
        return redirect()->back();
        }
    // status inactive
    public function sectionStatusInActive($id){
        $sections = Section::findOrFail($id);
        $sections->status = 1;
        $sections->save();
        Session::flash("success_message","Hurrah! Status Active successfully");
        return redirect()->back();
    }
}
