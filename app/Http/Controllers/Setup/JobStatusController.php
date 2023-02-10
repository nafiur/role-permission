<?php

namespace App\Http\Controllers\Setup;

use App\Models\JobStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobStatusController extends Controller
{
    public function JobStatusAll(){
        $jobstatuses = JobStatus::all();
        return view('backend.jobstatus.jobstatus_all',compact('jobstatuses'));
    } // End Method 


    public function JobStatusAdd(){
        return view('backend.jobstatus.jobstatus_add');
    } // End Method 


       public function JobStatusStore(Request $request){

        JobStatus::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'JobStatus Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('jobstatus.all')->with($notification);

    } // End Method 

    public function JobStatusEdit($id){

        $jobstatus = JobStatus::findOrFail($id);
        return view('backend.jobstatus.jobstatus_edit',compact('jobstatus'));

    } // End Method 

    public function JobStatusUpdate(Request $request){

        $jobstatus_id = $request->id;

        JobStatus::findOrFail($jobstatus_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'JobStatus Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('jobstatus.all')->with($notification);

    } // End Method 


    public function JobStatusDelete($id){

        JobStatus::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'JobStatus Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
}
