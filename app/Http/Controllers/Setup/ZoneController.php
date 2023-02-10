<?php

namespace App\Http\Controllers\Setup;

use App\Models\Zone;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ZoneController extends Controller
{
    public function ZoneAll(){

        $zones = Zone::all();
        return view('backend.zone.zone_all',compact('zones'));
    } // End Method 


    public function ZoneAdd(){

        $domains = Domain::all();
        return view('backend.zone.zone_add',compact('domains'));
    } // End Method 


    public function ZoneStore(Request $request){

        Zone::insert([
            'name' => $request->name,
            'domain_id' => $request->domain_id,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),  
        ]);

        $notification = array(
            'message' => 'Zone Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('zone.all')->with($notification); 

    } // End Method 

    public function ZoneEdit($id){

        $domain = Domain::all();
        $zone = Zone::findOrFail($id);
        return view('backend.zone.zone_edit',compact('zone','domain'));
    } // End Method 

    public function ZoneUpdate(Request $request){

        $zone_id = $request->id;

         Zone::findOrFail($zone_id)->update([
            'name' => $request->name,
            'domain_id' => $request->domain_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Zone Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('zone.all')->with($notification); 


    } // End Method 


    public function ZoneDelete($id){
       
       Zone::findOrFail($id)->delete();
            $notification = array(
            'message' => 'Zone Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method 
}
