<?php

namespace App\Http\Controllers\Setup;

use App\Models\BloodGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BloodGroupController extends Controller
{
    public function BloodGroupAll(){
        $bloodgroups = BloodGroup::all();
        return view('backend.bloodgroup.bloodgroup_all',compact('bloodgroups'));
    } // End Method 


    public function BloodGroupAdd(){
        return view('backend.bloodgroup.bloodgroup_add');
    } // End Method 


       public function BloodGroupStore(Request $request){

        BloodGroup::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Blood Group Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('bloodgroup.all')->with($notification);

    } // End Method 

    public function BloodGroupEdit($id){

        $bloodgroup = BloodGroup::findOrFail($id);
        return view('backend.bloodgroup.bloodgroup_edit',compact('bloodgroup'));

    } // End Method 

    public function BloodGroupUpdate(Request $request){

        $bloodgroup_id = $request->id;

        BloodGroup::findOrFail($bloodgroup_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'BloodGroup Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('bloodgroup.all')->with($notification);

    } // End Method 


    public function BloodGroupDelete($id){

        BloodGroup::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'BloodGroup Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
}
