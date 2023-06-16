<?php

namespace App\Http\Controllers\Admin;
use App\Models\Event; // Assuming you have an Event model
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
use Hash;
use Image;
use Session;
class AdminController extends Controller
{
    public function checkCurrentPassword(Request $request){
        $data =$request->all();
        if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
            return "true";
        }else{
            return "false";
        }
        
    }
    
    public function updateDetails( Request $request){
        Session::put('page','update-details');
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            $rules=[
                'admin_name' => 'required|max:255',
                'admin_mobile' => 'required|numeric|digits:10',
                'admin_image' => 'image',
            ];
            
            $customMessage = [
                'admin_name.required' => "Name is required",
                'admin_mobile.numeric' => 'valid Mobile is required',
                'admin_mobile.required' => "Mobile is required",
                'admin_mobile.max' => 'valid Mobile is required',
                'admin_mobile.min' => 'valid Mobile is required',
                'admin_image.image' => 'valid Image is required',
            ];
            $this->validate($request,$rules,$customMessage);
            
            //upload admin image
            if($request ->hasFile('admin_image')){
                $image_tmp=$request->file('admin_image');
                if($image_tmp ->isValid()){
                    //Get Imag Extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    //Generate New Image
                    $imageName = rand(111,99999).'.'.$extension;
                    $image_path = 'admin/images/photos/'.$imageName;
                    Image::make($image_tmp)->save($image_path); 
                }else if(!empty($data['current_image'])){
                    $imageName = $data['current_image'];      
                }else{
                    $imageName="";
                }
            }
          //update admin details
          Admin::where('email',Auth::guard('admin')->user()->email)->update(['name'=>$data['admin_name'],'mobile'=>$data['admin_mobile'],'image'=>$imageName]);
          return redirect()->back()->with('success_message', 'Admin Details has been Updated Sucessfully!');
        }
        return view('admin.update_details');
    }

    
    public function updatePassword(Request $request){
        Session::put('page','update-password');
        if($request->isMethod('post')){
            $data =$request->all();
            //check if the current password is correct
            if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
                //check if password and confirm password are matching
                if($data['new_pwd']==$data['confirm_pwd']){
                    //update new password
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    return redirect()->back()->with('success_message', 'Password has been Updated Sucessfully!');
                    
                }else{
                    return redirect()->back()->with('error_message', 'New Password and Retype Password not match!');
                }
            }else{
                return redirect()->back()->with('error_message', 'Your Current password is Incorrect!');
            }
        }
        return view('admin.update_password');
    }
    public function dashboard(){
        Session::put('page','dashboard');
        // echo "<pre>"; print_r(Auth::guard('admin')->user()); die;
       $energyDataAll = DB::table('elec_usage')->select('account_no', 'voltage', 'current','power','energy','frequency','pf','date','time')
       ->orderBy('date', 'desc')
       ->orderBy('time', 'desc')
       ->take(8)
       ->get();
       $energyData = DB::table('elec_usage')->select('account_no', 'voltage', 'current','power','energy','frequency','pf','date','time')
       ->orderBy('date', 'desc')
       ->orderBy('time', 'desc')
       ->first();
        return view('admin.dashboard', ['energyData' => $energyData] , ['energyDataAll' => $energyDataAll]);
        
    }
    
    public function Surveillance_dashboard(){
        Session::put('page','surveillance-dashboard');
        $events = DB::table('time_table')->select('event_name', 'event_time')->get();
        $event2 = DB::table('records')->select('Person', 'Time')->get();
        return view('admin.Surveillance_dashboard')->with('events', $events)->with('events2', $event2);

        // return view('admin.Surveillance_dashboard');
        
    }

    public function Chartdashboard(){
        
        return view('admin.dashboard_chart');
    }
    
    public function Relay_dashboard(){
        Session::put('page','relay-dashboard');
        $relayData = DB::table('relay')->select('Relay_ID', 'Status', 'Relay_Type')->get();

        return view('admin.Relay_dashboard', ['relayData' => $relayData]);
        
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