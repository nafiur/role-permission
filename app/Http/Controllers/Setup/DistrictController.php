<?php

namespace App\Http\Controllers\Setup;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DistrictController extends Controller
{
    public function DistrictAll(){

        $districts = District::all();
        return view('backend.district.district_all',compact('districts'));
    } // End Method 


    public function DistrictAdd(){

        $divisions = Division::all();
        return view('backend.district.district_add',compact('divisions'));
    } // End Method 


    public function DistrictStore(Request $request){

        District::insert([
            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'division_id' => $request->division_id,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'District Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('district.all')->with($notification); 

    } // End Method 

    public function DistrictEdit($id){

        $division = Division::all();
        $district = District::findOrFail($id);
        return view('backend.district.district_edit',compact('district','division'));
    } // End Method 

    public function DistrictUpdate(Request $request){

        $district_id = $request->id;

         District::findOrFail($district_id)->update([

            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'division_id' => $request->division_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'District Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('district.all')->with($notification); 


    } // End Method 


    public function DistrictDelete($id){
       
       District::findOrFail($id)->delete();
            $notification = array(
            'message' => 'District Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method 
}
