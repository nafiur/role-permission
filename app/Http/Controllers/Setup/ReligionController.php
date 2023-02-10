<?php

namespace App\Http\Controllers\Setup;

use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReligionController extends Controller
{
    public function ReligionAll(){
        $religions = Religion::all();
        return view('backend.religion.religion_all',compact('religions'));
    } // End Method 


    public function ReligionAdd(){
        return view('backend.religion.religion_add');
    } // End Method 


       public function ReligionStore(Request $request){

        Religion::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Religion Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('religion.all')->with($notification);

    } // End Method 

    public function ReligionEdit($id){

        $religion = Religion::findOrFail($id);
        return view('backend.religion.religion_edit',compact('religion'));

    } // End Method 

    public function ReligionUpdate(Request $request){

        $religion_id = $request->id;

        Religion::findOrFail($religion_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Religion Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('religion.all')->with($notification);

    } // End Method 


    public function ReligionDelete($id){

        Religion::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'Religion Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
}
