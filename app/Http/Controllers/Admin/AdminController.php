<?php

namespace App\Http\Controllers\Admin;
use App\Models\Event; // Assuming you have an Event model

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Validator;
class AdminController extends Controller
{
    
    public function dashboard(){
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
        $events = DB::table('time_table')->select('event_name', 'event_time')->get();

        $event2 = DB::table('records')->select('Person', 'Time')->get();
        return view('admin.Surveillance_dashboard')->with('events', $events)->with('events2', $event2);


        // return view('admin.Surveillance_dashboard');
        
    }
    
    public function Relay_dashboard(){
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