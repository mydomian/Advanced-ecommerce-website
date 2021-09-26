<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;
use Session;
use Hash;
use Intervention\Image\Facades\Image;
use Str;
class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.admin_dashboard');
    }
    //admin login
    public function login(Request $request){
        if($request->isMethod('post')){
            // admin login custom validation
            $rules = [
                'email' => 'required|email',
                'password' => 'required|min:6|max:50',
            ];
            $customValidation = [
               'email.required' => 'Email field must required',
                'password.required' => 'Password field must required',
                'password.min' => 'Password field must six character',
                'password.max' => 'Password field must fifty character',
            ];
            $this->validate($request, $rules, $customValidation);
            // guard check and pass
            if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
                return redirect('admin/dashboard');
            }else{
                Session::flash('error_message', 'Invalid Username or Password');
                return redirect()->back();
            }
        }
        return view('admin.admin_login');
    }
    //admin settings
    public function settings(){
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('admin.admin_settings', compact('adminDetails'));
    }
    //admin update password
    public function updatePassword(Request $request){

        if(Hash::check($request->current_pwd, Auth::guard('admin')->user()->password)){
            echo "true";
        }else{
            echo "false";
        }
    }
    //submit form for change password
    public function submitUpdatePassword(Request $request){
        if(Hash::check($request->current_pwd, Auth::guard('admin')->user()->password)){
            if($request->new_pwd == $request->confirm_pwd){
                $pass = Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($request->new_pwd)]);
                if($pass){
                    Session::flash("success_message","Hurrah! Password created successfully");
                    return redirect()->back();
                }
            }else{
                Session::flash("error_message","Your new and confirm password not match");
                return redirect()->back();
            }
        }else{
            Session::flash("error_message","Your current password is incorrect");
            return redirect()->back();
        }
        return redirect()->back();
    }
    //admin details
    public function adminDetails(Request $request){
        if($request->isMethod('post')){
            //custom validation
            $rules = [
                'name' => 'required|min:3|max:255|regex:/^[\pL\s\-]+$/u',
                'mobile' => 'required|numeric',
                'admin_image' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
                ];
            $cutomize = [
                'name.required' => 'The name field is required',
                'name.min' => 'The name must be 3 charecter',
                'name.max' => 'The name field must 3-255 charecter',
                'name.regex' => 'The name must be valid charecter',
                //mobile
                'mobile.required' => 'The name field is required',
                'mobile.numeric' => 'The mobile number must be numeric charecter',
                //image
                'admin_image' => 'Image suppoted jpg,jpeg,png,gif',
                'admin.max' => 'Image select less than 2MB',
            ];
            $this->validate($request,$rules,$cutomize);
            //image insert
            if($request->hasFile('admin_image')){
                $admin_image = $request->file('admin_image');
                Image::make($admin_image)->resize(400,400);
                $name_gen1 = Str::random(60).'.'.$admin_image->getClientOriginalExtension();
                $admin_image->storeAs('public/images/admin_images/admin', $name_gen1);
            }

            //update admin details
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['name'=>$request->name,'mobile'=>$request->mobile,'image'=>$name_gen1]);
            Session::flash("success_message","Hurrah! Admin details update successfully");
            return redirect()->back();

        }
        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        return view('admin.admin_details',compact('admin'));
    }


    //admin logout
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
