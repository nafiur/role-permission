<?php

namespace App\Http\Controllers\Setup;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
    public function DesignationAll(){

        $designations = Designation::all();
        return view('backend.designation.designation_all',compact('designations'));
    } // End Method 


    public function DesignationAdd(){
        return view('backend.designation.designation_add');
    } // End Method 


       public function DesignationStore(Request $request){

        Designation::insert([
            'name' => $request->name,
            // 'mobile_no' => $request->mobile_no,
            // 'email' => $request->email,
            // 'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Designation Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('designation.all')->with($notification);

    } // End Method 

    public function DesignationEdit($id){

        $designation = Designation::findOrFail($id);
        return view('backend.designation.designation_edit',compact('designation'));

    } // End Method 

    public function DesignationUpdate(Request $request){

        $designation_id = $request->id;

        Designation::findOrFail($designation_id)->update([
            'name' => $request->name,
            // 'mobile_no' => $request->mobile_no,
            // 'email' => $request->email,
            // 'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Designation Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('domain.all')->with($notification);

    } // End Method 


    public function DesignationDelete($id){

        Designation::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'Designation Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
}
