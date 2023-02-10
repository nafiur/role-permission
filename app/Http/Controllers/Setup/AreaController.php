<?php

namespace App\Http\Controllers\Setup;

use App\Models\Area;
use App\Models\Zone;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AreaController extends Controller
{
    public function AreaAll(){

        $areas = Area::all();
        return view('backend.area.area_all',compact('areas'));
    } // End Method 


    public function AreaAdd(){

        $domains = Domain::all();
        $zones = Zone::all();
        $areas = Area::all();
        return view('backend.area.area_add',compact('domains','zones','areas'));
    } // End Method 


    public function AreaStore(Request $request){

        Area::insert([
            'name' => $request->name,
            'domain_id' => $request->domain_id,
            'zone_id' => $request->zone_id,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Area Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('area.all')->with($notification); 

    } // End Method 

    public function AreaEdit($id){

        $domain = Domain::all();
        $zone = Zone::all();
        $area = Area::findOrFail($id);
        return view('backend.area.area_edit',compact('area','zone','domain'));
    } // End Method 

    public function AreaUpdate(Request $request){

        $area_id = $request->id;

        Area::findOrFail($area_id)->update([

            'name' => $request->name,
            'domain_id' => $request->domain_id,
            'zone_id' => $request->zone_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Area Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('area.all')->with($notification); 


    } // End Method 


    public function AreaDelete($id){
       
       Area::findOrFail($id)->delete();
            $notification = array(
            'message' => 'Area Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method 
}
