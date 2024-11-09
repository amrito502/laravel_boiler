<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function admin_dashboard(){
        return view('admin.dashboard');
    }

    public function admin_login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>1])){
                return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('message','Invalid Credentials!');
            }
        }
        return view('admin.login');
    }

    public function admin_logout(Request $request){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }


    public function update_admin_password(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(Hash::check($data['old_password'],Auth::guard('admin')->user()->password)){
                if($data['confirm_password']==$data['new_password']){
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>Hash::make($data['new_password'])]);
                    return redirect()->back()->with('message','Your password is Updated!');
                }else{
                    return redirect()->back()->with('message','New Password and confirm does not match!');
                }
            }else{
                return redirect()->back()->with('message','Your corrent password is incorrect!');
            }
        }
        $adminDetails = Admin::where('email',Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_admin_password')->with(compact('adminDetails'));
    }

    public function update_admin_details(Request $request){
        if($request->isMethod('post')){
            $rules = [
                'admin_name'=> 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile'=> 'required|numeric',
            ];
            $customMessages = [
                'admin_name.required' => 'Name is Required',
                'admin_name.regex' => 'Valid Name is Required',
                'admin_mobile.required' => 'Mobile is Required',
                'admin_mobile.numeric' => 'Valid Mobile is Required',

            ];
            $this->validate($request, $rules, $customMessages);
            if ($request->hasFile('admin_image')) {
                $oldImage = 'assets/img/upload/admin_profile_pic/'.Auth::guard('admin')->user()->image;
                if (file_exists(public_path($oldImage))) {
                    unlink(public_path($oldImage));
                }
                $image_tmp = $request->file('admin_image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999) . '.' . $extension;
                    $image_tmp->move(public_path('assets/img/upload/admin_profile_pic/'), $filename);
                }
            }
            $data = $request->all();
            Admin::where('id',Auth::guard('admin')->user()->id)->update(['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile'],'image'=>$filename]);
            return redirect()->back()->with('message','Admin details updated successfully');
        }
        return view('admin.settings.update_admin_details');
    }

    public function checkAdminPassword(Request $request){
        $data = $request->all();
        if(Hash::check($data['old_password'],Auth::guard('admin')->user()->password)){
            return true;
        }else{
            return false;
        }
    }
}
