<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')-> group(function(){
    
    Route::match(['get','post'],'login','AdminController@login');
    Route::group(['middleware' => ['admin']], function(){
    Route::get('dashboard', 'AdminController@dashboard');
    Route::get('area','AdminController@AreaChart');
    Route::get('logout','AdminController@logout');
    });
    
});

Route::prefix('/device')->namespace('App\Http\Controllers\Device')-> group(function(){
    Route::post('save_data','DeviceController@saveData');
    Route::get('/get_status', 'DeviceController@getStatus');
});