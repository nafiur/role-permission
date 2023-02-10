<?php

namespace App\Http\Controllers\Setup;

use App\Models\EmployeeType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeTypeController extends Controller
{
    public function EmployeeTypeAll(){
        $employeetypes = EmployeeType::all();
        return view('backend.employeetype.employeetype_all',compact('employeetypes'));
    } // End Method 


    public function EmployeeTypeAdd(){
        return view('backend.employeetype.employeetype_add');
    } // End Method 


       public function EmployeeTypeStore(Request $request){

        EmployeeType::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'EmployeeType Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('employeetype.all')->with($notification);

    } // End Method 

    public function EmployeeTypeEdit($id){

        $employeetype = EmployeeType::findOrFail($id);
        return view('backend.employeetype.employeetype_edit',compact('employeetype'));

    } // End Method 

    public function EmployeeTypeUpdate(Request $request){

        $employeetype_id = $request->id;

        EmployeeType::findOrFail($employeetype_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'EmployeeType Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('employeetype.all')->with($notification);

    } // End Method 


    public function EmployeeTypeDelete($id){

        EmployeeType::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'EmployeeType Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
}
