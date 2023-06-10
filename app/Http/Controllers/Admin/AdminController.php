<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
        
    }
    
    public function Surveillance_dashboard(){
        return view('admin.Surveillance_dashboard');
        
    }
    
    public function Relay_dashboard(){
        return view('admin.Relay_dashboard');
        
    }

    public function AreaChart(){
        return view('admin.layout.area');
    }
    
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            $rules=[
                'email' => 'required|email|max:255',
                'password' => 'required|max:30'
            ];
            
            $customMessage = [
                'email.required' => "Email is required",
                'email.email' => 'Valid Email is Required',
                'password.required' => 'password is required',
            ];
            $this->validate($request,$rules,$customMessage);
            if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect("admin/dashboard");
            }else{
                return redirect()->back()->with("error_message","Invalid Email or Password");
            }
        }
        return view('admin.login');
    }

    public Function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}