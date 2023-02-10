<?php

namespace App\Http\Controllers\Setup;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DivisionController extends Controller
{
    public function DivisionAll(){
        $divisions = Division::all();
        return view('backend.division.division_all',compact('divisions'));
    } // End Method 


    public function DivisionAdd(){
        return view('backend.division.division_add');
    } // End Method 


       public function DivisionStore(Request $request){

        Division::insert([
            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Division Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('division.all')->with($notification);

    } // End Method 

    public function DivisionEdit($id){

        $division = Division::findOrFail($id);
        return view('backend.division.division_edit',compact('division'));

    } // End Method 

    public function DivisionUpdate(Request $request){

        $division_id = $request->id;

        Division::findOrFail($division_id)->update([
            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Division Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('division.all')->with($notification);

    } // End Method 


    public function DivisionDelete($id){

        Division::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'Division Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
}
