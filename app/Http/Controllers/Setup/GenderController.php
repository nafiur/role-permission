<?php

namespace App\Http\Controllers\Setup;

use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GenderController extends Controller
{
    public function GenderAll(){
        $genders = Gender::all();
        return view('backend.gender.gender_all',compact('genders'));
    } // End Method 


    public function GenderAdd(){
        return view('backend.gender.gender_add');
    } // End Method 


       public function GenderStore(Request $request){

        Gender::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Gender Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('gender.all')->with($notification);

    } // End Method 

    public function GenderEdit($id){

        $gender = Gender::findOrFail($id);
        return view('backend.gender.gender_edit',compact('gender'));

    } // End Method 

    public function GenderUpdate(Request $request){

        $gender_id = $request->id;

        Gender::findOrFail($gender_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Gender Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('gender.all')->with($notification);

    } // End Method 


    public function GenderDelete($id){

        Gender::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'Gender Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
}
