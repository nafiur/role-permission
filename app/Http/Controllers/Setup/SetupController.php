<?php

namespace App\Http\Controllers\Setup;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetupController extends Controller
{
    // public function SetupShow(){
    //     // $suppliers = Supplier::all();
    //     // $suppliers = Sector::latest()->get();
    //     return view('backend.setup.setup_all');
    // } // End Method 

    public function SetupAll(){

        // $categoris = SetupSetup::latest()->get();
        return view('backend.setup.setup_all');

    } // End Mehtod 
}
