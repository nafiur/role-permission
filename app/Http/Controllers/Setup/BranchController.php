<?php

namespace App\Http\Controllers\Setup;

use App\Models\Area;
use App\Models\Zone;
use App\Models\Branch;
use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    public function BranchAll(){

        $branches = Branch::all();
        return view('backend.branch.branch_all',compact('branches'));
    } // End Method 


    public function BranchAdd(){

        $domains = Domain::all();
        $zones = Zone::all();
        $areas = Area::all();
        $branches = Branch::all();
        return view('backend.branch.branch_add',compact('domains','zones','areas','branches'));
    } // End Method 


    public function BranchStore(Request $request){

        Branch::insert([
            'name' => $request->name,
            'domain_id' => $request->domain_id,
            'zone_id' => $request->zone_id,
            'area_id' => $request->area_id,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Branch Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('branch.all')->with($notification); 

    } // End Method 

    public function BranchEdit($id){

        $domain = Domain::all();
        $zone = Zone::all();
        $area = Area::all();
        $branch = Branch::findOrFail($id);
        return view('backend.branch.branch_edit',compact('branch','area','zone','domain'));
    } // End Method 

    public function BranchUpdate(Request $request){

        $branch_id = $request->id;

        Branch::findOrFail($branch_id)->update([

            'name' => $request->name,
            'domain_id' => $request->domain_id,
            'zone_id' => $request->zone_id,
            'area_id' => $request->area_id,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 
        ]);

        $notification = array(
            'message' => 'Branch Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('branch.all')->with($notification); 


    } // End Method 


    public function BranchDelete($id){
       
        Branch::findOrFail($id)->delete();
            $notification = array(
            'message' => 'Branch Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } // End Method 
}
