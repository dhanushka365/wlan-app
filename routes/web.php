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
    Route::match(['get','post'],'update-password', 'AdminController@updatePassword');
    Route::match(['get','post'],'update-details', 'AdminController@updateDetails');
    Route::post('check-current-password', 'AdminController@checkCurrentPassword');
    Route::get('dashboard', 'AdminController@dashboard');
    Route::get('area','AdminController@AreaChart');
    Route::get('logout','AdminController@logout');
    Route::get('Surveillance_dashboard', 'AdminController@Surveillance_dashboard');
    Route::get('Relay_dashboard', 'AdminController@Relay_dashboard');
    Route::get('Chart_dashboard', 'AdminController@Chartdashboard');
    });
    
});

Route::prefix('/device')->namespace('App\Http\Controllers\Device')-> group(function(){
    Route::post('save_data','DeviceController@saveData');
    Route::get('get_status', 'DeviceController@getStatus');
    Route::get('get_Buzzer_status', 'DeviceController@getBuzzerStatus');
    Route::get('chart', 'ChartsApiController@index')->name('api.chart');
    Route::post('update_status', 'DeviceController@updateStatus')->name('device.update_status');
});

 
Route::get('/json-file', function () {
    $filePath = public_path('data.json');
    
    // Read the JSON file
    $json = file_get_contents($filePath);
    
    // Return the JSON response
    return response($json, 200)->header('Content-Type', 'application/json');
});