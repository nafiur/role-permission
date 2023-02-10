<?php

namespace App\Http\Controllers\Setup;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\EducationalQualification;

class EducationalQualificationController extends Controller
{
    public function EducationalQualificationAll(){
        $educationalqualifications = EducationalQualification::all();
        return view('backend.educationalqualification.educationalqualification_all',compact('educationalqualifications'));
    } // End Method 


    public function EducationalQualificationAdd(){
        return view('backend.educationalqualification.educationalqualification_add');
    } // End Method 


       public function EducationalQualificationStore(Request $request){

        EducationalQualification::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Educational Qualification Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('educationalqualification.all')->with($notification);

    } // End Method 

    public function EducationalQualificationEdit($id){

        $educationalqualification = EducationalQualification::findOrFail($id);
        return view('backend.educationalqualification.educationalqualification_edit',compact('educationalqualification'));

    } // End Method 

    public function EducationalQualificationUpdate(Request $request){

        $educationalqualification_id = $request->id;

        EducationalQualification::findOrFail($educationalqualification_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Educational Qualification Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('educationalqualification.all')->with($notification);

    } // End Method 


    public function EducationalQualificationDelete($id){

        EducationalQualification::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'Educational Qualification Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
}
