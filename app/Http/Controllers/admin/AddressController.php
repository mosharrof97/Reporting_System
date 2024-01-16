<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Upazila;

class AddressController extends Controller
{
    public function index(){
        
    }

    public function districtCreate(){
        return view('adminDashboard.page.district');
    }

    public function districtStore(Request $request){
        $request->validate([
            'name'=>['required', 'string']
        ] );
        
        District::create($request->all()); 
        return back()->with('success','Data Input Successfully');
    }

    // Upazila
     public function upazila(){

     }

     public function upazilaCreate(){
        $district = District::get();
     return view('adminDashboard.page.upazila', compact('district'));
     }

     public function upazilaStore(Request $request){
     $request->validate([
     'district_id'=>['required'],
     'name'=>['required', 'string']
     ] );

     Upazila::create($request->all());
     return back()->with('success','Data Input Successfully');
     }
    
}
