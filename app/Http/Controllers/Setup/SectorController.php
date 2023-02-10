<?php

namespace App\Http\Controllers\Setup;

use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SectorController extends Controller
{
    public function SectorAll(){
        // $suppliers = Supplier::all();
        $sectors = Sector::all();
        // $sectors = Sector::latest()->get();
        return view('backend.sector.sector_all',compact('sectors'));
    } // End Method 


    public function SectorAdd(){
        return view('backend.sector.sector_add');
    } // End Method 


       public function SectorStore(Request $request){

        Sector::insert([
            'name' => $request->name,
            // 'mobile_no' => $request->mobile_no,
            // 'email' => $request->email,
            // 'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Sector Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('sector.all')->with($notification);

    } // End Method 

    public function SectorEdit($id){

        $sector = Sector::findOrFail($id);
        return view('backend.sector.sector_edit',compact('sector'));

    } // End Method 

    public function SectorUpdate(Request $request){

        $sector_id = $request->id;

        Sector::findOrFail($sector_id)->update([
            'name' => $request->name,
            // 'mobile_no' => $request->mobile_no,
            // 'email' => $request->email,
            // 'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Sector Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('sector.all')->with($notification);

    } // End Method 


    public function SectorDelete($id){

        Sector::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'Sector Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
}
