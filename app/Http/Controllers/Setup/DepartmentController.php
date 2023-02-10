<?php

namespace App\Http\Controllers\Setup;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function DepartmentAll(){
        $departments = Department::all();
        return view('backend.department.department_all',compact('departments'));
    } // End Method 


    public function DepartmentAdd(){
        return view('backend.department.department_add');
    } // End Method 


       public function DepartmentStore(Request $request){

        Department::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Department Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('department.all')->with($notification);

    } // End Method 

    public function DepartmentEdit($id){

        $department = Department::findOrFail($id);
        return view('backend.department.department_edit',compact('department'));

    } // End Method 

    public function DepartmentUpdate(Request $request){

        $department_id = $request->id;

        Department::findOrFail($department_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Department Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('department.all')->with($notification);

    } // End Method 


    public function DepartmentDelete($id){

        Department::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'Department Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
}
