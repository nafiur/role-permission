<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use App\Models\MaritalStatus;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MaritalStatusController extends Controller
{
    public function MaritalStatusAll(){
        $maritalstatuses = MaritalStatus::all();
        return view('backend.maritalstatus.maritalstatus_all',compact('maritalstatuses'));
    } // End Method 


    public function MaritalStatusAdd(){
        return view('backend.maritalstatus.maritalstatus_add');
    } // End Method 


       public function MaritalStatusStore(Request $request){

        MaritalStatus::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'MaritalStatus Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('maritalstatus.all')->with($notification);

    } // End Method 

    public function MaritalStatusEdit($id){

        $maritalstatus = MaritalStatus::findOrFail($id);
        return view('backend.maritalstatus.maritalstatus_edit',compact('maritalstatus'));

    } // End Method 

    public function MaritalStatusUpdate(Request $request){

        $maritalstatus_id = $request->id;

        MaritalStatus::findOrFail($maritalstatus_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'MaritalStatus Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('maritalstatus.all')->with($notification);

    } // End Method 


    public function MaritalStatusDelete($id){

        MaritalStatus::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'MaritalStatus Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
}
