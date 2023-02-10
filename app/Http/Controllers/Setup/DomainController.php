<?php

namespace App\Http\Controllers\Setup;

use App\Models\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    public function DomainAll(){

        $domains = Domain::all();
        return view('backend.domain.domain_all',compact('domains'));
    } // End Method 


    public function DomainAdd(){
        return view('backend.domain.domain_add');
    } // End Method 


       public function DomainStore(Request $request){

        Domain::insert([
            'name' => $request->name,
            // 'mobile_no' => $request->mobile_no,
            // 'email' => $request->email,
            // 'address' => $request->address,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Domain Inserted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('domain.all')->with($notification);

    } // End Method 

    public function DomainEdit($id){

        $domain = Domain::findOrFail($id);
        return view('backend.domain.domain_edit',compact('domain'));

    } // End Method 

    public function DomainUpdate(Request $request){

        $domain_id = $request->id;

        Domain::findOrFail($domain_id)->update([
            'name' => $request->name,
            // 'mobile_no' => $request->mobile_no,
            // 'email' => $request->email,
            // 'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Domain Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('domain.all')->with($notification);

    } // End Method 


    public function DomainDelete($id){

        Domain::findOrFail($id)->delete();
      
       $notification = array(
            'message' => 'Domain Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method 
}
