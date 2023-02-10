<?php

namespace App\Http\Controllers\Setup;

use App\Models\District;
use App\Models\Division;
use App\Models\Upazilla;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UpazillaController extends Controller
{
    public function UpazillaAll(){

        $upazillas = Upazilla::all();
        return view('backend.upazilla.upazilla_all',compact('upazillas'));
    } // End Method 


    public function UpazillaAdd(){

        $divisions = Division::all();
        $districts = District::all();
        $upazillas = Upazilla::all();
        return view('backend.upazilla.upazilla_add',compact('divisions','districts','upazillas'));
    } // End Method 


    public function UpazillaStore(Request $request){

        Upazilla::insert([
            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Upazilla Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('upazilla.all')->with($notification); 

    } // End Method 

    public function UpazillaEdit($id){

        $division = Division::all();
        $district = District::all();
        $upazilla = Upazilla::findOrFail($id);
        return view('backend.upazilla.upazilla_edit',compact('upazilla','district','division'));
    } // End Method 

    public function UpazillaUpdate(Request $request){

        $upazilla_id = $request->id;

        Upazilla::findOrFail($upazilla_id)->update([

            'name' => $request->name,
            'name_bn' => $request->name_bn,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Upazilla Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('upazilla.all')->with($notification); 


    } // End Method 


    public function UpazillaDelete($id){
       
       Upazilla::findOrFail($id)->delete();
            $notification = array(
            'message' => 'Product Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method 
}
