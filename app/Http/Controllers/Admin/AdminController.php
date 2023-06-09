<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
        
    }

    public function AreaChart(){
        return view('admin.layout.area');
    }
    
    public function login(){
        return view('admin.login');
    }
}